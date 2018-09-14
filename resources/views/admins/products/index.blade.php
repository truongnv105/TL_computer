@extends ('layouts/admin_application')

@section ('head.title')
    Products list
@stop

@section ('body.resource')
    Products
@stop

@section ('body.content')
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
    @endif
    <div class="row filter">
        <div class="form-group col-md-2">
            <strong>Fillter products:</strong>
        </div>
        <div class="col-md-7 form-group">
            <select name="filter-products" id="filter-products" class="form-control">
                <option value="2" selected>All</option>
                <option value="0">Out of stock</option>
                <option value="1">Stocking</option>
            </select>
        </div>
        <div class="col-md-3 form-group">
            <button class="btn btn-primary form-control creat-product" data-target="#modal-product-new" data-toggle="modal">
                Create new product</button>
        </div>
    </div>

    <table class="table table-condensed">
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
                <td><a href="{{ url('admins/products/' . $product->id) }}">{{ $product->name }}</a></td>
                <td>{{ $product->category()->value('name') }}</td>
                <td>{{ $product->price }}</td>
                <td><img src="{{ asset('storage/image/' . $product->image) }}" width="60" height="60"/></td>
                <td>{{ $product->promotion }}%</td>
                <td>{{ substr($product->description, 0, 35) }}</td>
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

    <div class="modal fade" id="modal-product-new" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">New Product</h2>
                </div>
                    <div class="modal-body">
                        @include ('partials/product_form')
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@stop
