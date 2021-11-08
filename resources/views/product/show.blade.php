@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product Info') }}</div>
                    <div class="card-body">
                        <div class="form-group center">
                            <p> ID Number: {{$product->id}}</p>
                        </div>
                        <div class="form-group center">
                            <p> Title: {{$product->title}}</p>
                        </div>
                        <div class="form-group center">
                            <p>Excertpt: {{$product->excertpt}}</p>
                        </div>
                        <div class="form-group center">
                            <p>Description: {{$product->description}}</p>
                        </div>
                        <div class="form-group center">
                            <p>Price: {{$product->price}}</p>
                        </div>
                        <div class="form-group center">
                            <p>Image: {{$product->image}}</p>
                        </div>
                        <div class="card-header gray">{{ __('product Info') }}</div>
                        <div class="form-group center">
                            <p> {{$product->productCategory->title }}</p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
