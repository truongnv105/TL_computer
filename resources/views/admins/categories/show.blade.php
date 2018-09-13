@extends ('layouts/admin_application')

@section ('head.title')
    | {{ $data['category']->name }}
@stop

@section ('body.resource')
    {{ $data['category']->name }}
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
            <th>Warranty</th>
            <th>Status</th>
        </tr>

        @foreach ($data['products'] as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><a href="{{ url('admins/products/' . $product->id) }}">{{ $product->name }}</a></td>
                <td>{{ $product->category->value('name') }}</td>
                <td>{{ money_format('%.2n', $product->price) }}</td>
                <td><img src="{{ asset('storage/image/' . $product->image) }}" width="60" height="60"/></td>
                <td>{{ $product->promotion }}%</td>
                <td>{{ substr($product->description, 0, 65) }}</td>
                <td>{{ $product->warranty }}</td>
                <td>
                    @if($product->status == 1)
                        Stocking
                    @else
                        Out of stock
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@stop
