@extends('layouts');
@section('content')
<div class="container mt-2">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
                <a href="" class="btn btn-danger" id="deleteAllPost">Delete All</a>
            </div>
        </div>
    </div>   
    <table class="table table-bordered">
        <tr>
            <th width="40px"><input type="checkbox" id="checAll"></th>
            <th>S.No</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($posts as $key => $post)
        <tr id="postid{{ $post->id  }}">
            <td> <input type="checkbox" name="ids" class="checkBoxClass" value="{{ $post->id }}"> </td>
            <td>{{ $key+1 }}</td>
            <td><img src="{{ Storage::url($post->image) }}" height="75" width="75" alt="dfghdfh" /></td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->description }}</td>
            <td>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>    
@endsection