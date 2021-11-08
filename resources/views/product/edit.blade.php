@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>
                    <form class="white form-group" action="{{route('product.update', [$product])}}" method="post">
                        <div class="form-group row">
                            <label for="product_title" class="col-md-4 col-form-label text-md-right"> Title: </label>
                            <input class="gray form-control col-md-6" type="text" name="product_title" value="{{$product->title}}" />
                        </div>
                        <div class="form-group row">
                            <label for="product_excertpt" class="col-md-4 col-form-label text-md-right"> Excertpt: </label>
                            <input class="gray form-control col-md-6" type="text" name="product_excertpt" value="{{$product->excertpt}}" />
                        </div>
                        <div class="form-group row">
                            <label for="product_description" class="col-md-4 col-form-label text-md-right"> Description: </label>
                            <div class="col-md-6">
                                <textarea class="summernote" name="product_description" cols="5" rows="5">{{$product->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_price" class="col-md-4 col-form-label text-md-right"> Price: </label>
                            <input class="gray form-control col-md-6" type="text" name="product_price" value="{{$product->price}}" />
                        </div>
                        <div class="form-group row">
                            <label for="product_image" class="col-md-4 col-form-label text-md-right"> Image: </label>
                            <input class="gray form-control col-md-6" type="text" name="product_image" value="{{$product->image}}" />
                        </div>
                        <div class="form-group row">
                            <label for="product_category_id" class="col-md-4 col-form-label text-md-right"> Catgory info: </label>
                            <select class="form-control col-md-6" name="product_category_id">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif >{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Edit Product</button>
                    </form>
                                <a class="btn btn-link"style="color: red" href="{{ url('/products')}}">Back</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <script>
            $(document).ready(function() {
                $('.summernote').summernote();
            });
        </script>

@endsection
