@extends('layout.view')
@section('title', 'File Updated')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 my-2">
                <h1 class="text-center fw-bold">File Updated</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <img src="{{ asset('storage/' . $file->name) }}" alt="image" id="image" class="img-fluid img-thumbnail"
                    style="width:300px;height:300px;border:1px solid rgb(168, 168, 168)">
            </div>
            <div class="col-lg-9">
                <form action="{{ route('file.update', $file->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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

    </div>
    </div>
@endsection
@push('scripts')
    <script>
        setTimeout(() => {
            $('.alert').remove();
        }, 2000);

        $('#file').on('change', function() {
            $('#image').attr('src', window.URL.createObjectURL(this.files[0]));
        });
    </script>
@endpush
