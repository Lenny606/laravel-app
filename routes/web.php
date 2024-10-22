<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProcessTransactionController;

//php artisan route:list
//php artisan route:list --except-vendor/--only-vendor
//php artisan route:list --path=dashboard
//php artisan route:cache //for PROD
//php artisan route:clear //deletes cache

Route::get('/', function () {
    //TODO get list of products
    return view('homepage', ['products' => []]);
});

Route::get("/dashboard", function () {
    return "Welcome to dashboard";
});

Route::get("/users", function () {
    return ['user', "users2"]; //converst automatically to json
});

Route::any("/users-2", function () {
    return ""; //any http method
});
Route::match(['get', "post"], "/users-3", function () {
    return ""; //get/post matching
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//REDIRECTS
Route::redirect("/users-2", '/users-3');

//TRANSACTIONS --------------------------------
Route::get('/transactions', [TransactionController::class ,'index']);
Route::get('/transactions/{id}', [TransactionController::class ,'show'])->whereNumber("id");
Route::post('/transactions/create', [TransactionController::class ,'create']);
Route::post('/transactions', [TransactionController::class ,'store']);

//invokable single action controller
Route::post('/transactions/{id}/process', ProcessTransactionController::class);
