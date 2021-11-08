@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Category Info') }}</div>
                    <div class="card-body">
                        <div class="form-group center">
                            <p> ID Number: {{$category->id}}</p>
                        </div>
                        <div class="form-group center">
                            <p> Title: {{$category->title}}</p>
                        </div>
                        <div class="form-group center">
                            <p>Description: {{$category->description}}</p>
                        </div>
                        <div class="card-header gray">{{ __('Shop Info') }}</div>
                        <div class="form-group center">
                            <p>{{$category->categoryShop->title}} </p><br>
                            <p> {{$category->categoryShop->email}}</p><br>
                            <p>{{$category->categoryShop->phone}}</p><br>
                            <p>{{$category->categoryShop->country}}</p><br>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
