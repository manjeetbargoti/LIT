<?php

namespace App\Http\Controllers;

use Session;
use App\Cart;
use App\Query;
use App\ProposalQuery;
use App\ActivistQuery;
use App\SocialInitiative;
use Illuminate\Support\Facades\Input;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class QueryController extends Controller
{
    // Query form submission
    public function submitQuery(Request $request)
    {
        $requestData = $request->all();
        $initID = 'On'.$request->impact_id;
        // dd($requestData);
        // $initiativeData = SocialInitiative::where('id', $request->impact_id)->first();
        // dd($initiativeData);

        $qCount = Query::where('email', $request->email)->where('type','Onground')->where('impact_id',$request->impact_id)->count();

        // dd($qCount);

        if($qCount == 0){
            Query::create($requestData);

            if($initID)
            {
                $cart = session()->get('cart');
                // dd($cart);
                if(isset($cart[$initID]))
                {
                    unset($cart[$initID]);
                    // dd($cart);
    
                    session()->put('cart', $cart);
                }
            }

            $initiativeData = SocialInitiative::where('id', $request->impact_id)->first();

            $initSlug = $initiativeData->slug;

            $email = $request->email;

            $messageData = ['slug' => $initSlug, 'name' => $request->name];
            Mail::send('emails.query_for_initiative', $messageData, function ($message) use ($email) {
                $message->to($email)->subject('Your Query Submited Successfully | Lightup with LIT');
            });
    
            $notification = array(
                'message' => 'Query submitted successfully!',
                'alert-type' => 'success',
            );
        }else {
            if($initID)
            {
                $cart = session()->get('cart');
                // dd($cart);
                if(isset($cart[$initID]))
                {
                    unset($cart[$initID]);
                    // dd($cart);
    
                    session()->put('cart', $cart);
                }
            }

            $notification = array(
                'message' => 'You have already expressed interest in this program.',
                'alert-type' => 'success',
            );
        }
        

        return redirect()->back()->with($notification);

    }

    // Get Social Initiative Queries
    public function initiativeQuery()
    {
        $perPage = 24;

        $data = Query::latest()->paginate($perPage);

        return view('admin.queries.initative_query', compact('data'));
    }

    // Submit proposal
    public function submitProposal(Request $request)
    {
        $requestData = $request->all();

        // Proposal PDF
        if ($request->hasFile('proposal_pdf')) {

            $file_array = Input::file('proposal_pdf');
            $file_name = $file_array->getClientOriginalName();
            $file_size = $file_array->getClientSize();
            $extension = $file_array->getClientOriginalExtension();
            $filename = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['name']))).'_brochure_' . rand(0, 9999999) . '.' . $extension;
            // $large_file_path = public_path('/images/tradeLicense/large/' . $filename);
            $request->proposal_pdf->move(public_path('/images/query/proposals/'), $filename);

            $requestData['proposal_pdf'] = $filename;
        }

        // dd($requestData);

        ProposalQuery::create($requestData);

        $notification = array(
            'message' => 'Proposal submitted successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    // Get submitted proposals
    public function proposals()
    {
        $perPage = 24;
        $data = ProposalQuery::leftJoin('proposals','proposals.id','=','proposal_queries.proposal_id')
                    ->latest('proposal_queries.created_at')->paginate($perPage);

        return view('admin.queries.proposal_submit', compact('data'));
    }

    // Get submitted request
    public function activistQuery()
    {
        $perPage = 24;
        $data = ActivistQuery::join('users','users.id','=','activist_queries.activist_id')
                    ->select('first_name','last_name','activist_queries.id','activist_queries.name','activist_queries.email','activist_queries.phone','activist_queries.position','activist_queries.organization','activist_queries.activist_id')
                    ->latest('activist_queries.created_at')->paginate($perPage);

                    // dd($data);
        // $data = ActivistQuery::latest()->paginate($perPage);

        return view('admin.activist_query.index', compact('data'));
    }

    // Delete Activist Query
    public function deleteActivistQuery(Request $request, $id=null)
    {
        // dd($id);
        if($id)
        {
            // dd($id);
            ActivistQuery::where('id', $id)->delete();
        }

        $notification = array(
            'message' => 'Query deleted!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    // Contact us query
    public function contactUs(Request $request)
    {
        $data = $request->all();
        $email = config('email');

        $messageData = ['email' => $data['email'], 'name' => $data['name'], 'phone' => $data['phone'], 'message' => $data['message']];
        Mail::send('emails.contact_us', $messageData, function ($message) use ($email) {
            $message->to($email)->subject('Contact us query | Lightup with LIT');
        });
    }
}
