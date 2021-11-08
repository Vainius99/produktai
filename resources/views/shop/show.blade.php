@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Shop Info') }}</div>
                    <div class="card-body">
                        <div class="form-group center">
                            <p> ID Number: {{$shop->id}}</p>
                        </div>
                        <div class="form-group center">
                            <p> Title: {{$shop->title}}</p>
                        </div>
                        <div class="form-group center">
                            <p>Description: {{$shop->description}}</p>
                        </div>
                        <div class="form-group center">
                            <p>Email: {{$shop->email}}</p>
                        </div>
                        <div class="form-group center">
                            <p>Phone: {{$shop->phone}}</p>
                        </div>
                        <div class="form-group center">
                            <p>Country: {{$shop->country}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
