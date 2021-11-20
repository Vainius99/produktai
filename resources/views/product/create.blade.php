@extends('layouts.app')

@section('content')

<div class="container">

    {{-- @if ($errors->any())


        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <ul>
                <li>{{$error}}</li>
            </ul>
        </div>
        @endforeach
    @endif

@error('product_title')
    <div class="btn btn-danger">
        {{$message}}
    </div>
@enderror --}}

{{-- @error('description')
    <div class="btn btn-danger">
        {{$message}}
    </div>
@enderror --}}


    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Create') }} </div>
                    <form class="white form-group" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="product_title" class="col-md-4 col-form-label text-md-right"> Title: </label>
                            <input class="gray form-control col-md-6 @error('product_title') is-invalid @enderror" required="required" type="text" name="product_title" value="" />
                            @error('product_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="product_excertpt" class="col-md-4 col-form-label text-md-right"> Excertpt: </label>
                            <div class="col-md-6">
                                <textarea class="summernote" name="product_excertpt" cols="5" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_description" class="col-md-4 col-form-label text-md-right"> Description: </label>
                            <div class="col-md-6">
                                <textarea class="summernote" name="product_description" cols="5" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_price" class="col-md-4 col-form-label text-md-right"> Price: </label>
                            <input class="gray form-control col-md-6 @error('product_price') is-invalid @enderror" required="required" type="text" name="product_price" value="" />
                            @error('product_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="product_image" class="col-md-4 col-form-label text-md-right"> Image: </label>
                            <input class="gray form-control col-md-6 @error('product_image') is-invalid @enderror" type="text" name="product_image" value="" />
                            @error('product_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="product_category_id" class="col-md-4 col-form-label text-md-right"> Category: </label>
                            <select class="form-control col-md-6 @error('product_category_id') is-invalid @enderror" name="product_category_id">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Create product</button>
                    </form>
                                <a class="btn btn-link"style="color: red" href="{{ url('/categories')}}">Back</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        {{-- <script>
            $(document).ready(function() {
                $('.summernote').summernote();
            });
        </script> --}}

@endsection
