<?php

use Illuminate\Support\Facades\Route;

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
// frontend
Route::get('/admin','AdminController@index');
Route::get('/','HomeController@index');

Route::get('/trang-chu','HomeController@index');
Route::get('/product','HomeController@index1');
Route::post('/tim-kiem','HomeController@search');

// Sản phẩm theo danh mục, thương hiệu


Route::get('/danh-muc-san-pham/{slug_category_product}','CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_slug}','BrandProduct@show_brand_home');
// chi tiet san pham
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');


// endfronend


// backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_drashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');

//Category Product
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');
Route::post('/save-category-product','CategoryProduct@save_category_product');

Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');

Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');


//Brand Product
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');
Route::post('/save-brand-product','BrandProduct@save_brand_product');

// cau 7 brand

Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');

// cau 9. tao chuc nang them và liệt kê
Route::get('/add-product','ProductController@add_product');
Route::post('/save-product','ProductController@save_product');
Route::get('/all-product','ProductController@all_product');

Route::get('/all-product','ProductController@all_product');
Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');
// cau 11 sua xoa
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');

// cau 15 gio hang
Route::post('/save-cart','CartController@save_cart');
Route::get('/show-cart','CartController@show_cart');
// cau 16
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::post('/update-cart-quantity','CartController@update_cart_quantity');
// thu nghiem
// cau 17. thanh toan
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::post('/add-customer','CheckoutController@add_customer');

Route::get('/checkout','CheckoutController@checkout');

Route::post('/login-customer','CheckoutController@login_customer');

Route::get('/logout-checkout','CheckoutController@logout_checkout');

// cau 19
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');

Route::get('/payment','CheckoutController@payment');
// cau 20
Route::post('/order-place','CheckoutController@order_place');

// đơn hang cau21
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/view-order/{orderId}','CheckoutController@view_order');
// cau 22
Route::post('/update-order/{order_id}','CheckoutController@update_order');
// cau 23 cai dat user
Route::get('/taikhoan','CheckoutController@user_setting');
Route::get('/view-order-user/{orderId}','CheckoutController@view_order_user');

// cau 25
//Send Mail 


Route::get('/news', function () {
    return view('pages.news');
});
Route::get('/contact', function () {
    return view('pages.contact');
});

// bo sung cau cap nhat user
///cap-nhat-user
Route::get('/cap-nhat-user','HomeController@get_customer');
Route::post('/update-user','HomeController@update_user');

Route::get('/cap-nhat-pass','HomeController@show_update_pass');
Route::post('/update_pass_save','HomeController@update_pass_saver');

// gửi email quên mật khẩu
Route::get('/show-pass','HomeController@show_pass');

Route::post('/send-email-customer','HomeController@sen_email_pass');
// cau 30 thong ke don hang theo ngay thang nam

Route::get('/found-order-day','AdminController@show_order_day');
Route::get('/found-order-month','AdminController@show_order_month');
Route::get('/found-order-weed','AdminController@show_order_week');
// multi-email
Route::get('/multi-email','AdminController@show_multi_email');
Route::get('/send-mail','AdminController@send_mail');
