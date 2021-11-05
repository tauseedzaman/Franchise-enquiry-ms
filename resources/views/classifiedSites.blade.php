@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="text-center text-success col my-3 border-bottom">Classified Sites</h1>
    </div>
    <div class="row">

        <div class="col-12">
            <table class="table table-info table-bordered  shadow-sm talbe-hoverable">
                <thead class="thead-dark">
                <th>S/No</th>
                <th>Name</th>
                <th>Registeration</th>
                <th>Link</th>
            </thead>
            <tbody>
                @foreach ($sites as $site)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $site->name }}</td>
                    <td><a class="btn btn-success" href="{{ $site->link }}" target="__black">Register</a></td>
                    <td>{{ $site->link }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
