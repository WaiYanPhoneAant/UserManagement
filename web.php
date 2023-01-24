<?php

use Route\Route;
use controller\mainController;
use controller\UserController;
use controller\loginController;
use controller\LogoutController;
use controller\RegisterController;





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
Route::post('/admin/update/data',[UserController::class,'updateUserData']);
//Delete
Route::post('/user/delete',[UserController::class,'userDelete']);


//Creation
Route::post('/create',[mainController::class,'create']);
// Route::get('/te',[mainController::class,'test']);



//logout
Route::post('/logout',[LogoutController::class,'logout']);
