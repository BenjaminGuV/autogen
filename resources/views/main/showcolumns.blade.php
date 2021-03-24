@extends('layout.tauto')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>

    <p><a href="{{ url('/database/' . $database ) }}"> <- Volver</a></p>

    <p>{{ $attr_txt_select }}</p>
    <p>{{ $attr_txt_insert }}</p>
    <p>{{ $attr_txt_update }}</p>
    <p>{{ $attr_txt_delete }}</p>
    <p>{{ $id_key_txt }}</p>

    @foreach( $code_inputs as $code_input )
        <p>{{ $code_input }}</p>
    @endforeach


@endsection