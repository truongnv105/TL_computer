{!! Form::open(array('url' => '/admins/products', 'method' => 'put', 'files' => 'true', 'id' => "product-form")) !!}

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
