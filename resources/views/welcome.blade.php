@extends('layout')

@section('title')
    home page
@endsection

@section('content')
    <h1>Welcome!</h1>
    @if($user)
        <h2 style="color: black">Login: {{$user['login']}}</h2>
        <h2 style="color: black">Password: {{$user['password']}}</h2>
    @endif
@endsection
