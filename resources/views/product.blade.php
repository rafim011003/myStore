@extends('layouts.app')

@section('content')
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
<div class="card">
    <div class="card-header">
        <a href="product/create" class="btn btn-success">
              Add
              </a></div>
    <table class="table table-hover ">
      <tr class="bg-light">
        <th class="text-center">NO</th>
        <th class="text-center">Product-Title</th>
        <th class="text-center">Product-Slug</th>
        <th class="text-center">Product-Image</th>
        <th class="text-center">Product-Price</th>
        <th width="280px" class="text-md-center">Action</th>
      </tr>
      @forelse ($product as $pr)
      <tr>
          <td class="text-md-center">{{ $loop->iteration }}</td>
          <td class="text-md-center">{{ $pr->product_title }}</td>
          <td class="text-md-center">{{ $pr->product_slug }}</td> 
          <td class="text-md-center">{{ $pr->product_image }}</td>
          <td class="text-md-center">{{ $pr->product_price }}</td>
          <td class="text-md-center">
            <form action="{{ route('product.destroy', $pr->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('product.show', $pr->product_slug) }}" class="btn btn-light border-dark">
              Detail
              </a>  
              <a href="{{ route('product.edit', $pr->product_slug) }}" class="btn btn-info">
              Edit
              </a>
              <button type="submit" class="btn btn-danger">
              Delete
              </button>
            </form>
          </td>
      </tr>    
      @empty
        <tr>
          <td colspan="8" class="text-center">No Data</td>
        </tr>
      @endforelse
    </table>
    {{ $product->links() }}
    </div>
@endsection