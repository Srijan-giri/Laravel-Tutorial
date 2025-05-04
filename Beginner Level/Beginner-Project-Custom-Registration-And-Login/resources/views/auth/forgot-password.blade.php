@extends('layout.default')
@section('title','Forgot Password Page')

@section('content')

<div class="d-flex justify-content-center align-items-center my-5">
    <div class="card text-center" style="width: 500px;">
        <div class="card-header h5 text-white bg-primary">Password Reset</div>
        <div class="card-body px-5">
            <p class="card-text py-2">
                Enter your email address and we'll send you an email with instructions to reset your password.
            </p>
            <div data-mdb-input-init class="form-outline">
                <input type="email" id="typeEmail" class="form-control my-3" />
                <label class="form-label" for="typeEmail">Email input</label>
            </div>
            <a href="#" data-mdb-ripple-init class="btn btn-primary w-100">Reset password</a>
            <div class="d-flex justify-content-between mt-4">
                <a class="{{route('login')}}" href="#">Login</a>
                <a class="{{route('register.get')}}" href="#">Register</a>
            </div>
        </div>
    </div>
</div>
@endsection
