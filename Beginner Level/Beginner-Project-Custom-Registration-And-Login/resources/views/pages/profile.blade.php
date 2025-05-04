

@extends('layout.default')
@section('title','Profile Page')
@section('content')
    {{-- <h1>Hello {{$user->name}}</h1> --}}
    {{-- @auth --}}

    {{-- @endauth --}}

    {{-- @guest
        <h1>Hi Everyone please login</h1>
    @endguest --}}

    @if(Auth::check() && isset($user) && is_object($user))
        @php
            $user = Auth::user();
            $firstname = explode(' ', $user->name)[0];
        @endphp
        @section('username',"Hi $firstname")


        <h4>Name :  {{$user->name}}</h4>
        <h4>Email :  {{$user->email}}</h4>
        <h4>Created At :  {{$user->created_at}}</h4>
        <h4>Updated At :  {{$user->updated_at}}</h4>
    @endif
@endsection

