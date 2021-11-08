@extends('layouts.app')

@section('content')

<div class="container">

    <div class="form_control col-12 row">
        <form action="{{route('product.index')}}" method="GET">
            <label class="text-md-center" for="price_filter"> Price Filter </label>
            <select class="form-control" name="price_filter">
                <option value="1"> 0 - 20 </option>
                <option value="2"> 20 - 40 </option>
                <option value="3"> 40 - 60 </option>
                <option value="4"> 60 - 80 </option>
                <option value="5"> 80 - 100 </option>
            </select>
            <label class="text-md-right" for="category_sort"> Category </label>
            <select class="form-control" name="category_sort">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            <button type="submit" class="form-control col-md-4 btn btn-warning">Filter</button>
            <a class="btn btn-danger" href="{{ url('/products')}}">Clear Filter</a>
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
                <a class="btn btn-dark intgray" href="{{route('product.edit', [$product]) }}">Edit</a>
                <form method="post" action="{{route('product.destroy', [$product]) }}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</div>
@endsection
