<?php

namespace App\Http\Controllers;
use App\Models\Product;
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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
      $query = Product::whereNull('deleted_at');
      if( $request->has('sort') ) {
        $order = $request->query('sort');
        switch ($order) {
          case 'high_low':
            $query->orderBy('price', 'desc')->paginate(12);
            
            break;

          case 'low_high':
            $query->orderBy('price', 'asc')->paginate(12);
            break;

          case 'new':
            $query->orderBy('id', 'desc')->paginate(12);
            break;

          case 'rating':
        
            break;
          
          default:
            # code...
            break;
        }
      }
      $products = $query->paginate(12);
      return view('home', compact('products'));
    }
}
