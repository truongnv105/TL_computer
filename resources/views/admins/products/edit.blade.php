@extends ('layouts/admin_application')

@section ('head.title')
   | Edit - {{ $data['product']->name }}
@stop

@section ('body.resource')
    {{ $data['product']->category->value('name') }} / {{ $data['product']->name }}
@stop

@section ('body.content')
    {!! Form::model($data['product'], array('url' => '/admins/products/' . $data['product']->id,
        'method' => 'put', 'files' => 'true')) !!}

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="form-group alert alert-danger">
                <ul>
                    <li>{{ $error }}</li>
                </ul>
            </div>
        @endforeach
    @endif

    <div class="form-group">
        {!! Form::select('category_id', $data['categories'], array('class' => 'form-control',
            $data['product']->category_id)) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Product\' name:', array('class' => 'control-label')) !!}
        {!! Form::text('name', $data['product']->name, array('class' => 'form-control', 'required', 'placeholder' => 'Press product\'s name...')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('slug', 'Product\'s slug:', array('class' => 'control-label')) !!}
        {!! Form::text('slug', $data['product']->slug, array('class' => 'form-control', 'required', 'placeholder' => 'Press product\'s slug...')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('price', 'Product\'s price:', array('class' => 'control-label')) !!}
        {!! Form::number('price', $data['product']->price, array('class' => 'form-control', 'required', 'step' => '10000', 'placeholder' => '1000...')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('image', 'Product\' image:', array('class' => 'control-label')) !!}
        <img src="{{ asset('/storage/image/' . $data['product']->image) }}" width="100" height="100">
        <input name="image" type="file" value="{{ $data['product']->image }}">
    </div>

    <div class="form-group">
        {!! Form::label('color', 'Product\'s color:', array('class' => 'control-label')) !!}
        {!! Form::text('color', $data['product']->color, array('class' => 'form-control', 'required', 'placeholder' => 'green')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('promotion', 'Product\'s promotion:', array('class' => 'control-label')) !!}
        {!! Form::number('promotion', $data['product']->promotion, array('class' => 'form-control', 'required', 'placeholder' => 'Press promotion...')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Product\'s description:', array('class' => 'control=label')) !!}
        {!! Form::textarea('description', $data['product']->description, array('class' => 'form-control', 'required', 'rows'=>'5', 'placeholder' => 'Press description...')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('item', 'Product\'s item:', array('class' => 'control-label')) !!}
        {!! Form::text('item', $data['product']->item, array('class' => 'form-control', 'required', 'placeholder' => 'Press product\'s item...')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('warranty', 'Product\'s warranty:', array('class' => 'control-label')) !!}
        {!! Form::text('warranty', $data['product']->warranty, array('class' => 'form-control', 'required', 'placeholder' => 'Press warranty...')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('featured', 'Product\' featured:', array('class' => 'control-label')) !!}
        {!! Form::number('featured', $data['product']->featured, array('class' => 'form-control', 'required',
            'placeholder' => '0')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('condition', 'Product\'s condition:', array('class' => 'label-control')) !!}
        {!! Form::text('condition', $data['product']->condition, array('class' => 'form-control', 'placeholder' => '99%')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Product\'s status:', array('class' => 'control-label')) !!}
        {!! Form::radio('status', 1, true) !!} Alive
        {!! Form::radio('status', 0) !!} Dead
    </div>

    <div class="form-group">
        {!! Form::submit('Update', array('class' => 'btn btn-primary form-control')) !!}
    </div>
@stop
