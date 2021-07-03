@extends('layouts');
@section('content')
<div class="container mt-2">
    
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
            </div>
            <div class="pull-right mt-1">
            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
        </div>
    </div>
</div>    
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Post Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Post Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Post Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Post Description"></textarea>
                </div>
            </div>        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Post Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="Post Title">
                    @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                 </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
            
        </form>
        
        @endsection