<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){

    }

    /**
     * main render method
     * @return string
     */
    public function index(): string
    {
        return redirect()->route('login'); //named route
    }
//    public function show(string $id)
//    {
//        return to_route('transaction', ["id" => 5]); //named route + parameter
//
//    }
    public function login()
    {
        return "login page";
    }


    /**
     * Request Injected in method, not in constructor => not need in other methods
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        return "index";
    }
}
