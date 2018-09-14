@extends ('layouts/admin_application')

@section ('head.title')
  | Comments list
@stop

@section ('body.resource')
  Comments
@stop

@section ('body.content')
    <table class="table">
        <tr>
            <th>STT</th>
            <th>Product</th>
            <th>Content</th>
            <th>Email</th>
            <th>Name</th>
            <th>Action</th>
        </tr>

        @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->com_id }}</td>
                <td>
                    @foreach ($products as $key => $product)
                       @if ($comment->com_product == $key)
                            <a href='{{ url("/details/" . $key . "/" . str_slug($product)) . ".html" }}'>{{ $product }}</a>
                       @endif
                    @endforeach
                </td>
                <td>{{ $comment->com_content }}</td>
                <td>{{ $comment->com_email }}</td>
                <td>{{ $comment->com_name }}</td>
                <td>
                    {!! Form::model($comment, array('url' => 'admins/comments/' . $comment->com_id,
                        'method' => 'delete')) !!}
                    {!! Form::submit('Destroy', array('class' => 'btn btn-danger')) !!}
                </td>
            </tr>
        @endforeach
    </table>
@stop
