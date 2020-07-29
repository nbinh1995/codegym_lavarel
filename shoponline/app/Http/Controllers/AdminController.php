<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
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

    public function index()
    {
        return view('dashboard');
    }

    public function users()
    {
        return view('dashboard.users');
    }
    public function categories()
    {
        return view('dashboard.categories');
    }
    public function products()
    {
        return view('dashboard.products');
    }
}
