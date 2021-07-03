@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Admin') }}</div>

                <div class="card-body bg-primary">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio quae at autem, maxime a pariatur enim quis eum? Aliquid voluptatibus, eaque magni ducimus repudiandae itaque nemo voluptas iste similique inventore?</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection