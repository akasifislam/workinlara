@extends('layouts');
@section('content')
<div class="container mt-2">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a href="{{ route('app.download.pdf') }}" class="btn bg-primary">Download</a>
            </div>
            <div class="pull-right mb-2">
            </div>
        </div>
    </div>   
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th width="40px">Sl No</th>
            <th>Name</th>
            <th>Address</th>
        </tr>
        @foreach ($employees as $key => $employee)
        <tr id="postid{{ $employee->id  }}">
            <td>{{ $key+1 }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->address }}</td>
        </tr>
        @endforeach
    </table>    
@endsection