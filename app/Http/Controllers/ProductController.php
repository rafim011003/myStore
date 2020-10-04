<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $product = Product::all();
      return view('product', compact('product'));
    }

    public function showProduct($slug)
    {
      $product = Product::where('product_slug', $slug)
              ->firstOrFail();

      // if (!$data) {
      //     abort(404);
      // }
      // Atau dengan firstOrFail();

      // dd($data);
      return view('product', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view("product");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
      $request->validate([
        'product_title' => 'required',
        'product_slug' => 'required',
        'product_image' => 'required',
        'product_price' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required'
      ]);

      $product::create($request->all());
      Toastr::success('New Data Has Been added','Success');
      return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
      return view("product.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
      return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
      $request->validate([
          'product_title' => 'required',
          'product_slug'    => 'required',
          'product_image' => 'required',
      ]);
      $product->update($request->all());
      Toastr::success('Data Has Been Updated','Success');
      return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      $product->delete();
      Toastr::success('Data Has Been Delete','Success');
      return redirect('product');
    }
}