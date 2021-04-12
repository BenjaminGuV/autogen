@extends('layout.tauto')

@section('title', 'Page Title')



@section('content')
    <div class="row">
        <div class="col-md-12">
            <p>List all tables.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3 mt-3">
            <a href="{{ url('/database') }}" class="btn btn-primary"><- Volver</a>
        </div>
    </div>

    @foreach( $tables as $table )
        <div class="row mb-2 mt-2">
            <div class="col-md-12">
                <a href="{{ url('/database/' . $database . '/table/' . $table ) }}" class="btn btn-primary">{{ $table }}</a>
                <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapse-{{ $table }}" aria-expanded="false" aria-controls="collapse-{{ $table }}">
                    SHOW
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="collapse" id="collapse-{{ $table }}">
                    <div class="card card-body">
                        <ul>
                            <li><span id="clip-{{ $table }}-select">SELECT * FROM {{ $table }};</span> <button data-clipboard-target="#clip-{{ $table }}-select" class="btn btn-info btn-sm copy-letter-button" data-clipboard-action="copy" data-clipboard-text="SELECT * FROM {{ $table }};" ><i class="fas fa-copy"></i></button></li>
                            <li><span id="clip-{{ $table }}-update">UPDATE {{ $table }} SET columna='secundaria' WHERE id = 1;</span> <button data-clipboard-target="#clip-{{ $table }}-update" class="btn btn-info btn-sm copy-letter-button" data-clipboard-action="copy" data-clipboard-text="UPDATE {{ $table }} SET columna='secundaria' WHERE id = 1;" ><i class="fas fa-copy"></i></button></li>
                            <li><span id="clip-{{ $table }}-delete">DELETE FROM {{ $table }} WHERE id = 1;</span> <button data-clipboard-target="#clip-{{ $table }}-delete" class="btn btn-info btn-sm copy-letter-button" data-clipboard-action="copy" data-clipboard-text="DELETE FROM {{ $table }} WHERE id = 1;" ><i class="fas fa-copy"></i></button></li>
                            <li><span id="clip-{{ $table }}-truncate">TRUNCATE {{ $table }};</span> <button data-clipboard-target="#clip-{{ $table }}-truncate" class="btn btn-info btn-sm copy-letter-button" data-clipboard-action="copy" data-clipboard-text="TRUNCATE {{ $table }};" ><i class="fas fa-copy"></i></button></li>
                            <li><span id="clip-{{ $table }}-drop">DROP TABLE {{ $table }};</span> <button data-clipboard-target="#clip-{{ $table }}-drop" class="btn btn-info btn-sm copy-letter-button" data-clipboard-action="copy" data-clipboard-text="DROP TABLE {{ $table }};" ><i class="fas fa-copy"></i></button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection


@section('js')
    <script>
        var clipboard = new Clipboard('.copy-letter-button');

        clipboard.on('success', function(e) {
        console.log(e);
        });

        clipboard.on('error', function(e) {
        console.log(e);
        });
    </script>
@endsection