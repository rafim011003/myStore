@extends('layouts.app')

@section('content')
<div class="row">
    
    </div>
    <div class="col-5">
        <div class="card">
            <div class="card-header bg-info">
                <a href="{{ url('/product/') }}">
                    <button class="btn btn-xs btn-dark float-left mr-2"><i class="fa fa-backspace"></i> Back</button>
                </a>
                <h3>Add Product</h3>
            </div>
            <div class="card-body">
                <form action="/product/upload/data" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail">Upload File</label>
                        <input type="file" class="form-control" name="file">
                    </div>
                    <input class="btn btn-success                                                                                                                                                float-right" type="submit" value="Simpan Data">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection