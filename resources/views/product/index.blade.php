@extends('layouts.app')

@section('content')



<div class="container ajax productAdd d-none">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Create') }} </div>
                    {{-- <form class="white form-group" action="{{route('product.index')}}" method="post" enctype="multipart/form-data"> --}}
                        <div class="form-group row">
                            <label for="product_title" class="col-md-4 col-form-label text-md-right"> Title: </label>
                            <div class="col-md-6">
                                <input class="gray form-control" type="text" id="product_title" name="product_title" value="" />
                                <span class="invalid-feedback product_title" role="alert"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_excertpt" class="col-md-4 col-form-label text-md-right"> Excerpt: </label>
                            <div class="col-md-6 product_excertpt" >
                                <textarea name="product_excertpt" id="product_excertpt" cols="5" rows="5"></textarea>
                                <span class="invalid-feedback product_excertpt" role="alert"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_description" class="col-md-4 col-form-label text-md-right"> Description: </label>
                            <div class="col-md-6 product_description">
                                <textarea name="product_description" id="product_description" cols="5" rows="5"></textarea>
                                <span class="invalid-feedback product_description" role="alert"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_price" class="col-md-4 col-form-label text-md-right"> Price: </label>
                            <div class="col-md-6">
                                <input class="gray form-control" required="required" type="text" id="product_price" name="product_price" value="" />
                                <span class="invalid-feedback product_price" role="alert"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_image" class="col-md-4 col-form-label text-md-right"> Image: </label>
                            <div class="col-md-6">
                                <input class="gray form-control" type="text" id="product_image" name="product_image" value="" />
                                <span class="invalid-feedback product_image" role="alert"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_category_id" class="col-md-4 col-form-label text-md-right"> Category: </label>
                            <select class="form-control col-md-6" id="product_category_id" name="product_category_id">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                            <span class="invalid-feedback product_category_id" role="alert"></span>
                        </div>
                    @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="add" type="submit" class="btn btn-primary">Add Product</button>
                    {{-- </form> --}}
                                {{-- <a class="btn btn-link"style="color: red" href="{{ url('/categories')}}">Back</a> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-md-4">
        <button id="new" name="new" type="button" class="btn btn-dark">Create new product</button>
    </div>
    <div class="form_control col-12 row">
        <form action="{{route('product.index')}}" method="GET">
            <label class="text-md-center" for="price_filter"> Price Filter </label>
            <select class="form-control" name="price_filter">
                @if ( $price_filter == 6 ) <option value="6" selected> All  </option>
                @else <option value="6"> All  </option>
                @endif
                @if ( $price_filter == 1 ) <option value="1" selected> 0 - 20 </option>
                @else <option value="1"> 0 - 20 </option>
                @endif
                @if ( $price_filter == 2 ) <option value="2" selected> 20 - 40 </option>
                @else <option value="2"> 20 - 40 </option>
                @endif
                @if ( $price_filter == 3 ) <option value="3" selected> 40 - 60</option>
                @else <option value="3"> 40 - 60 </option>
                @endif
                @if ( $price_filter == 4 ) <option value="4" selected> 60 - 80</option>
                @else <option value="4"> 60 - 80</option>
                @endif
                @if ( $price_filter == 5 ) <option value="5" selected> 80 - 100  </option>
                @else <option value="5"> 80 - 100  </option>
                @endif
            </select>
            <label class="text-md-right" for="category_sort"> Category </label>
            <select class="form-control" name="category_sort">
                <option value="all" @if ("all" == $category_sort) selected  @else @endif > All </option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if ($category->id == $category_sort) selected @endif >{{$category->title}}</option>
                @endforeach
            </select>
            <button type="submit" class="form-control col-md-4 btn btn-warning">Filter</button>
            <a class="btn btn-danger" href="{{ url('/products')}}">Clear Filter</a>
        </form>
        <form method="POST" action="{{route('product.pdf')}}">
            @csrf
            <input type="hidden" name="price_filter" value="{{$price_filterF}}">
            <input type="hidden" name="category_sort" value="{{$category_sortF}}">
            <button class="btn btn-warning" name="productPdf" type="submit">Download PDF</button>
        </form>

    </div>

    <a style="color:rgb(121, 95, 26);" href="{{ url('/products/create')}}">Create Product</a>
    <table class="table table-bordered table-hover gray" id="products">
        <thead class="thead-dark">
        <tr>
            <th> @sortablelink('id', 'ID') </th>
            <th> @sortablelink('title', 'Title') </th>
            <th> @sortablelink('excertpt', 'Excerpt')</th>
            <th> @sortablelink('description', 'Description') </th>
            <th> @sortablelink('price', 'Price') </th>
            <th> Image </th>
            <th> @sortablelink('category_id', 'Category') </th>
            <th> Shop </th>
            <th>Action</th>
        </tr>
        </thead>

        @foreach ($products as $product)
        <tr class="product">
            <td>{{ $product->id }}</td>
            <td><a class="intgray" href="{{route('product.show', [$product])}}">{{ $product->title }}</a></td>
            <td>{!! $product->excertpt !!}</td>
            <td>{!! $product->description !!}</td>
            <td> {{ $product->price }}</td>
            <td> <img height="200" weight="200" src= '{{ $product->image }}'> </td>
            <td>
                {{$product->productCategory->title}}
            </td>
            <td>
                {{$product->productCategory->categoryShop->title}}
            </td>
            <td>
                <a class="btn btn-dark intgray" href="{{route('product.edit', [$product]) }}">Edit</a>
                <form method="post" action="{{route('product.destroy', [$product]) }}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{-- {!! $products->appends(Request::except('page'))->render() !!} --}}
</div>


<script>

$(document).ready(function() {
        $("#new").on('click', function() {
            $(".productAdd").toggleClass("d-none");
        });

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
    }
});

    $("#add").click(function() {
        var product_title = $("#product_title").val();
        var product_excertpt = $("#product_excertpt").val();
        var product_description = $("#product_description").val();
        var product_price = $("#product_price").val();
        var product_image = $("#product_image").val();
        var product_category_id = $("#product_category_id").val();

        $.ajax({
            type: 'POST',
            url: '{{route("product.store")}}',
            data: {product_title: product_title, product_excertpt: product_excertpt, product_description: product_description, product_price: product_price, product_image: product_image, product_category_id: product_category_id },
            success: function(data) {
                if($.isEmptyObject(data.error)) {
                    $(".invalid-feedback").css('display','none');
                    $("#products").append("<tr class='product'><td>"+data.product_id+"</td><td>"+data.product_title+"</td><td>"+data.product_excertpt+"</td><td>"+data.product_description+"</td><td>"+data.product_price+"</td><td>"+data.product_image+"</td><td>"+data.product_category_id+"</td></tr>")
                    $(".productAdd").toggleClass("d-none");
                } else {
                    $(".invalid-feedback").css('display','none');
                    $.each(data.error, function(key, error){
                        var errorSpan= "." + key;
                        $(errorSpan).css('display', 'block');
                        $(errorSpan).html('');
                        $(errorSpan).append("<strong>"+error+"</strong>");
                    });
                }
                $("#products").append("<tr><td>"+data.product_id+"</td><td>"+data.product_title+"</td><td>"+data.product_excertpt+"</td><td>"+data.product_description+"</td><td>"+data.product_price+"</td><td>"+data.product_image+"</td><td>"+data.product_category_id+"</td></tr>")
                alert(data.message);
            }
        });
    });
        // console.log(product_title + " " + product_price + " " + product_description + " " + product_excertpt + " " + product_image);
});

</script>

<script>
    // $(document).ready(function() {
    //     $('.summernote').summernote();
    // });
</script>

@endsection
