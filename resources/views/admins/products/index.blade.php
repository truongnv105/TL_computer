@extends ('layouts/admin_application')

@section ('head.title')
    Products list
@stop

@section ('body.resource')
    Products
@stop

@section ('body.content')
    <table class="admin-table">
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Image</th>
            <th>Promotion</th>
            <th>Description</th>
            <th>Status</th>
        </tr>

        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><a href="{{ url('admins/products/' . $product->id) }}">{{ substr($product->name, 0, 15) }}</a></td>
                <td>{{ $product->category->value('name') }}</td>
                <td>{{ $product->price }}</td>
                <td><img src="{{ asset('storage/image/' . $product->image) }}" width="60" height="60"/></td>
                <td>{{ $product->promotion }}%</td>
                <td>{{ substr($product->description, 0, 50) }}</td>
                <td>{{ $product->status }}</td>
            </tr>
        @endforeach
    </table>
@stop
