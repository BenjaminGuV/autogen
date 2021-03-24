@extends('layout.tauto')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>

    <ul>
        @foreach( $databases as $database )
            <li>
                <a href="{{ url('/database') }}/{{ $database->Database }}">{{ $database->Database }}</a>
            </li>
        @endforeach
    </ul>

@endsection