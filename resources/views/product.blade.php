@extends('layouts.app')

@section('content')
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-hover ">
      <tr class="bg-light">
        <th class="text-center">NO</th>
        <th class="text-center">Product-Title</th>
        <th class="text-center">Product-Slug</th>
        <th class="text-center">Product-Image</th>
        <th width="280px" class="text-md-center">Action</th>
      </tr>
      @forelse ($product as $pr)
      <tr>
          <td class="text-md-center">{{ $loop->iteration }}</td>
          <td class="text-md-center">{{ $pr->product_title }}</td>
          <td class="text-md-center">{{ $pr->product_slug }}</td> 
          <td class="text-md-center">{{ $pr->product_image }}</td>
          <td class="text-md-center">
            <form action="{{ route('product.destroy', $pr->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('product.show', $pr->id) }}" class="btn btn-primary">
              Detail
              </a>
              <a href="{{ route('product.edit', $pr->id) }}" class="btn btn-info">
              EDIT
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
@endsection