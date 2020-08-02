<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return $this->isAdmin(view('dashboard'));
    }

    public function users()
    {
        return $this->isAdmin(view('dashboard.users'));
    }
    public function categories()
    {
        return $this->isAdmin(view('dashboard.categories'));
    }
    public function products()
    {
        $products = Product::all();
        return $this->isAdmin(view('dashboard.products', compact('products')));
    }

    public function isAdmin($view)
    {
        if (Auth::user()->role == 1) {
            return $view;
        } else {
            return redirect()->route('home');
        }
    }
}
