<?php

namespace App\Http\Controllers;

use Gate;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $user = User::where('first_name', 'LIKE', "%$keyword%")
                            ->orWhere('last_name', 'LIKE', "%$keyword%")
                            ->orWhere('email', 'LIKE', "%$keyword%")
                            ->orWhere('phone', 'LIKE', "%$keyword%")
                            ->orWhere('username', 'LIKE', "%$keyword%")
                            ->latest()->paginate($perPage);
        } else {
            $user = User::latest()->paginate($perPage);
        }

        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        abort_if(Gate::denies('user_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::get();
        return view('admin.user.create', compact('roles'));
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
        abort_if(Gate::denies('user_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $requestData = $request->all();
        $requestData = $request->except('roles');
        $roles = $request->roles;

        // dd($requestData);
        
        $user = User::create($requestData);
        $user->assignRole($roles);

        $notification = array(
            'message' => 'User Added successfully!',
            'alert-type' => 'success'
        );

        return redirect('admin/users')->with($notification);
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
        $user = User::findOrFail($id);

        return view('admin.user.show', compact('user'));
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
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::findOrFail($id);
        $roles = Role::get();
        // $roles = Role::get()->pluck('name', 'name');

        return view('admin.user.edit', compact('user','roles'));
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
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestData = $request->except('roles');
        $roles = $request->roles;

        // dd($requestData);
        
        $user = User::findOrFail($id);
        $user->update($requestData);
        $user->syncRoles($roles);

        $notification = array(
            'message' => 'User Updated successfully!',
            'alert-type' => 'success'
        );

        return redirect('admin/users')->with($notification);
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
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        User::destroy($id);

        return redirect('admin/users')->with('flash_message', 'User deleted!');
    }
}