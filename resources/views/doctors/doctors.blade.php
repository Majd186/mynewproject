
@extends('layouts.app')
@section('content')

<div class="container">
	<h2 class="alert alert-success center">Doctors of hospital: {{ $hospitalName }}</h2>

    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Title</th>
            </tr>
        </thead>
        <tbody>

        @if(isset($doctors) && $doctors->count() > 0)
            @foreach($doctors as $doctor)
                <tr>
                    <th scope="row">{{ $doctor->id }}</th>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->title }}</td>
                    <td><a href="{{ route('doctor.delete', $doctor->id) }}" class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

</div>

@endsection
