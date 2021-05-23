@extends('user::layouts.auth')
@section('content')
        <form method="POST" action="{{ route('login') }}">
            @csrf

        </form>
@endsection
