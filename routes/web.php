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

/*Route::get('/', function () {
    return view('index');
});*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/products', 'HomeController@products')->name('products');
Route::get('/products_list', 'HomeController@products_list')->name('products_list');
Route::get('/stockists', 'HomeController@stockists')->name('stockists');
Route::get('/the_flow', 'HomeController@the_flow')->name('the_flow');
Route::get('/galleries', 'HomeController@galleries')->name('galleries');
Route::get('/my_pen', 'HomeController@my_pen')->name('my_pen');
Route::get('/lessons', 'HomeController@lessons')->name('lessons');
Route::get('/videos', 'HomeController@videos')->name('videos');
Route::get('/single_flow', 'HomeController@single_flow')->name('single_flow');
Route::get('/about_us', 'HomeController@about_us')->name('about_us');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/business_solutions', 'HomeController@business_solutions')->name('business_solutions');
Route::get('/vip', 'HomeController@vip')->name('vip');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/send_email', 'SendEmailController@index')->name('mail');
Route::post('/send_vip', 'VipController@send')->name('send_vip');
Route::post('/send_email/send', 'SendEmailController@send')->name('send');
Route::get('/mail_send', function () {
    return view('mail_send');
});
Route::get('/vip_send', function () {
    return view('vip_send');
});

Route::get('/home', 'AdminController@admin')->name('home');
Route::get('/admin_products', 'AdminController@admin_products')->name('admin_products');
Route::post('/add_category','AdminController@add_category')->name('add_category');
Route::post('/update_categories','AdminController@update_categories')->name('update_categories');
Route::get('/delete_category','AdminController@delete_category')->name('delete_category');
Route::get('/sub_categories','AdminController@sub_categories')->name('sub_categories');
Route::get('/category_data','AdminController@category_data')->name('category_data');
Route::post('/category_main','AdminController@category_main')->name('category_main');
Route::post('/update_category_data','AdminController@update_category_data')->name('update_category_data');
Route::get('/delete_category_data','AdminController@delete_category_data')->name('delete_category_data');
Route::get('/admin_stockists','AdminController@admin_stockists')->name('admin_stockists');
Route::post('/update_stockists','AdminController@update_stockists')->name('update_stockists');
Route::post('/add_stockists','AdminController@add_stockists')->name('add_stockists');
Route::get('/delete_stockists','AdminController@delete_stockists')->name('delete_stockists');
Route::post('/add_products','AdminController@add_products')->name('add_products');
Route::get('/delete_products','AdminController@delete_products')->name('delete_products');
Route::post('/update_products','AdminController@update_products')->name('update_products');
Route::get('/admin_the_flow','AdminController@admin_the_flow')->name('admin_the_flow');
Route::post('/add_flow','AdminController@add_flow')->name('add_flow');
Route::post('/update_flow','AdminController@update_flow')->name('update_flow');
Route::get('/delete_flow','AdminController@delete_flow')->name('delete_flow');
Route::get('/flow_categories','AdminController@flow_categories')->name('flow_categories');
Route::post('/add_main_flow','AdminController@add_main_flow')->name('add_main_flow');
Route::post('/update_flow_category','AdminController@update_flow_category')->name('update_flow_category');
Route::get('/delete_flow_category','AdminController@delete_flow_category')->name('delete_flow_category');
Route::get('/categories','AdminController@categories')->name('categories');
Route::post('/category_main','AdminController@category_main')->name('category_main');
Route::get('/categories','AdminController@categories')->name('categories');
Route::get('/category_sub_main','AdminController@category_sub_main')->name('category_sub_main');
Route::post('/update_sub_category_data','AdminController@update_sub_category_data')->name('update_sub_category_data');
Route::get('/delete_sub_category_data','AdminController@delete_sub_category_data')->name('delete_sub_category_data');

Route::get('/permanent_markers', 'HomeController@permanent_markers')->name('permanent_markers');
Route::get('/highlighters', 'HomeController@highlighters')->name('highlighters');
Route::get('/correction_tape', 'HomeController@correction_tape')->name('correction_tape');
Route::get('/whiteboard_markers', 'HomeController@whiteboard_markers')->name('whiteboard_markers');
Route::get('/general_pens', 'HomeController@general_pens')->name('general_pens');
Route::get('/fineliners', 'HomeController@fineliners')->name('fineliners');
Route::get('/specialty_markers', 'HomeController@specialty_markers')->name('specialty_markers');
Route::get('/artline_stix', 'HomeController@artline_stix')->name('artline_stix');
Route::get('/artline_supreme', 'HomeController@artline_supreme')->name('artline_supreme');
Route::get('/artline_signature', 'HomeController@artline_signature')->name('artline_signature');

Route::get('/permanent_markers/general_purpose', 'HomeController@permanent_markers_general_purpose')->name('permanent_markers_general_purpose');
Route::get('/permanent_markers/various', 'HomeController@permanent_markers_various')->name('permanent_markers_various');
Route::get('/permanent_markers/eco', 'HomeController@permanent_markers_eco')->name('permanent_markers_eco');
Route::get('/highlighters/highlighters', 'HomeController@highlighters_highlighters')->name('highlighters_highlighters');
Route::get('/correction_tape/correction_tape', 'HomeController@correction_tape_correction_tape')->name('correction_tape_correction_tape');
Route::get('/whiteboard_markers/general_purpose', 'HomeController@whiteboard_markers_general_purpose')->name('whiteboard_markers_general_purpose');
Route::get('/whiteboard_markers/specialty', 'HomeController@whiteboard_markers_specialty')->name('whiteboard_markers_specialty');
Route::get('/whiteboard_markers/eco', 'HomeController@whiteboard_markers_eco')->name('whiteboard_markers_eco');
Route::get('/general_pens/ballpoint_pens', 'HomeController@general_pens_ballpoint_pens')->name('general_pens_ballpoint_pens');
Route::get('/general_pens/gel_pens', 'HomeController@general_pens_gel_pens')->name('general_pens_gel_pens');
Route::get('/general_pens/rollerball_pens', 'HomeController@general_pens_rollerball_pens')->name('general_pens_rollerball_pens');
Route::get('/general_pens/calligraphy_pens', 'HomeController@general_pens_calligraphy_pens')->name('general_pens_calligraphy_pens');
Route::get('/general_pens/tech_drawing', 'HomeController@general_pens_tech_drawing')->name('general_pens_tech_drawing');
Route::get('/fineliners/fineline_pens', 'HomeController@fineliners_fineline_pens')->name('fineliners_fineline_pens');
Route::get('/specialty_markers/various_specialty', 'HomeController@specialty_markers_various_specialty')->name('specialty_markers_various_specialty');
Route::get('/specialty_markers/industrial_markers', 'HomeController@specialty_markers_industrial_markers')->name('specialty_markers_industrial_markers');
Route::get('/specialty_markers/signage', 'HomeController@specialty_markers_signage')->name('specialty_markers_signage');
Route::get('/specialty_markers/metallic_markers', 'HomeController@specialty_markers_metallic_markers')->name('specialty_markers_metallic_markers');
Route::get('/specialty_markers/paint_markers', 'HomeController@specialty_markers_paint_markers')->name('specialty_markers_paint_markers');
Route::get('/specialty_markers/flipchart_markers', 'HomeController@specialty_markers_flipchart_markers')->name('specialty_markers_flipchart_markers');
Route::get('/specialty_markers/colouring_markers', 'HomeController@specialty_markers_colouring_markers')->name('specialty_markers_colouring_markers');
Route::get('/artline_supreme/supreme_markers', 'HomeController@artline_supreme_supreme_markers')->name('artline_supreme_supreme_markers');
Route::get('/artline_supreme/supreme_pens', 'HomeController@artline_supreme_supreme_pens')->name('artline_supreme_supreme_pens');
Route::get('/artline_signature/rollerball_pens', 'HomeController@artline_signature_rollerball_pens')->name('artline_signature_rollerball_pens');
Route::get('/artline_signature/fineline_pens', 'HomeController@artline_signature_fineline_pens')->name('artline_signature_fineline_pens');

