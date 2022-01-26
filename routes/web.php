<?php
use App\Http\Middleware\CheckAuthMiddleware;
use App\Http\Controllers\categoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'FrontEndController@index');
Route::get('/category/food/show/{category_id}', 'FrontEndController@food_show')->name('category_food');
Route::post('/category/food/search', 'FrontEndController@search')->name('search_food');
Route::post('/add/cart', 'cartController@add')->name('add_to_cart');
Route::get('/cart/show', 'cartController@show')->name('cart_show');
Route::get('/cart/remove/{id}', 'cartController@remove')->name('remove_item');
Route::post('/cart/update', 'cartController@update')->name('update_qty');
Route::post('/cart/voucher', 'cartController@voucher')->name('get_voucher');

/* Checkout - Thanh Toán */
Route::get('/checkout/payment', 'CheckOutController@payment')->name('checkout_payment');
Route::post('/checkout/new/order', 'CheckOutController@order')->name('new_order');
Route::get('/checkout/order/complete', 'CheckOutController@complete')->name('order_complete');
/* Checkout - Thanh Toán */

/* Customer Route */
Route::get('/signup/customer', 'CustomerController@index')->name('sign_up');
Route::post('/signup/customer/save', 'CustomerController@save')->name('save_customer');
Route::get('/shipping', 'CustomerController@shipping');
Route::get('/customer/login', 'CustomerController@login')->name('login_customer');
Route::post('/check/customer/login', 'CustomerController@check')->name('check_login');
Route::post('/customer/logout', 'CustomerController@logout')->name('log_out');
Route::post('/shipping/save', 'CustomerController@save_shipping')->name('save_shipping');
Route::get('/forgot_password','ForgotPassword@forgot');
Route::post('/forgot_password','ForgotPassword@password');
Route::get('/reset_password/{email}','ForgotPassword@reset');
Route::post('/reset_password','ForgotPassword@change')->name('change_password');
/* Customer Route */

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/*ADMIN*/
Route::get('redirects', [HomeController::class,'index']);
/* ADMIN */

/* STAFF */
Route::prefix('staff')->middleware([CheckAuthMiddleware::class])->group(function(){
    Route::get('/add', 'UserController@index')->name('show_user_table');
    Route::post('/save', 'UserController@save')->name('user_save');
    Route::get('/manage', 'UserController@manage')->name('manage_user');
    Route::post('/update', 'UserController@update')->name('update_st');
    Route::get('/delete{id}', 'UserController@delete')->name('delete_st');
});
/* STAFF */

/* Quản Lý Customer */
Route::prefix('manage/customer')->middleware([CheckAuthMiddleware::class])->group(function(){
    Route::get('/manage', 'ManageCustomerController@manage')->name('manage_customer');
    Route::get('/delete{customer_id}', 'ManageCustomerController@delete')->name('delete_customer');
});
/* Quản Lý Customer


/* CATEGORY */
Route::prefix('category')->middleware([CheckAuthMiddleware::class])->group(function(){
    Route::get('/add', 'categoryController@index')->name('show_cate_table');
    Route::post('/save', 'categoryController@save')->name('cate_save');
    Route::get('/manage', 'categoryController@manage')->name('manage_cate');
    Route::get('active{category_id}', 'categoryController@active')->name('active_cate');
    Route::get('inactive{category_id}', 'categoryController@inactive')->name('inactive_cate');
    Route::get('/delete{category_id}', 'categoryController@delete')->name('delete_cate');
    Route::post('/update', 'categoryController@update')->name('update_cate');
});
/* CATEGORY */


/* Shipper */
Route::prefix('shipper')->middleware([CheckAuthMiddleware::class])->group(function(){
    Route::get('add', 'shipperController@index')->name('show_shipper_table');
    Route::post('/save', 'shipperController@save')->name('shipper_save');
    Route::get('/manage', 'shipperController@manage')->name('manage_shipper');
    Route::get('/active{shipper_id}', 'shipperController@active')->name('active_sh');
    Route::get('/inactive{shipper_id}', 'shipperController@inactive')->name('inactive_sh');
    Route::get('/delete{shipper_id}', 'shipperController@delete')->name('delete_sh');
    Route::post('/update', 'shipperController@update')->name('update_sh');
});
/* Shipper */

