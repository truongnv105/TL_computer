@extends ('layouts/admin_application')

@section ('body.content')
  @if (Auth::check())
    {{ Auth::user()->name }}
  @else
    <p>You are guest</p>
  @endif
@stop
