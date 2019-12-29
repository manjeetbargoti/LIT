<?php


//#################################################################################//
//           ###########            Backend Routes           ###########           //
//#################################################################################//


Auth::routes();

// Super Sadmin Routes
Route::group(['middleware' => 'role:Super Admin', 'auth'], function () {

    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('dashboard');

    // User Management with Role and Permissions
    Route::resource('admin/users', 'UserController');
    Route::resource('admin/user/role', 'Admin\\RoleController');
    Route::resource('admin/user/permission', 'Admin\\PermissionController');

});


//#################################################################################//
//           ###########            Frontend Routes           ##########           //
//#################################################################################//

Route::get('/', 'HomeController@index')->name('homepage');

Route::match(['get','post'],'/verify/token={token}/code={code}','Auth\VerificationController@verifyEmail');
