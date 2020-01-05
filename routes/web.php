<?php


//#################################################################################//
//           ###########            Backend Routes           ###########           //
//#################################################################################//


Auth::routes();

// Super Sadmin Routes
Route::group(['middleware' => 'role:Super Admin', 'auth'], function () {

    // Route::get('/admin/dashboard', 'AdminController@dashboard')->name('dashboard');

    // User Management with Role and Permissions
    Route::resource('admin/users', 'UserController');
    Route::resource('admin/user/role', 'Admin\\RoleController');
    Route::resource('admin/user/permission', 'Admin\\PermissionController');

    // Page Management
    Route::resource('admin/pages', 'PagesController');

    // Social Impact Initiative/Project/Activity Job Management
    Route::resource('admin/social-impact/initiatives', 'SocialInitiativeController');
    Route::get('/admin/initiative/image/{id}/delete','SocialInitiativeController@deleteInitiativeImage');

    // Website System Setting Options Route
    Route::get('admin/system/options', 'SystemController@getOptions');
    Route::post('admin/system/options', 'SystemController@postOption');
    Route::get('/admin/system/robots.txt', 'SystemController@getRobot');
    Route::post('/admin/system/robots.txt', 'SystemController@postRobot');
    Route::get('/admin/system/htaccess', 'SystemController@getHtaccess');
    Route::post('/admin/system/htaccess', 'SystemController@postHtaccess');
    Route::get('/admin/system/custom-code', 'SystemController@getCode');
    Route::post('/admin/system/custom-code', 'SystemController@postCodes');
    Route::get('/admin/system/contact-info', 'SystemController@getContactInfo');
    Route::post('/admin/system/contact-info', 'SystemController@postContactInfo');
    Route::get('/admin/system/terms-condition', 'SystemController@getTerms');
    Route::post('/admin/system/terms-condition', 'SystemController@postTerms');

    Route::get('/admin/system/social-links', 'SystemController@getSocialLinks');
    Route::post('/admin/system/social-links', 'SystemController@postSocialLinks');

    // Get State City List
    Route::get('/get-state-list', 'AdminController@getStateList');
    Route::get('/get-city-list', 'AdminController@getCityList');

});

// Routes for all Autorized Users
Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('dashboard');

    // Profile Access
    Route::match(['get','post'], '/admin/profile', 'UserController@profile');
    Route::match(['get','post'], '/admin/profile/{id}/edit', 'UserController@profileEdit');
    Route::match(['get','post'], '/admin/profile/{id}/change-password', 'UserController@changePassword');

    // Email and Username velidation
    Route::match(['get', 'post'], '/checkemail', 'AdminController@checkEmail');
    Route::match(['get', 'post'], '/checkusername', 'AdminController@checkUsername');

    // Edit Supplier Business info
    Route::match(['get','post'], '/supplier-info/{id}/edit', 'Admin\\UserController@editBusinessInfo');

    // User Address Management
    Route::resource('/admin/user/address', 'UserAddressController');

    
});


//#################################################################################//
//           ###########            Frontend Routes           ##########           //
//#################################################################################//

Route::get('/', 'HomeController@index')->name('homepage');

Route::match(['get','post'],'/verify/token={token}/code={code}','Auth\VerificationController@verifyEmail');
