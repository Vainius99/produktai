@extends('layouts.app')

@section('content')

<div class="container">
    <a style="color:rgb(121, 95, 26);" href="{{ url('/shops/create')}}">Create Shop</a>
    <table class="table table-bordered table-hover gray">
        <thead class="thead-dark">
        <tr>
            <th> @sortablelink('id', 'ID') </th>
            <th> @sortablelink('title', 'Title') </th>
            <th> @sortablelink('description', 'Description')</th>
            <th> @sortablelink('email', 'Email') </th>
            <th> @sortablelink('phone', 'Phone')</th>
            <th> @sortablelink('country', 'Country') </th>
            <th>Action</th>
        </tr>
        </thead>

        @foreach ($shops as $shop)
        <tr>
            <td>{{ $shop->id }}</td>
            <td><a class="intgray" href="{{route('shop.show', [$shop])}}">{{ $shop->title }}</a></td>
            <td>{!! $shop->description !!}</td>
            <td>{{ $shop->email }}</td>
            <td>{{ $shop->phone }}</td>
            <td>{{$shop->country}}</td>
            <td>
                <a class="btn btn-dark intgray" href="{{route('shop.edit', [$shop]) }}">Edit</a>
                <form method="post" action="{{route('shop.destroy', [$shop]) }}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</div>
@endsection
