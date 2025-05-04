@extends('layout.view')
@section('title', 'Student List')
@section('content')
    <div class="container">
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Name</th>
                        <th>Phoen No</th>
                        <th>Age</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->phone_no }}</td>
                            <td>{{ $student->age }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $students->links() }}

        </div>

    </div>
@endsection
