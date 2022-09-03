<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $categoryies = Category::count();
        $products = Product::count();
        return view('dashboard', compact('categoryies', 'products'));
    }

    public function accessDenid()
    {
        return view('access-denid');
    }
}
