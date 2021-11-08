@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>
                    <form class="white form-group" action="{{route('category.update', [$category])}}" method="post">
                        <div class="form-group row">
                            <label for="category_title" class="col-md-4 col-form-label text-md-right"> Title: </label>
                            <input class="gray form-control col-md-6" type="text" name="category_title" value="{{$category->title}}" />
                        </div>
                        <div class="form-group row">
                            <label for="category_description" class="col-md-4 col-form-label text-md-right"> Description: </label>
                            <div class="col-md-6">
                                <textarea class="summernote" name="category_description" cols="5" rows="5">{{$category->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_shop_id" class="col-md-4 col-form-label text-md-right"> Shop info: </label>
                            <select class="form-control col-md-6" name="category_shop_id">
                                @foreach ($shops as $shop)
                                <option value="{{$shop->id}}" @if($shop->id == $category->shop_id) selected @endif >{{$shop->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Edit Category</button>
                    </form>
                                <a class="btn btn-link"style="color: red" href="{{ url('/categorys')}}">Back</a>

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
