@extends('layout.tauto')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>

    <p><a href="{{ url('/database') }}"> <- Volver</a></p>

    <ul>
        @foreach( $tables as $table )
            <li>
                <a href="{{ url('/database/' . $database . '/table/' . $table ) }}">{{ $table }}</a>
                <ul>
                    <li>SELECT * FROM {{ $table }};</li>
                    <li>UPDATE {{ $table }} SET columna='secundaria' WHERE id = 1;</li>
                    <li>DELETE FROM {{ $table }} WHERE id = 1;</li>
                    <li>TRUNCATE {{ $table }};</li>
                    <li>DROP TABLE {{ $table }};</li>
                </ul>
            </li>
        @endforeach
    </ul>

@endsection