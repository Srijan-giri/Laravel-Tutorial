@extends('layout.view')
@section('title', 'File Upload')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center fw-bold">File Upload</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('file.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" id="file" accept=".jpg,.jpeg,.png,.pdf" class="form-control">
                    @error('file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br />
                    <button class="btn btn-primary my-2">Upload</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if (Session::has('success'))
                    <div class="alert alert-success " role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <h3>All Images</h3>
            @foreach ($files as $file)
                <div class="col-3">
                    <img src="{{ asset('/storage/' . $file['name']) }}" alt="image" class="img-fluid img-thumbnail"
                        style="width:300px;height:300px;border:1px solid rgb(168, 168, 168)" />
                    <div class="d-flex my-2">
                        <form action="{{ route('file.destroy', $file['id']) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm ">Delete</button>
                        </form>
                        <a href="{{ route('file.edit', $file['id']) }}" class="btn btn-warning btn-sm mx-1"
                            target="_blank">Update</a>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
    </div>
@endsection
@push('scripts')
    <script>
        setTimeout(() => {
            $('.alert').remove();
        }, 2000);

        
    </script>
@endpush
