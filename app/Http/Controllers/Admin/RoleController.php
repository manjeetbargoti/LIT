<?php

namespace App\Http\Controllers\Admin;

use Gate;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $role = Role::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $role = Role::latest()->paginate($perPage);
        }

        return view('admin.role.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        abort_if(Gate::denies('role_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission = Permission::get();

        return view('admin.role.create', compact('permission'));
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
        abort_if(Gate::denies('role_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $requestData = $request->except('permissions');
        $permissions = $request->permissions;

        // dd($requestData);
        
        $role = Role::create($requestData);
        $role->givePermissionTo($permissions);

        $notification = array(
            'message' => 'Role Added successfully!',
            'alert-type' => 'success'
        );

        return redirect('admin/user/role')->with($notification);
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
        $role = Role::findOrFail($id);
        $permissionName = $role->permissions->pluck('name')->toArray();

        return view('admin.role.show', compact('role', 'permissionName'));
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
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role = Role::findOrFail($id);

        $roleName = $role->permissions->pluck('name')->toArray();

        // dd($roleName);

        $permission = Permission::get();

        return view('admin.role.edit', compact('role','permission','roleName'));
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
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $requestData = $request->except('permissions');
        $permissions = $request->permissions;
        
        $role = Role::findOrFail($id);
        $role->update($requestData);

        $role->syncPermissions($permissions);

        $notification = array(
            'message' => 'Role Updated successfully!',
            'alert-type' => 'success'
        );

        return redirect('admin/user/role')->with($notification);
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
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Role::destroy($id);

        return redirect('admin/user/role')->with('flash_message', 'Role deleted!');
    }
}
