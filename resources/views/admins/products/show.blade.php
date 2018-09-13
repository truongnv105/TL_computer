@extends ('layouts/admin_application')

@section ('head.title')
  {{ $product->name }}
@stop

@section ('body.resource')
    {{ $product->category()->value('name') }} / {{ $product->name }}
@stop

@section ('body.content')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
    @endif

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <p><a href="{{ url('/admins/products/' . $product->id . '/edit') }}" class="btn btn-primary">Edit Product</a></p>
            <table class="table">
                <tr>
                    <th colspan="2" class="table--center">Information's Product</th>
                </tr>
                <tr>
                    <th>STT</th>
                    <td>{{ $product->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{ $product->category()->value('name') }}</td>
                </tr>
                <tr>
                    <th>Slug</th>
                    <td>{{ $product->slug }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $product->price }}</td>
                </tr>
                <tr>
                    <th>Item</th>
                    <td>{{ $product->item }}</td>
                </tr>
                <tr>
                    <th>Promotion</th>
                    <td>{{ $product->promotion }}%</td>
                </tr>
                <tr>
                    <th>Feature</th>
                    <td>{{ $product->featured }}</td>
                </tr>
                <tr>
                    <th>Warranty</th>
                    <td>{{ $product->warranty }}</td>
                </tr>
                <tr>
                    <th>Condition</th>
                    <td>{{ $product->condition }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $product->description }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if($product->status == 1)
                            Stocking
                        @else
                            Out of stock
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
@stop