/* VOUCHER */
Route::prefix('voucher')->middleware([CheckAuthMiddleware::class])->group(function(){
    Route::get('/add', 'voucherController@index')->name('show_voucher_table');
    Route::post('/save', 'voucherController@save')->name('voucher_save');
    Route::get('/manage', 'voucherController@manage')->name('manage_voucher');
    Route::get('/active{voucher_id}', 'voucherController@active')->name('active_vc');
    Route::get('/inactive{voucher_id}', 'voucherController@inactive')->name('inactive_vc');
    Route::get('/delete{voucher_id}', 'voucherController@delete')->name('delete_vc');
    Route::post('/update', 'voucherController@update')->name('update_vc');
});
/* VOUCHER */

/* FOOD */
Route::prefix('food')->middleware([CheckAuthMiddleware::class])->group(function(){
    Route::get('/add', 'foodController@index')->name('show_food_table');
    Route::post('/save', 'foodController@save')->name('food_save');
    Route::get('/manage', 'foodController@manage')->name('manage_food');
    Route::get('/active{food_id}', 'foodController@active')->name('active_fd');
    Route::get('/inactive{food_id}', 'foodController@inactive')->name('inactive_fd');
    Route::get('/delete{food_id}', 'foodController@delete')->name('delete_fd');
    Route::post('/update', 'foodController@update')->name('update_fd');
});
/* FOOD */

/* ORDER */
Route::prefix('order')->middleware([CheckAuthMiddleware::class])->group(function(){
    Route::get('/manage', 'OrderController@manage')->name('manage_order');
    Route::get('/detail/{order_id}', 'OrderController@viewOrder')->name('view_order');
    Route::get('/bill/{order_id}', 'OrderController@viewBill')->name('view_bill');
    Route::get('/download/bill/{order_id}', 'OrderController@downloadBill')->name('download_bill');
    Route::get('/delete/{order_id}', 'OrderController@deleteOrder')->name('delete_order');
});
/* ORDER */

/* MANAGER ORDER */
Route::get('manager/order/manage', 'ManagerOrderController@manage')->name('manager_manage_order');
Route::get('manager/order/detail/{order_id}', 'ManagerOrderController@viewOrder')->name('manager_view_order');
Route::get('manager/order/bill/{order_id}', 'ManagerOrderController@viewBill')->name('manager_view_bill');
Route::get('manager/order/download/bill/{order_id}', 'ManagerOrderController@downloadBill')->name('manager_download_bill');
Route::get('manager/order/delete/{order_id}', 'ManagerOrder@deleteOrder')->name('manager_delete_order');
/* MANAGER ORDER */


/* MANAGER FOOD */
Route::prefix('manager/food')->middleware([CheckAuthMiddleware::class])->group(function(){
    Route::get('/add', 'ManagerFoodController@index')->name('manager_show_food_table');
    Route::post('/save', 'ManagerFoodController@save')->name('manager_food_save');
    Route::get('/manage', 'ManagerFoodController@manage')->name('manager_manage_food');
    Route::get('/active{food_id}', 'ManagerFoodController@active')->name('manager_active_fd');
    Route::get('/inactive{food_id}', 'ManagerFoodController@inactive')->name('manager_inactive_fd');
    Route::get('/delete{food_id}', 'ManagerFoodController@delete')->name('manager_delete_fd');
    Route::post('/update', 'ManagerFoodController@update')->name('manager_update_fd');
});
/* MANAGER FOOD*/

/* SHIPPER ORDER*/
Route::get('shipper/order/manage', 'ShipperOrderController@manage')->name('shipper_manage_order');
Route::get('shipper/order/detail/{order_id}', 'ShipperOrderController@viewOrder')->name('shipper_view_order');
Route::get('shipper/order/bill/{order_id}', 'ShipperOrderController@viewBill')->name('shipper_view_bill');
Route::get('shipper/order/download/bill/{order_id}', 'ShipperOrderController@downloadBill')->name('shipper_download_bill');
Route::get('shipper/order/delete/{order_id}', 'ShipperOrderController@deleteOrder')->name('shipper_delete_order');
Route::get('shipper/order/confirm/{order_id}', 'ShipperOrderController@confirmOrder')->name('shipper_confirm_order');
Route::get('shipper/order/refuse/{order_id}', 'ShipperOrderController@refuseOrder')->name('shipper_refuse_order');
/* SHIPPER ORDER */
