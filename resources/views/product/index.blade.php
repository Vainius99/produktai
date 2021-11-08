@extends('layouts.app')

@section('content')

<div class="container">
    <a style="color:rgb(121, 95, 26);" href="{{ url('/products/create')}}">Create Product</a>
    <table class="table table-bordered table-hover gray">
        <thead class="thead-dark">
        <tr>
            <th> ID </th>
            <th> Title </th>
            <th> Excertpt</th>
            <th> Description </th>
            <th> Price </th>
            <th> Image </th>
            <th> Category </th>
            <th>Action</th>
        </tr>
        </thead>

        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td><a class="intgray" href="{{route('product.show', [$product])}}">{{ $product->title }}</a></td>
            <td>{!! $product->excertpt !!}</td>
            <td>{!! $product->description !!}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->image }}</td>
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
