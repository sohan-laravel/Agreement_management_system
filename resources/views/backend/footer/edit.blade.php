@extends('backend.layouts.app')

@section('title')
    Footer Edit
@endsection

@section('css')
   
@endsection

@section('backend-content')

<div class="container mt-3">
    <div class="card">
        <div class="card-header">

            <h3 class="card-title">Footer Edit</h3>

            <div class="container">
                <a href="{{ route('admin.footer.index') }}" class="btn btn-outline-info btn-sm float-right">
                   <i class="fas fa-plus-circle fa-w-20"></i><span> Back</span>
                </a>
            </div>
        </div>

        <div class="card-body">
    
            <form action="{{ route('admin.footer.update', $footer->id) }}" method="post">

                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="number">Number</label>
                    <input type="number" class="form-control" name="number" value="{{ $footer->number }}" placeholder="Enter Your Number">
                </div>

                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" class="form-control" name="facebook" value="{{ $footer->facebook }}" placeholder="Enter Your Facebook URL Like https://.....">
                </div>
                <div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input type="text" class="form-control" name="twitter" value="{{ $footer->twitter }}" placeholder="Enter Your Twitter URL Like https://.....">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" class="form-control" name="email" value="{{ $footer->email }}" placeholder="Enter Your email">
                </div>
                <div class="form-group">
                    <label for="youtube">youtube</label>
                    <input type="text" class="form-control" name="youtube" value="{{ $footer->youtube }}" placeholder="Enter Your youtube URL Like https://.....">
                </div>

                <button type="submit" class="btn btn-outline-primary btn-sm mt-3">Update</button>
            </form>

        </div>
    </div>
</div>
   
@endsection

@section('js')
@endsection