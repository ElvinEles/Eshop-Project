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
/*FRONT*/
Route::get('/','HomeController@index');
Route::get('/computer-all-products','HomeController@computer_all_products');
Route::get('/phones-all-products','HomeController@phones_all_products');
Route::get('/cameras-all-products','HomeController@cameras_all_products');
Route::get('/accessories-all-products','HomeController@accessories_all_products');
Route::get('/addwish/{id}','HomeController@addwish');
Route::get('/deletewish/{id}','HomeController@deletewish');
Route::get('/product-detail-information/{id}','HomeController@product_detail_information');
Route::post('/checkemail','HomeController@checkemail');
Route::post('/sendmessage/message','HomeController@message');

/*USER*/
Route::get('/login','UserController@login');
Route::get('/register','UserController@register');
Route::get('/mykabinet/{id}','UserController@mykabinet');
Route::post('/register/save','UserController@register_save');
Route::post('/login/checkout','UserController@login_checkout');
Route::get('/logout','UserController@logout');

/*FRONT*/
/**ADMIN PANEL**/
Route::get('/admin','admin\AdminController@index');

Route::prefix('admin')->group(function () {
  //Category
    Route::get('allcategories','admin\AdminController@all_categories');
    Route::get('addcategory','admin\AdminController@addcategory');
    Route::post('save_category','admin\CategoryController@save_category');
    Route::get('delete_category','admin\CategoryController@delete_category');
    Route::get('edit_category/{id}','admin\AdminController@edit_category');
    Route::post('edit_category_save/{id}','admin\CategoryController@edit_category_save');

  //Product
    Route::get('allproduct','admin\AdminController@allproduct');
    Route::get('addproduct','admin\AdminController@addproduct');
    Route::post('save_product','admin\ProductController@save_product');
    Route::get('delete_product','admin\ProductController@delete_product');
    Route::get('edit_product/{id}','admin\AdminController@edit_product');
    Route::post('edit_product_save/{id}','admin\ProductController@edit_product_save');
    Route::get('active_product/{id}','admin\ProductController@active_product');
    Route::get('deactive_product/{id}','admin\ProductController@deactive_product');

  //Collection
  Route::get('newcollection','admin\AdminController@newcollection');
  Route::post('save_product_newcollection','admin\ProductController@save_product_newcollection');

  //Message
  Route::get('message','admin\AdminController@message');
  Route::get('show_message/{id}','admin\AdminController@showmessage');
  Route::get('delete_message','admin\AdminController@delete_message');
});
