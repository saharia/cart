<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
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
     * Display a listing of the product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::sortable()->paginate(10);

        // dd($products);
        return view('admin.product.lists', compact('products'));
    }
}
