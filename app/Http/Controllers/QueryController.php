<?php

namespace App\Http\Controllers;

use App\Query;
use App\ProposalQuery;
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
}
