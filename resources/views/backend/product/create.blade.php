@extends('backend.layouts.app')

@section('title')
    Product Create
@endsection

@section('css')
   
@endsection

@section('backend-content')

<div class="container mt-3">
    <div class="card">
        <div class="card-header">

            <h3 class="card-title">Product Add</h3>

            <div class="container">
                <a href="{{ route('admin.product.index') }}" class="btn btn-outline-info btn-sm float-right">
                   <i class="fas fa-plus-circle fa-w-20"></i><span> Back</span>
                </a>
            </div>
        </div>

        <div class="card-body">
    
            <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter product Name">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" placeholder="Enter product Price">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <button type="submit" class="btn btn-outline-primary btn-sm mt-3">Submit</button>
            </form>

        </div>
    </div>
</div>
   
@endsection

@section('js')

@endsection