<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HocvienController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\KhoahocController;
use App\Http\Controllers\gioithieucontroller;
use App\Http\Controllers\DangkyController;
use App\Http\Controllers\khoahocOnline;
use App\Http\Controllers\UsermanagerController;
use App\Http\Controllers\UserController;




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

Route::get('/admin', [CourseController::class, 'index_admin']);



//Login
Route::get('/loginadmin', [CourseController::class, 'loginadmin']);
Route::post('/admin1', [CourseController::class,'Login']);
Route::get('/dangxuatadmin', [CourseController::class,'Logout']);
Route::get('/change-password',[CourseController::class,'change_password']);
Route::post('/update-password',[CourseController::class,'update_password']);
//Khoa hoc
Route::get('/all-course', [CourseController::class, 'all_course']);
Route::get('/add-course', [CourseController::class, 'add_course']);
Route::post('/save-course', [CourseController::class, 'save_course']);
Route::get('/edit-course/{makh}', [CourseController::class, 'edit_course']);
Route::post('/update-course/{makh}', [CourseController::class, 'update_course']);
Route::get('/delete-course/{makh}', [CourseController::class, 'delete_course']);
Route::get('/them-daotao', [CourseController::class, 'them_daotao']);
Route::post('/save-daotao', [CourseController::class, 'save_daotao']);
Route::get('/all-daotao', [CourseController::class, 'all_daotao']);
Route::get('/edit-daotao/{madaotao}', [CourseController::class, 'edit_daotao']);
Route::post('/update-daotao/{madaotao}', [CourseController::class, 'update_daotao']);
Route::get('/delete-daotao/{madaotao}', [CourseController::class, 'delete_daotao']);

Route::get('/them-user', [UserController::class, 'them_user']);
Route::post('/save-user', [UserController::class, 'save_user']);
Route::get('/all-user', [UserController::class, 'all_user']);
Route::get('/delete-user/{matk}', [UserController::class, 'delete_user']);


//Đăng nhập Frontend
Route::get('/',[gioithieucontroller::class,'trangchu']);
Route::get('/gt',[gioithieucontroller::class,'trangchu']);
Route::get('/dangnhap',[gioithieucontroller::class,'dangnhap']);
Route::get('/dangxuat',[gioithieucontroller::class,'dangxuat']);
Route::post('/dangnhaptc',[gioithieucontroller::class,'dangnhaptc']);
Route::get('/gioithieu',[gioithieucontroller::class,'gioithieu']);
//Đăng ký Frontend
Route::post('/adduser',[DangkyController::class,'add_user']);
//Quên mật khẩu frontend
Route::get('/quenmk',[DangkyController::class,'quenmk']);
Route::get('/guimail',[DangkyController::class,'guimail']);
Route::get('/updatemk',[DangkyController::class,'updatemk']);
Route::post('/recover-pass',[DangkyController::class,'recover_pass']);


//Hoc vien
Route::get('/all-hocvien',[HocvienController::class,'all_hocvien']);

//khoa hoc user
Route::get('/khoahoc/{madaotao}', [KhoahocController::class,'khoahoc']);
Route::get('/chitietkhoahoc/{makh}', [KhoahocController::class,'chitietkhoahoc']);
Route::get('/add_khoahoc/{makh}', [KhoahocController::class,'add_khoahoc']);
Route::post('/timkiem', [KhoahocController::class,'timkiem']);

// User manager
Route::get('/user-manager', [UsermanagerController::class,'index']);
Route::get('/update-infor', [UsermanagerController::class,'update_infor']);
Route::post('/save-infor', [UsermanagerController::class,'save_infor']);
Route::get('/check-course', [UsermanagerController::class,'check_course']);
Route::get('/change-password-user', [UsermanagerController::class,'change_password_user']);
Route::post('/update-password-user', [UsermanagerController::class,'update_password_user']);

//Khoa hoc online
Route::get('/khonl',[CourseController::class,'khonline']);
Route::get('/ctkhonl',[CourseController::class,'ctkhonl']);
Route::get('/all-khonl',[CourseController::class,'all_khonl']);
Route::get('/add-khonl',[CourseController::class,'add_khonl']);
Route::post('/save-khonl', [CourseController::class, 'save_khonl']);
Route::get('/edit-khonl/{makh_onl}', [CourseController::class, 'edit_khonl']);
Route::post('/update-khonl/{makh_onl}', [CourseController::class, 'update_khonl']);
Route::get('/delete-khonl/{makh_onl}', [CourseController::class, 'delete_khonl']);
//Bài học online
// Route::get('/khonline',[CourseController::class,'khonline']);
// Route::get('/ctkhonl',[CourseController::class,'ctkhonl']);
Route::get('/allbaihoc',[CourseController::class,'all_baihoc']);
Route::get('/add-baihoc',[CourseController::class,'add_baihoc']);
Route::get('/huy-baihoc',[CourseController::class,'huyBH']);
Route::post('/save-baihoc', [CourseController::class, 'save_baihoc']);
Route::get('/edit-baihoc/{mabh}', [CourseController::class, 'edit_baihoc']);
Route::post('/update-baihoc/{mabh}', [CourseController::class, 'update_baihoc']);
Route::get('/delete-baihoc/{mabh}', [CourseController::class, 'delete_baihoc']);
//Khóa học online học viên
Route::get('/khonl/{madaotao}',[CourseController::class,'khonl']);
Route::get('/ctkhonl/{makh_onl}',[CourseController::class,'chitietkhonl']);
Route::get('/listbaihoc/{makh_onl}',[CourseController::class,'listbaihoc']);
Route::get('/ctbaihoc/{mabh}',[CourseController::class,'ctbaihoc']);
Route::post('/ctbaihoc/{mabh}', [CourseController::class, 'postComment']);
//payment
Route::get('/payment/{makh_onl}',[CourseController::class,'payment']);
Route::post('/paymentonl',[CourseController::class,'createPayment']);
Route::get('/vnpayreturn',[CourseController::class,'vnpayReturn'])->name('vnpay.return');

// Bài kiểm tra
Route::get('/view-question/{id_baitest}',[CourseController::class,'view_question']);
Route::get('/baitest/{id_baitest}',[CourseController::class,'baitest']);
Route::get('/edit-question/{id_cauhoi}',[CourseController::class, 'edit_question']);
Route::post('/update-question/{id_cauhoi}',[CourseController::class, 'update_question']);
//Exam-admin
Route::get('/all-exam',[CourseController::class,'all_exam']);
Route::get('/add-exam',[CourseController::class,'add_exam']);
Route::post('/save-exam', [CourseController::class, 'save_exam']);
Route::get('/edit-exam/{id_baitest}', [CourseController::class, 'edit_exam']);
Route::post('/update-exam/{id_baitest}', [CourseController::class, 'update_exam']);
Route::get('/delete-exam/{id_baitest}', [CourseController::class, 'delete_exam']);

//exam
Route::post('/export-csv',[CourseController::class, 'export_csv']);
Route::post('/import-csv',[CourseController::class, 'import_csv']);
Route::get('/listexam',[CourseController::class,'listexam']);

////Login facebook
Route::get('/login-facebook',[gioithieucontroller::class,'login_facebook']);
Route::get('/gt/callback',[gioithieucontroller::class,'callback_facebook']);
///forgotpassword
Route::get('/forgotpassword',[gioithieucontroller::class,'forgotpassword']);
Route::post('/recover_password',[gioithieucontroller::class,'recover_password']);


