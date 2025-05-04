

@extends('layout.default')
@section('title','Welcome Page')
@section('content')
    {{-- <h1>Hello {{$user->name}}</h1> --}}
    {{-- @auth --}}

    {{-- @endauth --}}

    {{-- @guest
        <h1>Hi Everyone please login</h1>
    @endguest --}}

    @if(Auth::check() && isset($user) && is_object($user))
        <h3 class="d-flex justify-content-center align-items-center">Welcome {{$user->name}}</h3>
        @php
            $user = Auth::user();
            $firstname = explode(' ', $user->name)[0];
        @endphp
        @section('username',"Hi $firstname")
    @endif
@endsection

