<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Auth::routes();
Route::get('/',function(){
    return view('welcome');
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->middleware('auth');
Route::get('/admin', 'HomeController@index')->name('home');

// For Admin Dashboard


Route::group(['middleware' => ['auth','admin']], function () {

    // member
    Route::get('admin/member', 'MemberController@index');
    Route::post('admin/insert_member', 'MemberController@store');
    Route::get('admin/get_all_member', 'MemberController@show');
    Route::get('/edit_member/{id}', 'MemberController@edit');
    Route::post('admin/update_member', 'MemberController@update');
    Route::get('/delete_member/{id}', 'MemberController@destroy');
    Route::get('/member/count_company/{id}', 'MemberController@count_company');
    Route::post('/delete_member/', 'MemberController@destroy');

    // category
    Route::get('admin/category', 'CategoryController@index');
    Route::post('admin/insert_category', 'CategoryController@store');
    Route::get('admin/get_all_category', 'CategoryController@show');
    Route::get('/edit_cat/{id}', 'CategoryController@edit');
    Route::post('admin/update_category', 'CategoryController@update');
    Route::get('/category/count_company/{id}', 'CategoryController@count_company');
    Route::post('delete_category/{id}', 'CategoryController@destroy');


    //    blog
    Route::get('/admin/blog', 'BlogController@index');
    Route::post('admin/insert_blog','BlogController@store');
    Route::get('admin/get_all_blog','BlogController@show');
    Route::get('admin/edit_blog/{id}', 'BlogController@edit');
    Route::post('admin/update_blog', 'BlogController@update');
    Route::get('admin/delete_blog/{id}','BlogController@destroy');


    //    event
    Route::get('/admin/event', 'EventController@index');
    Route::post('admin/insert_event', 'EventController@store');
    Route::post('admin/get_all_event', 'EventController@show');
    Route::get('admin/edit_event/{id}', 'EventController@edit');
    Route::post('admin/update_event', 'EventController@update');
    Route::get('admin/delete_event/{id}', 'EventController@destroy');
    Route::get('admin/event_detail/{id}', 'EventController@event_detail');

    // company
    Route::get('admin/company', 'CompanyController@index');
    Route::post('admin/insert_company', 'CompanyController@store');
    Route::get('admin/get_all_company', 'CompanyController@show');
    Route::get('/company/detail/{id}', 'CompanyController@company_detail');
    Route::get('/edit/company/{id}', 'CompanyController@edit');
    Route::post('admin/update_company', 'CompanyController@update');
    Route::get('/delete/company/{id}', 'CompanyController@destroy');
    Route::get('/company_photos/{id}', 'CompanyController@company_photos');
    Route::get('/edit_eachphoto/{id}', 'CompanyController@edit_eachphoto');
    Route::post('admin/update_image', 'CompanyController@update_image');

     // Contact
    Route::get('admin/contact_list', 'ContactController@contact');
    Route::get('get_all_contact', 'ContactController@show');
    Route::get('delete_contact/{id}', 'ContactController@destroy');

    //gallery
    Route::get('admin/gallery/', 'GalleryController@index');
    Route::post('admin/insert_photo', 'GalleryController@insert_photo');
    Route::get('admin/get_all_photo', 'GalleryController@get_all_photo');
    Route::get('admin/delete_gallery/{id}', 'GalleryController@destroy');

});


//For Member Dashboard
Route::group(['middleware' => ['auth','member']], function () {
// company for member
    Route::get('member/company', 'CompanyController@member_company');
    Route::post('member/insert_company', 'CompanyController@store');
    Route::get('member/get_all_company', 'CompanyController@show');
    Route::get('/company/detail/{id}', 'CompanyController@company_detail');
    Route::get('/edit/company/{id}', 'CompanyController@edit');
    Route::post('member/update_company', 'CompanyController@update');
    Route::get('/delete/company/{id}', 'CompanyController@destroy');
    Route::get('/company_photos/{id}', 'CompanyController@company_photos');
    Route::get('/edit_eachphoto/{id}', 'CompanyController@edit_eachphoto');
    Route::post('member/update_image', 'CompanyController@update_image');


// Member Profile
    Route::get('member/profile', 'MemberController@member_profile');
    Route::post('update_member', 'MemberController@update_member');

});
Auth::routes();

// <===========For UI===========>
Route::get('/', 'UIController@index');
Route::get('/companies', 'UIController@company_list');
Route::get('/company/{id}', 'UIController@company_profile');
Route::get('category/company/{cat_id}', 'UIController@category_company');
Route::get('/about', 'UIController@about');
Route::get('/category', 'UIController@category');
Route::get('/gallery', 'UIController@gallery');
Route::get('/blog', 'UIController@blog');
Route::get('/blog/{id}', 'UIController@blog_detail');
Route::get('/contact', 'UIController@contactus');
Route::post('/insert_contact', 'UIController@insert_contact');
Route::get('/event', 'UIController@event');
Route::get('/event/{id}', 'UIController@event_single');
Route::get('get_sub_category/{id}', 'Controller@get_sub_category');
Route::get('search/company/{cat_id}/{keyword}', 'UIController@search_company');
Route::get('/search_event', 'UIController@search_event');
Route::get('/search_blog', 'UIController@search_blog');

Route::post('/contact', 'Controller@store');
//in registerController
// use Illuminate\Support\Facades\Hash;
// Route::get('test',function(){
//     echo Hash::make("member123");
// });


