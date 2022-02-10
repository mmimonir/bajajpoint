<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function customerSearch()
    {
        return view('welcome');
    }
    public function index()
    {
        return view('dashboard');
    }
    public function login()
    {
        return view('dashboard');
    }
}
