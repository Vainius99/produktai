@extends('layouts.app')

@section('content')

<div class="container">

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
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if ($category->id == $category_sort) selected @endif >{{$category->title}}</option>
                @endforeach
            </select>
            <button type="submit" class="form-control col-md-4 btn btn-warning">Filter</button>
            <a class="btn btn-danger" href="{{ url('/products')}}">Clear Filter</a>
        </form>
        <form method="POST" action="{{route('product.pdf')}}">
            @csrf
            {{-- <input type="hidden" name="price_filter" value="{{$price_filterF}}"> --}}
            <input type="hidden" name="category_sort" value="{{$category_sortF}}">
            <button class="btn btn-warning" name="productPdf" type="submit">Download PDF</button>
        </form>

    </div>

    <a style="color:rgb(121, 95, 26);" href="{{ url('/products/create')}}">Create Product</a>
    <table class="table table-bordered table-hover gray">
        <thead class="thead-dark">
        <tr>
            <th> @sortablelink('id', 'ID') </th>
            <th> @sortablelink('title', 'Title') </th>
            <th> @sortablelink('excertpt', 'Excertpt')</th>
            <th> @sortablelink('description', 'Description') </th>
            <th> @sortablelink('price', 'Price') </th>
            <th> Image </th>
            <th> @sortablelink('category_id', 'Category') </th>
            <th> Shop </th>
            <th>Action</th>
        </tr>
        </thead>

        @foreach ($products as $product)
        <tr>
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
@endsection
