@extends('layouts.app')

@section('content')
  <div class="row align-items-center justify-content-center h-100">
    <div class="col-7">
      <div class="card mt-md-3">
        <div class="card-header">
          <div class="row">
            <div class="col text-left">Add Product</div>
            <div class="col text-right">
            <a href="/product" class="btn btn-xs btn-dark">
              <i class="fa fa-backspace"></i> Back  
            </a>
          </div>
        </div>
      </div>
        <div class="card-body">
          <form action="{{ route('product.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="#">Product-Title</label>
              <input type="text" name="product_title" class="form-control" placeholder="Nama Product" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="#">Product-Slug</label>
              <input type="text" name="product_slug" class="form-control" placeholder="Slug" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="#">Product-Image</label>
              <input type="text" name="product_image" class="form-control" placeholder="Gambar" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="#">Product-Price</label>
              <input type="text" name="product_price" class="form-control" placeholder="Harga" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
          </form>                    
        </div>
      </div>
    </div>
  </div>
@endsection