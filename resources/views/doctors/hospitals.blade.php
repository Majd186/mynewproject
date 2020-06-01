@extends('layouts.app')
@section('content')

<div class="container">
	<h2 class="alert alert-success center">Hospitals</h2>

    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Show doctors</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @if(isset($hospitals) && $hospitals->count() > 0)
                @foreach($hospitals as $hospital)
                    <tr>
                        <th scope="row">{{ $hospital->id }}</th>
                        <td>{{ $hospital->name }}</td>
                        <td>{{ $hospital->address }}</td>
                        <td><a href="{{ route('hospital.doctors',$hospital->id) }}" class="btn btn-success">Show doctors</a></td>
                        <td><a href="{{ route('hospital.delete',$hospital->id) }}"  class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

</div>

@endsection