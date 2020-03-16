<?php

namespace App\Http\Controllers;

use App\Query;
use App\ProposalQuery;
use App\ActivistQuery;
use Illuminate\Support\Facades\Input;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QueryController extends Controller
{
    // Query form submission
    public function submitQuery(Request $request)
    {
        $requestData = $request->all();
        // dd($requestData);

        Query::create($requestData);

        $notification = array(
            'message' => 'Query submitted successfully!',
            'alert-type' => 'success',
        );

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
        $data = ActivistQuery::leftJoin('users','users.id','=','activist_queries.activist_id')
                    ->latest('activist_queries.created_at')->paginate($perPage);

        return view('admin.activist_query.index', compact('data'));
    }
}
