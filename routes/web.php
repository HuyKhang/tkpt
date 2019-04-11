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

Route::get('/', function () {
	return view('welcome');
});

// Route::get('thu', function () {
// 	return view('admin.user.danhsach');
// });
Route::get('admin/trangchu', [
	'as' => 'home',
	'uses' => 'UserController@getHome',
]);

Route::get('admin/dangnhap', 'UserController@getDangnhapAdmin');
Route::post('admin/dangnhap', 'UserController@postDangnhapAdmin');
Route::get('admin/logout', 'UserController@getDangxuatAdmin');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {
	Route::group(['prefix' => 'user', 'middleware' => 'userLogin'], function () {
		//admin/user/danhsach
		Route::get('danhsach', 'UserController@getDanhsach');
		Route::post('danhsach', 'UserController@postDanhsach');
		//admin/user/sua

		//admin/user/them
		Route::get('them', 'UserController@getThem');
		Route::post('them', 'UserController@postThem');
		//admin/user/xoa
		Route::get('xoa/{id}', 'UserController@getXoa');
	});
	Route::get('user/sua/{id}', 'UserController@getSua');
	Route::post('user/sua/{id}', 'UserController@postSua');

	Route::group(['prefix' => 'manufacturer'], function () {
		//admin/manufacturer/danhsach
		Route::get('danhsach', 'ManufacturerController@getDanhsach');
		Route::post('danhsach', 'ManufacturerController@postDanhsach');
		//adminmanufacturer/sua
		Route::get('sua/{id}', 'ManufacturerController@getSua');
		Route::post('sua/{id}', 'ManufacturerController@postSua');
		//admin/manufacturer/them
		Route::get('them', 'ManufacturerController@getThem');
		Route::post('them', 'ManufacturerController@postThem');
		//admin/manufacturer/xoa
		Route::get('xoa/{id}', 'ManufacturerController@getXoa');
	});

	Route::group(['prefix' => 'type_produce'], function () {
		//admin/manufacturer/danhsach
		Route::get('danhsach', 'TypeproduceController@getDanhsach');
		Route::post('danhsach', 'TypeproduceController@postDanhsach');
		//adminmanufacturer/sua
		Route::get('sua/{id}', 'TypeproduceController@getSua');
		Route::post('sua/{id}', 'TypeproduceController@postSua');
		//admin/manufacturer/them
		Route::get('them', 'TypeproduceController@getThem');
		Route::post('them', 'TypeproduceController@postThem');
		//admin/manufacturer/xoa
		Route::get('xoa/{id}', 'TypeproduceController@getXoa');
	});

	Route::group(['prefix' => 'produce'], function () {
		//admin/manufacturer/danhsach
		Route::get('danhsach', 'ProduceController@getDanhsach');
		Route::post('danhsach', 'ProduceController@postDanhsach');
		//adminmanufacturer/sua
		Route::get('sua/{id}', 'ProduceController@getSua');
		Route::post('sua/{id}', 'ProduceController@postSua');
		//admin/manufacturer/them
		Route::get('them', 'ProduceController@getThem');
		Route::post('them', 'ProduceController@postThem');
		//admin/manufacturer/xoa
		Route::get('xoa/{id}', 'ProduceController@getXoa');
	});

	Route::group(['prefix' => 'khachhang'], function () {
		//admin/khachhang/danhsach
		Route::get('danhsach', 'KhachhangController@getDanhsach');
		Route::post('danhsach', 'KhachhangController@postDanhsach');
		//admin/khachhang/sua
		Route::get('sua/{id}', 'KhachhangController@getSua');
		Route::post('sua/{id}', 'KhachhangController@postSua');
		//admin/khachhang/them
		Route::get('them', 'KhachhangController@getThem');
		Route::post('them', 'KhachhangController@postThem');
		//admin/khachhang/xoa
		Route::get('xoa/{id}', 'KhachhangController@getXoa');
	});

	Route::group(['prefix' => 'customer'], function () {
		//admin/khachhang/danhsach
		Route::get('danhsach', 'CustomerController@getDanhsach');
		Route::post('danhsach', 'CustomerController@postDanhsach');
		//admin/khachhang/xoa
		Route::get('xoa/{id}', 'CustomerController@getXoa');
	});

	Route::group(['prefix' => 'bills'], function () {
		//admin/khachhang/danhsach
		Route::get('danhsach', 'BillController@getDanhsach');
		Route::post('danhsach', 'BillController@postDanhsach');
		//admin/khachhang/xoa
		Route::get('xoa/{id}', 'BillController@getXoa');
		Route::get('view/{id}', 'BillController@viewBill');
	});
});