@extends ('layouts/admin_application')

@section ('head.title')
  {{ $product->name }}
@stop

@section ('body.resource')
    {{ $product->category->value('name') }} / {{ $product->name }}
@stop

@section ('body.content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <p><a href="{{ url('/admins/products/' . $product->id . '/edit') }}" class="btn btn-primary">Edit Product</a></p>
            <div class="row product product-feadture">
                <div class="col-md-3 product-feature__title">
                    Name
                </div>
                <div class="col-md-9 product-feature__title">
                    {{ $product->name }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 product-feature__title">
                    Category
                </div>
                <div class="col-md-9 product-feature__title">
                    {{ $product->category->value('name') }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 product-feature__title">
                    Price
                </div>
                <div class="col-md-9 product-feature__title">
                    {{ $product->price }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 product-feature__title">
                    Color
                </div>
                <div class="col-md-9 product-feature__title">
                    {{ $product->color }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 product-feature__title">
                    Item
                </div>
                <div class="col-md-9 product-feature__title">
                    {{ $product->item }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 product-feature__title">
                    <p>Image</p>
                </div>
                <div class="col-md-9 product-feature__title">
                    <img src="{{ asset('/storage/image/' . $product->image) }}" width="100" height="100">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 product-feature__title">
                    Description
                </div>
                <div class="col-md-9 product-feature__title">
                    {{ $product->description }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 product-feature__title">
                    Promotion
                </div>
                <div class="col-md-9 product-feature__title">
                    {{ $product->promotion }}%
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 product-feature__title">
                    Warranty
                </div>
                <div class="col-md-9 product-feature__title">
                    {{ $product->warranty }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 product-feature__title">
                    Condition
                </div>
                <div class="col-md-9 product-feature__title">
                    {{ $product->condition }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 product-feature__title">
                    Featured
                </div>
                <div class="col-md-9 product-feature__title">
                    {{ $product->featured }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 product-feature__title">
                    Status
                </div>
                <div class="col-md-9 product-feature__title">
                    {{ $product->status }}
                </div>
            </div>
        </div>
    </div>
@stop
