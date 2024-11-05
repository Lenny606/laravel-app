<?php
declare(strict_types=1);
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;

//USERS --------------------------------
//group by prefix
Route::prefix('/')->group(function () {
    //group by controller
    Route::controller(UserController::class)->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/login', [UserController::class, 'login']);
        Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('/create', [UserController::class, 'create']);
        Route::get("/users", function () {
            return ['user', "users2"]; //converst automatically to json
        });
    });
});