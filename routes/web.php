<?php


//#################################################################################//
//           ###########            Backend Routes           ###########           //
//#################################################################################//


Auth::routes();

// Super Sadmin Routes
Route::group(['middleware' => 'auth'], function () {

    // Route::get('/admin/dashboard', 'AdminController@dashboard')->name('dashboard');

    // User Management with Role and Permissions
    Route::resource('admin/users', 'UserController');
    Route::resource('admin/user/role', 'Admin\\RoleController');
    Route::resource('admin/user/permission', 'Admin\\PermissionController');

    // Page Management
    Route::resource('admin/pages', 'PagesController');

    // Social Impact Initiative  Management
    Route::resource('admin/social-impact/initiatives', 'SocialInitiativeController');
    Route::get('/admin/initiative/image/{id}/delete','SocialInitiativeController@deleteInitiativeImage');
    Route::get('/admin/initiative/{id}/enable','SocialInitiativeController@enableInitiative');
    Route::get('/admin/initiative/{id}/disable','SocialInitiativeController@disableInitiative');

    // Insta Campaign Management
    Route::resource('admin/social-impact/digital-service', 'InstaCampController');
    Route::get('/admin/digital-service/image/{id}/delete','InstaCampController@deleteDigitalServiceImage');
    Route::get('/admin/digital-service/{id}/enable','InstaCampController@enableDigitalService');
    Route::get('/admin/digital-service/{id}/disable','InstaCampController@disableDigitalService');

    // Success Stories
    Route::resource('admin/success-stories', 'SuccessStoryController');
    Route::get('/admin/success-story/{id}/enable', 'SuccessStoryController@enableStory');
    Route::get('/admin/success-story/{id}/disable', 'SuccessStoryController@disableStory');

    // Request for Proposal Management
    Route::resource('admin/social-impact/proposals', 'ProposalController');
    Route::get('admin/proposal/{id}/enable', 'ProposalController@enableProposal');
    Route::get('admin/proposal/{id}/disable', 'ProposalController@disableProposal');

    // Submited Proposals
    Route::get('admin/support/submit-proposals', 'QueryController@proposals');
    Route::get('admin/support/initiative-query', 'QueryController@initiativeQuery');
    Route::get('admin/support/activist-query', 'QueryController@activistQuery');
    Route::get('admin/support/activist-query/{id}/delete', 'QueryController@deleteActivistQuery');

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

// });

// Routes for all Autorized Users
// Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('dashboard');

    // Profile Access
    Route::match(['get','post'], '/admin/profile', 'UserController@profile');
    Route::match(['get','post'], '/admin/profile/{id}/edit', 'UserController@profileEdit');
    Route::match(['get','post'], '/admin/profile/{id}/change-password', 'UserController@changePassword');

    // Company info
    Route::match(['get','post'], '/admin/profile/company', 'BusinessInfoController@companyProfile');

    // Email and Username velidation
    Route::match(['get', 'post'], '/checkemail', 'AdminController@checkEmail');
    Route::match(['get', 'post'], '/checkusername', 'AdminController@checkUsername');

    // Update Business info
    Route::match(['get','post'], '/admin/profile/add-business', 'BusinessInfoController@addBusinessInfo');
    Route::match(['get','post'], '/admin/profile/business/{id}/update', 'BusinessInfoController@updateBusinessInfo');

    // User Address Management
    Route::resource('/admin/user/address', 'UserAddressController');

    // Social Goals (SDG's) Management
    Route::resource('/admin/sdgs', 'SDGController');
    Route::match(['get','post'], '/admin/sdgs/{id}/disable', 'SDGController@disableSDG');
    Route::match(['get','post'], '/admin/sdgs/{id}/enable', 'SDGController@enableSDG');

    // Homepage Banner Routes
    Route::get('/admin/banner', 'BannerController@banners');
    Route::match(['get','post'], '/admin/banner/add', 'BannerController@addBanner');
    Route::match(['get','post'], '/admin/banner/{id}/edit', 'BannerController@editBanner');
    Route::match(['get','post'], '/admin/banner/{id}/delete', 'BannerController@deleteBanner');
    Route::match(['get','post'], '/admin/banner/{id}/enable', 'BannerController@enableBanner');
    Route::match(['get','post'], '/admin/banner/{id}/disable', 'BannerController@disableBanner');
    
});

//#################################################################################//
//           ###########            Frontend Routes           ##########           //
//#################################################################################//

Route::get('/', 'HomeController@index')->name('homepage');

Route::match(['get', 'post'], '/verify/token={token}/code={code}', 'Auth\VerificationController@verifyEmail');

Route::match(['get', 'post'], '/on-ground/search', 'HomeController@homeSearch');
Route::match(['get', 'post'], '/digital-service/search', 'HomeController@homeDigitalServiceSearch');
Route::match(['get', 'post'], '/all-search/result', 'HomeController@allSearchModule');

Route::match(['get','post'], '/social-initiative/{url}', 'HomeController@detailSocialInitiative');
Route::match(['get','post'], '/initiative-programs/{url}', 'HomeController@learnSocialInitiative');
Route::match(['get','post'], '/digital-service/{url}', 'HomeController@detailDigitalService');
Route::match(['get','post'], '/digital-programs/{url}', 'HomeController@learnDigitalService');

// Get State City List
Route::get('/get-state', 'AdminController@getStateList');
Route::get('/get-city', 'AdminController@getCityList');
Route::get('/get-country-city', 'AdminController@getCountryCityList');
Route::get('/get-activist-city', 'AdminController@getCountryCityList');

// Success Stories
Route::match(['get', 'post'], '/success-stories', 'SuccessStoryController@listStories');
Route::match(['get', 'post'], '/success-story/{url}', 'SuccessStoryController@singleStories');

// Add to cart functionality
Route::match(['get','post'], '/social-initiative/add-to-cart/{id}/{budget_id}', 'CartController@addToCart');
Route::match(['get','post'], '/digital-service/add-to-cart/{id}', 'CartController@addToCart360');
Route::match(['get','post'], '/cart-item/{id}/remove', 'CartController@removeFromCart');

// Query form submission
Route::match(['get','post'], '/submit-query', 'QueryController@submitQuery');
Route::match(['get','post'], '/csr-market/submit-proposal', 'QueryController@submitProposal');

// List all CSR
Route::match(['get','post'], 'csr-market-place', 'ProposalController@csrList');
Route::match(['get','post'], '/csr-market-place/{id}', 'ProposalController@singleCsrProposal');

// CMS Pages
Route::match(['get','post'], '/{url}', 'PagesController@singlePage');
Route::match(['get','post'], '/help/contact-us', 'PagesController@contactPage');
Route::match(['get','post'], '/contact-us/form', 'QueryController@contactUs');

// Activists
Route::match(['get','post'], '/users/activists', 'ActivistController@index');
Route::match(['get','post'], '/users/activists/{id}', 'ActivistController@singleActivist');
Route::match(['get','post'], '/users/find/activists/result', 'ActivistController@activistFilter');

// Budget Data Routes
Route::get('/program/get-budget-data', 'HomeController@getBudgetData');

// Apply to Program
Route::get('/program/apply-to-program', 'SocialInitiativeController@applyToProgram');
Route::get('/program/apply-to-program/{url}', 'SocialInitiativeController@detailApplyProgram');
