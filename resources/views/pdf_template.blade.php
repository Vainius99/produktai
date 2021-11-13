<table>
    {{-- <thead> --}}
        <tr>
            <th> ID </th>
            <th> Title </th>
            <th> Exerptp</th>
            <th> Description </th>
            <th> Price </th>
            <th> Category </th>
        </tr>
    {{-- </thead> --}}

    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->title }}</td>
        <td>{!! $product->excertpt !!}</td>
        <td>{!! $product->description !!}</td>
        <td> {{ $product->price }}</td>
        <td>
            {{$product->productCategory->title}}
        </td>
    </tr>
    @endforeach
</table>
