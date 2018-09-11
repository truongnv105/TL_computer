@extends ('layouts/admin_application')

@section ('head.title')
  | New - Category
@stop

@section ('body.content')

    {!! Form::open(array(
        'url' => '/admins/categories',
        'method' => "post"
    )) !!}

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
            {!! Form::label('name', 'Category\'s name:', array('class' => 'control-label')) !!}
            {!! Form::text('name', '', array('class' => 'form-control', 'required',
                'placeholder' => "Press category name ..."))!!}
        </div>

        <div class="form-group">
            {!! Form::label('slug', 'Category\'s slug name:', array('class' => 'control-label')) !!}
            {!! Form::text('slug', '', array('class' => 'form-control', 'required',
                'placeholder' => 'Press category slug name...')) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create', array('class' => 'btn btn-primary form-control')) !!}
        </div>

    {!! Form::close() !!}
@stop
