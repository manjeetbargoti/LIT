@extends('layouts.panel.design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    {{ $user->first_name }} {{ $user->last_name }}
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $user->first_name }} {{ $user->last_name }}
                        ({{ implode(', ', $user->getRoleNames()->toArray()) }})</div>
                    <div class="card-body">
                        <!-- <a href="{{ url('/admin/dashboard') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a> -->
                        <a href="{{ url('/admin/profile/' . $user->id . '/edit') }}" title="Edit user"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>
                        @if($businessData_count > 0)
                            <a href="{{ url('/admin/profile/business/' . $businessData->id . '/update') }}" title="Update Business Profile"><button class="btn btn-success btn-sm"><i
                                    class="fa fa-plus" aria-hidden="true"></i> Update Business Profile</button></a>
                        @else
                            <a href="{{ url('/admin/profile/add-business') }}" title="Update Business Profile"><button class="btn btn-success btn-sm"><i
                                    class="fa fa-plus" aria-hidden="true"></i> Update Business Profile</button></a>
                        @endif
                        <a href="{{ url('/admin/profile/' . $user->id . '/change-password') }}"
                            title="Change Password"><button class="btn btn-primary btn-sm pull-right"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Change Password</button></a>
                        <br />
                        <br />
                        <div class="row">
                            <div class="col-lg-6 m-t-10">
                                <div class="text-center">
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new zoom image-circle">
                                                @if(!empty($user->avatar))
                                                <img class="img-responsive" width="150"
                                                    src="{{ url('/images/user/large/'.$user->avatar) }}"
                                                    alt="{{ $user->first_name }} {{ $user->last_name }}"
                                                    class="admin_img_width">
                                                @else
                                                <img class="img-responsive" width="150"
                                                    src="{{ url('/images/user/user.png') }}"
                                                    alt="{{ $user->first_name }} {{ $user->last_name }}"
                                                    class="admin_img_width">
                                                @endif
                                            </div>
                                            <div
                                                class="fileinput-preview fileinput-exists thumb_zoom zoom admin_img_width">
                                            </div>
                                            <!-- <div class="btn_file_position">
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">Change image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="Changefile">
                                                </span>
                                                <a href="#" class="btn btn-warning fileinput-exists"
                                                    data-dismiss="fileinput">Remove</a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <ul class="nav nav-inline view_user_nav_padding">
                                        <li class="nav-item card_nav_hover">
                                            <a class="nav-link active" href="#user" id="home-tab" data-toggle="tab"
                                                aria-expanded="true">User Details</a>
                                        </li>
                                        @if($roleName == "NGO")
                                        <li class="nav-item card_nav_hover">
                                            <a class="nav-link" href="#business" id="hats-tab"
                                                data-toggle="tab">Business
                                                info</a>
                                        </li>
                                        @endif
                                        <li class="nav-item card_nav_hover">
                                            <a class="nav-link" href="#address" id="followers"
                                                data-toggle="tab">Address</a>
                                        </li>
                                    </ul>
                                    <div id="clothing-nav-content" class="tab-content m-t-10">
                                        <div role="tabpanel" class="tab-pane fade show active" id="user">
                                            <table class="table" id="users">
                                                <tr>
                                                    <td>Username</td>
                                                    <td class="inline_edit">
                                                        <span>{{ $user->username }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Name</td>
                                                    <td class="inline_edit">
                                                        <span>{{ $user->title }} {{ $user->first_name }}
                                                            {{ $user->last_name }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>E-mail</td>
                                                    <td>
                                                        <span>{{ $user->email }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Phone Number</td>
                                                    <td>
                                                        <span>{{ $user->phone }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Role</td>
                                                    <td>
                                                        <span><label
                                                                class="badge badge-success badge-lg badge-pill">{{ implode(', ', $user->getRoleNames()->toArray()) }}</label></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Created At</td>
                                                    <td>{{ date('d M, Y (h:i:s A)', strtotime($user->created_at)) }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="business">
                                            <div class="card_nav_body_padding">
                                                <table class="table" id="users">
                                                    <tr>
                                                        <td>Business Name</td>
                                                        <td class="inline_edit">
                                                            <span>@if(!empty($supplierData->business_name)){{ $supplierData->business_name }}
                                                                @endif</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Description</td>
                                                        <td class="inline_edit">
                                                            <span>@if(!empty($supplierData->description)){{ $supplierData->description }}
                                                                @endif</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Category</td>
                                                        <td class="inline_edit">
                                                            <span>@if(!empty($supplierData->business_name))
                                                                {{ $supplierData->category }} @endif</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>License Number</td>
                                                        <td class="inline_edit">
                                                            <span>@if(!empty($supplierData->license_number))
                                                                {{ $supplierData->license_number }} @endif</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Website</td>
                                                        <td class="inline_edit">
                                                            <span>@if(!empty($supplierData->website))
                                                                {{ $supplierData->website }} @endif</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Country</td>
                                                        <td class="inline_edit">
                                                            <span>@if(!empty($supplierData->country))
                                                                @foreach(\App\Country::where('iso3',$supplierData->country)->get()
                                                                as $cnt) {{ $cnt->name }}
                                                                @endforeach @endif</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>State</td>
                                                        <td class="inline_edit">
                                                            <span>@if(!empty($supplierData->state))
                                                                {{ $supplierData->state }} @endif</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td class="inline_edit">
                                                            <span>@if(!empty($supplierData->city))
                                                                {{ $supplierData->city }} @endif</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#"
                                                                class="btn btn-sm btn-info pull-right">Edit</a> 
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="address">
                                            <div class="card_nav_body_padding follower_images">
                                                <table class="table" id="users">
                                                    <tr>
                                                        <td>Name</td>
                                                        <td class="inline_edit">
                                                            <span>@if(!empty($userAddress->name)){{ $userAddress->name }}
                                                                @endif</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone</td>
                                                        <td class="inline_edit">
                                                            <span>@if(!empty($userAddress->phone))
                                                                {{ $userAddress->phone }} @endif</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td class="inline_edit">
                                                            <span>@if(!empty($userAddress->address1)){{ $userAddress->address1 }}
                                                                @endif</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Country</td>
                                                        <td class="inline_edit">
                                                            <span>@if(!empty($userAddress->country))
                                                                @foreach(\App\Country::where('iso3',$userAddress->country)->get()
                                                                as $cnt) {{ $cnt->name }}
                                                                @endforeach @endif</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>State</td>
                                                        <td class="inline_edit">
                                                            <span>@if(!empty($userAddress->state))
                                                                {{ $userAddress->state }} @endif</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td class="inline_edit">
                                                            <span>@if(!empty($userAddress->city))
                                                                {{ $userAddress->city }} @endif</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td class="inline_edit">
                                                            <span>@if(!empty($userAddress->zipcode))
                                                                {{ $userAddress->zipcode }} @endif</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="row">
                                                    @if(!empty($userAddress)) <a class="btn btn-info btn-sm pull-right"
                                                        href="{{ url('/admin/user/address/'.$userAddress->id.'/edit') }}">Edit
                                                        Address</a> @else<a class="btn btn-info btn-sm pull-right"
                                                        href="{{ url('/admin/user/address/create') }}">Add
                                                        Address</a>@endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card m-t-35">
                    <div class="card-header bg-white">
                        <div>
                            <i class="fa fa-question-circle"></i>
                            Recent Query
                        </div>
                    </div>
                    <div class="card-body padding">
                        <div class="feed">
                            @if(!empty($productquery))
                            <h4>Product Queries</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Product</th>
                                            <th>Product Type</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($productquery as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            @foreach(\App\Product::where('id', $item->product_id)->get() as $prod)
                                            <td>{{ $prod->product_name }}</td>
                                            @endforeach
                                            <td>@if($item->product_type == 1)<label
                                                    class="badge badge-success">VVIP</label>@elseif($item->product_type
                                                == 0) <label class="badge badge-info">Basic</label> @endif</td>
                                            <td>@if($item->status == 1)<label
                                                    class="badge badge-success">Done</label>@elseif($item->status == 0)
                                                <label class="badge badge-danger">Pending</label> @endif</td>
                                            <td>
                                                <a href="{{ url('/admin/support/product-query/' . $item->id) }}"
                                                    title="View Query"><button class="btn btn-info btn-sm"><i
                                                            class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                                <a href="{{ url('/admin/support/product-query/' . $item->id . '/edit') }}"
                                                    title="Edit Query"><button class="btn btn-primary btn-sm"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </button></a>

                                                <form method="POST"
                                                    action="{{ url('/admin/support/product-query' . '/' . $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Query"
                                                        onclick="return confirm('Confirm delete?')"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form>

                                                <a href="{{ url('/admin/send-email/' . $item->id) }}"
                                                    title="Send Email"><button class="btn btn-info btn-sm"><i
                                                            class="fa fa-envelope" aria-hidden="true"></i> </button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                                @if(!empty($supplierQuery))
                                <h4>Supplier Queries</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Supplier</th>
                                                <th>Location</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($supplierQuery as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone }}</td>

                                                <td>@foreach(\App\User::where('id', $item->supplier_id)->get() as
                                                    $supp){{ $supp->first_name }} {{ $supp->last_name }}@endforeach</td>

                                                <td>{{ $item->location }}</td>
                                                <td>@if($item->status == 1)<label
                                                        class="badge badge-success">Done</label>@elseif($item->status ==
                                                    0)
                                                    <label class="badge badge-danger">Pending</label> @endif</td>
                                                <td>
                                                    <a href="{{ url('/admin/support/supplier-query/' . $item->id) }}"
                                                        title="View Query"><button class="btn btn-info btn-sm"><i
                                                                class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                                    <a href="{{ url('/admin/support/supplier-query/' . $item->id . '/edit') }}"
                                                        title="Edit Query"><button class="btn btn-primary btn-sm"><i
                                                                class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </button></a>

                                                    <form method="POST"
                                                        action="{{ url('/admin/support/supplier-query' . '/' . $item->id) }}"
                                                        accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete Query"
                                                            onclick="return confirm('Confirm delete?')"><i
                                                                class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pagination-wrapper"> </div>
                                </div>
                                @endif
                            </div>
                            <!-- <ul>
                                <li>
                                    <h5>
                                        test
                                    </h5>
                                    <p>
                                        Mail received from
                                        <strong>John</strong> .
                                    </p>
                                    <i>1 hr back</i>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection