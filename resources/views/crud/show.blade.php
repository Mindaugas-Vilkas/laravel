@extends('base')

@section('content')
    <h2>{{ $crud->id }}: {{ $crud->user }}</h2>
    <p>registered on : {{ $crud->created_at }}</p>
@stop