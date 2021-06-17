<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[App\Http\Controllers\UserAuthcontroller::class,'viewLogin']);

Route::post('/auth_check',[App\Http\Controllers\UserAuthcontroller::class,'check']);

Route::get('/signup',[App\Http\Controllers\UserAuthcontroller::class,'viewSignup']);

Route::post('/register',[App\Http\Controllers\UserAuthcontroller::class,'store']);

Route::get('/dashboard',[App\Http\Controllers\UserAuthcontroller::class,'viewDashboard']);

Route::get('/logout',[App\Http\Controllers\UserAuthcontroller::class,'logOut']);

Route::post('/area_admin',[App\Http\Controllers\UserAuthcontroller::class,'createAreaAdmin']);

Route::get('/areaadmin',[App\Http\Controllers\UserAuthcontroller::class,'viewAllAdmins']);

Route::get('/deleteareaadmin/{id}',[App\Http\Controllers\UserAuthcontroller::class,'deleteAreaAdmin']);

Route::get('/dept_admins_details',[App\Http\Controllers\UserAuthcontroller::class,'viewAllDeptAdmin']);

Route::get('/deletedeptadmin/{id}',[App\Http\Controllers\UserAuthcontroller::class,'deleteDeptAdmin']);

// area admin starts here

Route::get('/areaadmin_login',[App\Http\Controllers\SubAdminController::class,'viewAreaAdminLogin']);

Route::post('/area_admin_check',[App\Http\Controllers\SubAdminController::class,'checkareaadmin']);

Route::get('/areaadmin_dashboard',[App\Http\Controllers\SubAdminController::class,'viewAreaAdminDashboard']);

Route::post('/new_dept_admin',[App\Http\Controllers\SubAdminController::class,'storeDeptAdmin']);

Route::get('/dept_admins',[App\Http\Controllers\SubAdminController::class,'viewAllDeptAdmins']);

Route::get('/deletedeptadmin/{id}',[App\Http\Controllers\SubAdminController::class,'deleteDeptAdmin']);

//dept admin starts here
Route::get('/deptadmin_login',[App\Http\Controllers\DeptAdminController::class,'viewDeptadminLogin']);

Route::post('/authcheck_dept',[App\Http\Controllers\DeptAdminController::class,'checkDeptAdmin']);

Route::get('/common_dashboard',[App\Http\Controllers\DeptAdminController::class,'viewDeptadminDashboard']);
