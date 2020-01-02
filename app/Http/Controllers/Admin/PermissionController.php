<?php

namespace App\Http\Controllers\Admin;

use Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $permission = Permission::where('name', 'LIKE', "%$keyword%")
                ->orderBy('name','asc')->paginate($perPage);
        } else {
            $permission = Permission::orderBy('name','asc')->paginate($perPage);
        }

        return view('admin.permission.index', compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        abort_if(Gate::denies('permission_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permission.create');
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
        abort_if(Gate::denies('permission_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $requestData = $request->all();
        
        Permission::create($requestData);

        return redirect('admin/user/permission')->with('flash_message', 'Permission added!');
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
        $permission = Permission::findOrFail($id);

        return view('admin.permission.show', compact('permission'));
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
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission = Permission::findOrFail($id);

        return view('admin.permission.edit', compact('permission'));
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
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $requestData = $request->all();
        
        $permission = Permission::findOrFail($id);
        $permission->update($requestData);

        return redirect('admin/user/permission')->with('flash_message', 'Permission updated!');
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

        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Permission::destroy($id);

        return redirect('admin/user/permission')->with('flash_message', 'Permission deleted!');
    }
}
