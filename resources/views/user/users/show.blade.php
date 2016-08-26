@extends('layouts.app')

@section('content')
<div class="container">

    <h1>{{ $user->name }}
        <a href="{{ url('users/' . $user->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit user"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $user->id }}</td>
                </tr>
                <tr><th> Name </th><td> {{ $user->name }} </td></tr><tr><th> Bio </th><td> {{ $user->bio }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
