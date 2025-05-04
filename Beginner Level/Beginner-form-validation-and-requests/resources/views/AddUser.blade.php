<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <h2>Add User</h2>
        {{-- @if ($errors->any())
         <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
         </ul>

        @endif --}}
        <form action="{{ route('add-user')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Name</label>
              <input type="text" class="form-control  @error('username') is-invalid  @enderror" id="exampleInputName" name="username" value="{{ old('username')}}">
              @error('username')
                    <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email Address</label>
              <input type="email" class="form-control
                                        @error('useremail')
                                          is-invalid
                                        @enderror"
                id="exampleInputEmail1" name="useremail" value="{{ old('useremail')}}">
              @error('useremail')
                    <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword" class="form-label">Password</label>
                <input type="password" class="form-control
                                        @error('userpass')
                                          is-invalid
                                        @enderror"
                id="exampleInputPassword" name="userpass" value="{{ old('userpass')}}">
                @error('userpass')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputAge" class="form-label">Age</label>
                <input type="number" class="form-control   @error('userage') is-invalid  @enderror " name="userage" id="exampleInputAge" value="{{ old('userage')}}">
                @error('userage')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputCity" class="form-label">City</label>
                <select name="usercity" id="exampleInputCity"  class="form-control">
                    <option value="kolkata">Kolkata</option>
                    <option value="delhi">Delhi</option>
                    <option value="mumbai">Mumbai</option>
                    <option value="chennai">Chennai</option>
                    <option value="banglore">Banglore</option>
                </select>
                @error('usercity')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
