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
            <button class="btn btn-primary creat-product" data-target="#modal-product-new" data-toggle="modal">
                Create new product</button>
        </div>
    </div>

    <table class="table">
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
                        {!! Form::open(array('url' => '/admins/products', 'method' => 'post', 'files' => 'true')) !!}

                            @if ($errors->any())
                                <div class="form-group alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <ul>
                                            <li> {{ $error }} </li>
                                        </ul>
                                    @endforeach
                                </div>
                            @endif

                            <div class="form-group">
                                {!! Form::label('category_id', "Select category for product:") !!}
                                {!! Form::select('category_id', $categories, array('class' => 'select')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('name', 'Product\' name:', array('class' => 'control-label')) !!}
                                {!! Form::text('name', '', array('class' => 'form-control', 'required', 'placeholder' => 'Press product\'s name...')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('price', 'Product\'s price:', array('class' => 'control-label')) !!}
                                {!! Form::number('price', '', array('class' => 'form-control', 'required', 'step' => '10000', 'placeholder' => '1000...')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('image', 'Product\' image:', array('class' => 'control-label')) !!}
                                {!! Form::file('image', array('required')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('color', 'Product\'s color:', array('class' => 'control-label')) !!}
                                {!! Form::text('color', '', array('class' => 'form-control', 'required', 'placeholder' => 'green')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('promotion', 'Product\'s promotion:', array('class' => 'control-label')) !!}
                                {!! Form::text('promotion', '', array('class' => 'form-control', 'required', 'placeholder' => 'Press promotion...')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('description', 'Product\'s description:', array('class' => 'control=label')) !!}
                                {!! Form::textarea('description', '', array('class' => 'form-control', 'required', 'rows'=>'5', 'placeholder' => 'Press description...')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('item', 'Product\'s item:', array('class' => 'control-label')) !!}
                                {!! Form::text('item', '', array('class' => 'form-control', 'required', 'placeholder' => 'Press product\'s item...')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('warranty', 'Product\'s warranty:', array('class' => 'control-label')) !!}
                                {!! Form::text('warranty', '', array('class' => 'form-control', 'required', 'placeholder' => 'Press warranty...')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('featured', 'Product\' featured:', array('class' => 'control-label')) !!}
                                {!! Form::number('featured', '', array('class' => 'form-control', 'required',
                                    'placeholder' => '0')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('condition', 'Product\'s condition:', array('class' => 'label-control')) !!}
                                {!! Form::text('condition', '', array('class' => 'form-control', 'placeholder' => '99%')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('status', 'Product\'s status:', array('class' => 'control-label')) !!}
                                {!! Form::radio('status', 1, true) !!} Alive
                                {!! Form::radio('status', 0) !!} Dead
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Create', array('class' => 'btn btn-primary form-control')) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@stop
