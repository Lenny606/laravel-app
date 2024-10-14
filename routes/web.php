<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

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

//optional route params
Route::get('/transactions/{id?}/{type}', function ($id = 'default_value') {
    return $id;
})->whereNumber(["id"])
    ->whereIn('type', ["value1", "value2"]); //only these values accepted else 404
//route param + query string parameters + DI class
Route::get('/country/{type}/{id}?year=2024&month=5', function (\Illuminate\Http\Request $req, \App\Enums\Types $type, $id) {
    $year = $req->get('year');
    $month = $req->get('month');
    $type = $type->value;
    return $id . $type . '-' . $year . '-' . $month;
})->where(["id" => '[0-9]+']);

//REDIRECTS
Route::redirect("/users-2", '/users-3');
