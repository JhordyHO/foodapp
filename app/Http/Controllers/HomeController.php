<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\link;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $link = link::all();
        $category = Category::all();
        $producto = Product::all();
        return view('welcome',['links'=>$link,'category'=>$category,'product'=>$producto]);
    }
}
