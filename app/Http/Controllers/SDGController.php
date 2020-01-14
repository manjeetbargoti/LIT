<?php

namespace App\Http\Controllers;

use Gate;
use App\User;
use App\SDGs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SDGController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // abort_if(Gate::denies('sdg_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $sdg = SDGs::where('sdg_name', 'LIKE', "%$keyword%")
                            ->orWhere('sdg_description', 'LIKE', "%$keyword%")
                            ->latest()->paginate($perPage);
        } else {
            $sdg = SDGs::latest()->paginate($perPage);
        }

        return view('admin.sdgs.index', compact('sdg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // abort_if(Gate::denies('sdg_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sdgs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // abort_if(Gate::denies('sdg_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $requestData = $request->all();

        $user_id = Auth::user()->id;

        $requestData['add_by'] = $user_id;

        // dd($requestData);

        SDGs::create($requestData);

        $notification = array(
            'message' => 'SDG Added successfully!',
            'alert-type' => 'success'
        );

        return redirect('admin/sdgs')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $sdg = SDGs::findOrFail($id);

        return view('admin.sdgs.show', compact('sdg'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        // abort_if(Gate::denies('sdg_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        SDGs::destroy($id);

        $notification = array(
            'message' => 'SDG deleted!',
            'alert-type' => 'success'
        );

        return redirect('admin/sdgs')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // abort_if(Gate::denies('sdg_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sdg = SDGs::findOrFail($id);

        // dd($sdg);

        return view('admin.sdgs.edit', compact('sdg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        // abort_if(Gate::denies('sdg_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $requestData = $request->all();

        // dd($requestData);
        
        $sdg = SDGs::findOrFail($id);
        $sdg->update($requestData);

        $notification = array(
            'message' => 'SDG Updated successfully!',
            'alert-type' => 'success'
        );

        return redirect('admin/sdgs')->with($notification);
    }

    /**
     * Disable the SDG
     */
    public function disableSDG($id)
    {
        if($id)
        {
            SDGs::where('id',$id)->update(['status'=> 0]);

            $notification = array(
                'message' => 'SDG disabled!',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Enable the SDG
     */
    public function enableSDG($id)
    {
        if($id)
        {
            SDGs::where('id',$id)->update(['status'=> 1]);

            $notification = array(
                'message' => 'SDG enabled!',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        }
    }
}
