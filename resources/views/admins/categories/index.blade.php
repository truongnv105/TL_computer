@extends ('layouts/admin_application')

@section ('head.title')
    | Categories list
@stop

@section ('body.resource')
    Categories
@stop

@section ('body.content')
    <div class="row">
        <div class="col-md-9">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
            @endif
        </div>
        <div class="col-md-3 form-group">
            <button class="btn btn-primary creat-category" data-target="#modal-category-new" data-toggle="modal">Create new category</button>
        </div>
    </div>


    <table class="table">
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Slug</th>
            <th colspan="3">Action</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td> {{ $category->id }} </td>
                <td><a href="{{ url('/admins/categories/' . $category->id) }}">{{ $category->name }}</a></td>
                <td>{{ $category->slug }}</td>
                <td>
                    <i class="fa fa-edit"></i>
                    <input type="hidden" id="category_id" value="{{ $category->id }}">
                    <input type="hidden" id="category_name" value="{{ $category->name }}">
                </td>
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
    <button class="btn btn-defautl btn--hidden" id="edit-category" data-toggle="modal" data-target="#modal-category">Edit</button>

    <div class="modal fade" id="modal-category" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Edit</h2>
                </div>
                <form id="form-edit" action="#" method="put">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Category Name:</label>
                            <input type="text" name="name" id="name" class="form-control" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="PUT">
                        </div>
                        <div class="form-group">
                            <button type="submit" id="button-update-category" class="btn btn-primary form-control">Update</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-category-new" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">New category</h2>
                </div>
                <form id="form-edit" action="#" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Category Name:</label>
                            <input type="text" name="name" id="name" class="form-control" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        </div>
                        <div class="form-group">
                            <button type="submit" id="button-update-category" class="btn btn-primary form-control">Create</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

