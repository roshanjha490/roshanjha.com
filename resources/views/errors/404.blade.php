@extends('layouts.layout1')

@section('title', 'Page Not Found')

@section('content')

<div id="page_404" class="w-100 h-100 position-absolute top-50 left-50 translate-center">
    <div class="container w-100 h-100">
        <div class="row text-center">
            <div class="col-md-6 offset-md-3 error-div w-100 h-100 d-flex justify-content-center align-items-center">
                <div class="w-auto h-auto">
                    <h1>404</h1>
                    <h6>Page not found</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="w-100 h-450px"></div>

@endsection('content')