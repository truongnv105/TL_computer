@extends ('layouts/admin_application')

@section ('head.title')
    Edit {{ $category->name }}
@stop


@section ('body.content')

    {!! Form::model($category, array(
        'url' => 'admins/categories/' . $category->id,
        'method' => 'put'
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
        {!! Form::text('name', $category->name, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update', array('class' => 'btn btn-primary form-control')) !!}
    </div>

@stop
