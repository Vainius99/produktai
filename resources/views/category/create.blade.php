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

@error('category_title')
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
                    <form class="white form-group" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="category_title" class="col-md-4 col-form-label text-md-right"> Title: </label>
                            <input class="gray form-control col-md-6 @error('category_title') is-invalid @enderror" required="required" type="text" name="category_title" value="" />
                            @error('category_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="category_description" class="col-md-4 col-form-label text-md-right"> Description: </label>
                            <div class="col-md-6">
                                <textarea class="summernote @error('category_description') is-invalid @enderror" name="category_description" cols="5" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_shop_id" class="col-md-4 col-form-label text-md-right"> Type: </label>
                            <select class="form-control col-md-6 @error('category_types_id') is-invalid @enderror" name="category_shop_id">
                                @foreach ($shops as $shop)
                                <option value="{{$shop->id}}">{{$shop->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Create Category</button>
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
