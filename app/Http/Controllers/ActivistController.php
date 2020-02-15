<?php

namespace App\Http\Controllers;

use App\User;
use App\Country;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class ActivistController extends Controller
{
    // List all activists
    public function index()
    {
    	$perPage = 24;

    	// $roles = Role::get();

    	$data = User::where('status', 1)
    					->whereHas("roles", function($q){ $q->where("name", "Activist"); })
    					->latest()->paginate($perPage);

    	$country = Country::orderBy('name', 'asc')->get();

    	return view('front.users.activists', compact('data','country'));
    }

    // Single Activist
    public function singleActivist(Request $request, $id=null)
    {
    	$data = User::find($id);
    	$roles = Role::pluck('name','name')->all();
    	$userRole = $data->roles->first();
    	$data['role'] = $userRole->name;

    	// dd($data);

    	return view('front.users.singleActivist', compact('data'));
    }
}
