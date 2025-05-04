@extends('layout.default')
@section('title','Login Page')
@section('content')
  <!-- Login 7 - Bootstrap Brain Component -->
<section class="bg-light p-3 p-md-4 p-xl-5">
    <div class="container">
      <div class="row justify-content-center">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
        @endif
        <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
          <div class="card border border-light-subtle rounded-4">
            <div class="card-body p-3 p-md-4 p-xl-5">
              <div class="row">
                <div class="col-12">
                  <div class="mb-5">
                    <h4 class="text-center">Registration Page</h4>
                  </div>
                </div>
              </div>
              <form action="{{route('register.post')}}" method="POST">
                @csrf
                <div class="row gy-3 overflow-hidden">
                    <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="fullname" id="fullname" placeholder="John Doe" >
                          <label for="text" class="form-label">Full Name</label>
                          @if($errors->has('fullname'))
                            <span class="text-danger">{{ $errors->first('fullname') }}</span>
                          @endif
                        </div>
                      </div>
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" >
                      <label for="email" class="form-label">Email</label>
                      @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" >
                      <label for="password" class="form-label">Password</label>
                      @if($errors->has('password'))
                      <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button class="btn bsb-btn-xl btn-primary" type="submit">Register now</button>
                    </div>
                  </div>
                </div>
              </form>
              <div class="row">
                <div class="col-12">
                  <hr class="mt-5 mb-4 border-secondary-subtle">
                  <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                    <a href="{{route('login')}}" class="link-secondary text-decoration-none">Login now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

