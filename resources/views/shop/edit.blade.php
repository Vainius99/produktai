@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>
                    <form class="white form-group" action="{{route('shop.update', [$shop])}}" method="post">
                        <div class="form-group row">
                            <label for="shop_title" class="col-md-4 col-form-label text-md-right"> Title: </label>
                            <input class="gray form-control col-md-6" type="text" name="shop_title" value="{{$shop->title}}" />
                        </div>
                        <div class="form-group row">
                            <label for="shop_description" class="col-md-4 col-form-label text-md-right"> Description: </label>
                            <div class="col-md-6">
                                <textarea class="summernote" name="shop_description" cols="5" rows="5">{{$shop->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="shop_email" class="col-md-4 col-form-label text-md-right"> Email: </label>
                            <input class="gray form-control col-md-6" type="text" name="shop_email" value="{{$shop->email}}" />
                        </div>
                        <div class="form-group row">
                            <label for="shop_phone" class="col-md-4 col-form-label text-md-right"> Phone: </label>
                            <input class="gray form-control col-md-6" type="text" name="shop_phone" value="{{$shop->phone}}" />
                        </div>
                        <div class="form-group row">
                            <label for="shop_country" class="col-md-4 col-form-label text-md-right"> Country: </label>
                            <input class="gray form-control col-md-6" type="text" name="shop_country" value="{{$shop->country}}" />
                        </div>
                    @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Edit Shop</button>
                    </form>
                                <a class="btn btn-link"style="color: red" href="{{ url('/shops')}}">Back</a>

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
