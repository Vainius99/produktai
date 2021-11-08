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

@error('shop_title')
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
                    <form class="white form-group" action="{{route('shop.store')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="shop_title" class="col-md-4 col-form-label text-md-right"> Title: </label>
                            <input class="gray form-control col-md-6 @error('shop_title') is-invalid @enderror" required="required" type="text" name="shop_title" value="" />
                            @error('shop_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="shop_description" class="col-md-4 col-form-label text-md-right"> Description: </label>
                            <div class="col-md-6">
                                <textarea class="summernote @error('shop_description') is-invalid @enderror" name="shop_description" cols="5" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="shop_email" class="col-md-4 col-form-label text-md-right"> Email: </label>
                            <input class="gray form-control col-md-6 @error('shop_email') is-invalid @enderror" required="required" type="text" name="shop_email" value="" />
                            @error('shop_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="shop_phone" class="col-md-4 col-form-label text-md-right"> Phone: </label>
                            <input class="gray form-control col-md-6 @error('shop_phone') is-invalid @enderror" required="required" type="text" name="shop_phone" value="" />
                            @error('shop_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="shop_country" class="col-md-4 col-form-label text-md-right"> Country: </label>
                            <input class="gray form-control col-md-6 @error('shop_country') is-invalid @enderror" required="required" type="text" name="shop_country" value="" />
                            @error('shop_country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Create Shop</button>
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
        <script>
            $(document).ready(function() {
                $('.summernote').summernote();
            });
        </script>

@endsection
