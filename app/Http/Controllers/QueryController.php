<?php

namespace App\Http\Controllers;

use App\Query;
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
}
