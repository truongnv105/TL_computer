@extends ('layouts/admin_application')

@section ('head.title')
  {{ $product->name }}
@stop

@section ('body.resource')
    <a href="{{ route('admin.categories') }}">{{ $product->category()->value('name') }}</a> / {{ $product->name }}
@stop

@section ('body.content')
    <div class="row">
        <div class="col-md-8">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
            @endif
        </div>
        <div class="form-group col-md-3">
            <p><a href="" class="form-control btn btn-primary edit-product" data-toggle="modal" data-target="#edit-product">Edit Product</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table products">
                <tr>
                    <th colspan="2" class="table--center">Information's Product</th>
                </tr>
                <tr>
                    <th>STT</th>
                    <td>
                        {{ $product->id }}
                        <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                    </td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>
                        {{ $product->name }}
                        <input type="hidden" id="product_name" name="product_name" value="{{ $product->name }}">
                    </td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>
                        {{ $product->category()->value('name') }}
                        <input type="hidden" id="category_id" name="category_name" value="{{ $product->category_id }}">
                    </td>
                </tr>
                <tr>
                    <th>Slug</th>
                    <td>
                        {{ $product->slug }}
                        <input type="hidden" name="slug" value="{{ $product->slug }}">
                    </td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        <img src="{{ asset('storage/image/' . $product->image) }}" width="60" height="60"/>
                    </td>
                </tr>
                <tr>
                <tr>
                    <th>Price</th>
                    <td>
                        {{ $product->price }}
                        <input type="hidden" id="product_price" name="price" value="{{ $product->price }}">
                    </td>
                </tr>
                <tr>
                    <th>Item</th>
                    <td>
                        {{ $product->item }}
                        <input type="hidden" id="product_item" name="item" value="{{ $product->item }}">
                    </td>
                </tr>
                <tr>
                    <th>Promotion</th>
                    <td>
                        {{ $product->promotion }}%
                        <input type="hidden" id="product_promotion" name="promotion" value="{{ $product->promotion }}">
                    </td>
                </tr>
                <tr>
                    <th>Feature</th>
                    <td>
                        {{ $product->featured }}
                        <input type="hidden" id="product_featured" name="featured" value="{{ $product->featured }}">
                    </td>
                </tr>
                <tr>
                    <th>Color</th>
                    <td>
                        {{ $product->color }}
                        <input type="hidden" id="product_color" name="color" value="{{ $product->color }}">
                    </td>
                </tr>
                <tr>
                    <th>Warranty</th>
                    <td>
                        {{ $product->warranty }}
                        <input type="hidden" id="product_warranty" name="warranty" value="{{ $product->warranty }}">
                    </td>
                </tr>
                <tr>
                    <th>Condition</th>
                    <td>
                        {{ $product->condition }}
                        <input type="hidden" id="product_condition" name="condition" value="{{ $product->condition }}">
                    </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>
                        {{ $product->description }}
                        <input type="hidden" id="product_description" name="description" value="{{ $product->description }}">
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if($product->status == 1)
                            Stocking
                        @else
                            Out of stock
                        @endif
                        <input type="hidden" id="product_status" name="status" value="{{ $product->status }}">
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="modal fade" id="edit-product" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit product</h4>
                </div>
                <div class="modal-body">
                   {!! Form::open(array('url' => 'admins/products', 'method' => 'put', 'files' => 'true', 'id' => "product-form")) !!}

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
                        <img src="{{ asset('storage/image/' . $product->image) }}" width="60" height="60"/>
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
                        {!! Form::submit('Update', array('class' => 'btn btn-primary form-control')) !!}
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
