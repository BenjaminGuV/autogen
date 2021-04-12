@extends('layout.tauto')

@section('title', 'Page Title')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <p>Details.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3 mt-3">
            <a href="{{ url('/database/' . $database ) }}" class="btn btn-primary"><- Volver</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p>{{ $attr_txt_select }}</p>
            <p>{{ $attr_txt_insert }}</p>
            <p>{{ $attr_txt_update }}</p>
            <p>{{ $attr_txt_delete }}</p>
            <p>Llave principal: {{ $id_key_txt }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3 mt-3">
            <h4>Insert Laravel</h4>
        </div>
    </div>
    
    @foreach( $code_insert_laravel as $code )
        <p>{{ $code }}</p>
    @endforeach

    <div class="row">
        <div class="col-md-12 mb-3 mt-3">
            <h4>HTML FORM</h4>
        </div>
    </div>

    @foreach( $code_inputs as $code_input )
        <p>{{ $code_input }}</p>
    @endforeach


    <div class="row">
        <div class="col-md-12 mb-3 mt-3">
            <h4>MODEL LARAVEL</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3 mt-3">
            <p>{{ $html_create_model }}</p>
        </div>
    </div>


@endsection