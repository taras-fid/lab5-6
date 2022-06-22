<?php
    $login = $_COOKIE['login'] ?? null;
?>

@extends('layout')

@section('title')
    about page
@endsection

@section('content')
    <h1>{{ $login }}, you have acess to </h1>
    @if($role === 3)
        <button type="button" class="btn btn-warning" style="position:relative; top: 10px;"><a href="/about/3">get all workers</a></button>
    @endif
    @if($role > 2)
    <br><button type="button" class="btn btn-warning" style="position:relative; top: 20px;"><a href="/about/2">get all admins</a></button>
    @endif
    @if($role > 1)
    <br><button type="button" class="btn btn-warning" style="position:relative; top: 30px;"><a href="/about/1">get all basics</a></button>
    @endif
    @if($role >= 1 || $role === null)
    <br><button type="button" class="btn btn-outline-dark me-2" style="position:relative; top: 40px;"><a href="/about/0">go out</a></button>
    @endif
@endsection
