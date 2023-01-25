<?php

use Route\Route;
use controller\mainController;
use controller\UserController;
use controller\AdminController;
use controller\loginController;
use controller\LogoutController;
use controller\RegisterController;



                //Admin section

Route::get('/',[mainController::class,'dashboard']);


//user filter routes
Route::get('/users',[mainController::class,'userOnlyDashboard']);
Route::get('/admins',[mainController::class,'adminsOnlyDashboard']);
Route::get('/moderators',[mainController::class,'moderatorsOnlyDashboard']);


//Authentication
Route::get('/loginPage',[loginController::class,'loginPage']);
Route::post('/login',[loginController::class,'login']);

//Registration
Route::get('/register/page',[RegisterController::class,'registerPage']);
Route::post('/register',[RegisterController::class,'register']);


//update
Route::post('/admin/update/data',[AdminController::class,'updateLoginUserData']);



//update from admin 

//for render page
Route::get('/admin/user/update/page',[AdminController::class,'AdminUpdateUserDataPage']);
//for update data
Route::post('/admin/user/update',[AdminController::class,'AdminUpdateUserData']);


//Delete
Route::post('/user/delete',[AdminController::class,'userDelete']);



//Creation
Route::post('/create',[mainController::class,'create']);


//logout
Route::post('/logout',[LogoutController::class,'logout']);



                           //User section
Route::get('/user/profile',[UserController::class,'userProfile']);
Route::get('/user/profile/update/page',[UserController::class,'userProfileUpdatePage']);
Route::get('/user/profile/update',[UserController::class,'userProfileUpdate']);