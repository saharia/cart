<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
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
     * Display a listing of the product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $products = Product::where('added_by', $user->id)->sortable()->paginate(10);

        // dd($products);
        return view('product.lists', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.index');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
          'name' => ['required'],
          'description' => ['required'],
          'content' => ['required'],
          'price' => ['required'],
          'scale_price' => ['required'],
          'quantity' => ['required'],
          'weight' => ['required'],
          'length' => ['required'],
          'wide' => ['required'],
          'height' => ['required'],
      ]);

      
      $user = Auth::user();
      $data = [
        'name' => $request->name,
        'description' => $request->description,
        'content' => $request->content,
        'price' => $request->price,
        'scale_price' => $request->scale_price,
        'quantity' => $request->quantity,
        'weight' => $request->weight,
        'length' => $request->length,
        'wide' => $request->wide,
        'height' => $request->height,
        'with_storehouse' => $request->with_storehouse ? 1 : 0,
        'allow_checkout_when_out_of_stock' => $request->allow_checkout_when_out_of_stock ? 1 : 0,
        'is_featured' => $request->is_featured ? 1 : 0,
        'added_by' => $user->id
      ];
      $product = Product::create($data);

      if($request->hasFile('images')) {
        $allowedfileExtension=['jpg','png'];
        $files = $request->file('images');
        foreach($files as $file){
          $filename = $file->getClientOriginalName();
          $extension = $file->getClientOriginalExtension();
          $check = in_array($extension,$allowedfileExtension);
          //dd($check);
          if($check) {
            $fileName = $file->store('images');
            $image = [
              'name' => basename($fileName),
              'product_id' => $product->id
            ];
            Image::create($image);
          }
        }
      }


      return redirect('products');
    }

    /**
     * Display the specified product.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
          'name' => ['required'],
          'description' => ['required'],
          'content' => ['required'],
          'price' => ['required'],
          'scale_price' => ['required'],
          'quantity' => ['required'],
          'weight' => ['required'],
          'length' => ['required'],
          'wide' => ['required'],
          'height' => ['required'],
      ]);

      
      $product->name = $request->name;
      $product->description = $request->description;
      $product->content = $request->content;
      $product->price = $request->price;
      $product->scale_price = $request->scale_price;
      $product->quantity = $request->quantity;
      $product->weight = $request->weight;
      $product->length = $request->length;
      $product->wide = $request->wide;
      $product->height = $request->height;
      $product->with_storehouse = $request->with_storehouse ? 1 : 0;
      $product->allow_checkout_when_out_of_stock = $request->allow_checkout_when_out_of_stock ? 1 : 0;
      $product->is_featured = $request->is_featured ? 1 : 0;
      $product->save();

      if($request->hasFile('images')) {
        $allowedfileExtension=['jpg','png'];
        $files = $request->file('images');
        foreach($files as $file){
          $filename = $file->getClientOriginalName();
          $extension = $file->getClientOriginalExtension();
          $check = in_array($extension,$allowedfileExtension);
          if($check) {
            $fileName = $file->store('images');
            $image = [
              'name' => basename($fileName),
              'product_id' => $product->id
            ];
            Image::create($image);
          }
        }
      }


      return redirect('products');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect('products');
    }
}
