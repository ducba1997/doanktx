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

Route::get('/danhsachsinhvien' , function (){
    return view('sinhvien.danhsach');
});
Route::get('/themsv', function(){
    return view('sinhvien.themsv');
 });
Route::get('/qlphong', function () {
     return view('qlphong.qlphong');
 });
Auth::routes();




Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
    Route::get('/', function (){
        return view('backend.index');
    })->name('admin.dashboard.index');
    Route::get('thuephong/phong','Manage\ThuePhongController@thuephongdon')->name('admin.thuephong.phong');
    Route::resource('nguoiQuanLies', 'Manage\NguoiQuanLyController', ["as" => 'admin']);
    Route::resource('gioiTinhs', 'Manage\GioiTinhController', ["as" => 'admin']);
    Route::resource('khus', 'Manage\KhuController', ["as" => 'admin']);
    Route::resource('khoas', 'Manage\KhoaController', ["as" => 'admin']);
    Route::resource('quyens', 'Manage\QuyenController', ["as" => 'admin']);
    Route::resource('tangs', 'Manage\TangController', ["as" => 'admin']);
    Route::resource('loaiPhongs', 'Manage\Loai_phongController', ["as" => 'admin']);
    Route::resource('loaiPhongs', 'Manage\Loai_phongController', ["as" => 'admin']);
    Route::resource('phongs', 'Manage\PhongController', ["as" => 'admin']);
    Route::resource('chiTietPhongs', 'Manage\ChiTietPhongController', ["as" => 'admin']);
    Route::resource('sinhViens', 'Manage\SinhVienController', ["as" => 'admin']);
    Route::resource('sinhViens', 'Manage\SinhVienController', ["as" => 'admin']);
    Route::resource('loaiPhongs', 'Manage\LoaiPhongController', ["as" => 'admin']);
    Route::resource('sinhViens', 'Manage\SinhVienController', ["as" => 'admin']);
    Route::resource('thuePhongs', 'Manage\ThuePhongController', ["as" => 'admin']);
    Route::get('sinhViens/import/importExcel','Manage\SinhVienController@getImport')->name('sinhvien.importGet');
    Route::post('sinhViens/import/importExcel','Manage\SinhVienController@postImport')->name('sinhvien.importPost');
});



