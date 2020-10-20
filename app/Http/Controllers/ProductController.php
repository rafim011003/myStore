<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
// use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    public function index()
    {
      $posts = Product::orderBy('created_at', 'DESC')->get();
      $product = Product::paginate(10);
      return view('product', compact('product'));
    }

    public function exportXL()
    {
      return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function exportCSV()
    {
      return Excel::download(new ProductsExport, 'products.csv');
    }

    public function exportPDF()
    {
      return Excel::download(new ProductsExport, 'products.pdf');
    }

    public function upload()
    {
      return view('uploadData');
    }

    public function uploadData(Request $request)
    {
      Excel::import(new ProductsImport, $request->file('file')->store('temp'));
      return redirect('/product');
    }

    public function showProduct($slug)
    {
      // $product = Product::where('product_slug', $slug)
      //         ->firstOrFail();

      // return view('product', compact('product'));

      return view("product.create");

    }

    public function create()
    {
      return view("product.create");
    }

    public function store(Request $request)
    {
      if (Product::where('product_slug', $request->product_slug)->exists()) {          
        // Toastr::error('error', 'Slug Sudah Ada');  
      } else{          
        $product = new Product;
        $product->product_title = $request->product_title;
        $product->product_slug =\Str::slug ($request->product_slug);
        $product->product_image = $request->product_image;
        $product->product_price = $request->product_price;
        $product->save();    
        // Toastr::success('Berhasil', 'Slug masuk Ada');  
      }
      return redirect('product'); 
    }

    public function show(Product $product)
    {
      return view("product.show", compact("product"));
    }

    public function edit($slug)
    {
      $product = Product::where('product_slug', $slug)
                ->firstOrFail();

      return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
      if(Product::where('product_slug', $request->product_slug)->exists()){
        // Toastr::error('Error', 'Slug sudah ada');
      } else {
        $request->validate([
          'product_title' => 'required',
          'product_slug'    => 'required',
          'product_image' => 'required',
        ]);
        $product->update($request->all());
        // Toastr::success('Slug Berhasil di Edit','Success');
      }
     
      
      return redirect('product');
    }

    public function destroy(Product $product)  
   {
      $product->delete();
      // Toastr::success('Data Has Been Delete','Success');  
      return redirect('product');
    }
}