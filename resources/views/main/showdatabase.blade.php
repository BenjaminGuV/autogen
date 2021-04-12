@extends('layout.tauto')

@section('title', 'Page Title')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <p>List all database.</p>
        </div>
    </div>

    <div class="row">
        @foreach( $databases as $database )
            <div class="col-md-4">
                <a href="{{ url('/database') }}/{{ $database->Database }}">{{ $database->Database }}</a>
            </div>
        @endforeach
    </div>

@endsection