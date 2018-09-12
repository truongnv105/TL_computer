@extends ('layouts/admin_application')

@section ('head.title')
    | Categories list
@stop

@section ('body.resource')
    Categories
@stop

@section ('body.content')
    <table class="admin-categories">
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td> {{ $category->id }} </td>
                <td> {{ $category->name }} </td>
                <td><a href="{{ url('/admins/categories/' . $category->id . '/edit') }}"><i class="fa fa-edit"></i></a></td>
                <td><a href="{{ url('/admins/categories/' . $category->id) }}"><i class="fa fa-eye"></i></a></td>
                <td>
                    <i class="fa fa-trash category"></i>
                    <div class="hidden" style="display: none;">

                    {!! Form::open(array('url' => '/admins/categories/' . $category->id, 'method' => 'delete')) !!}
                        {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                    {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@stop

