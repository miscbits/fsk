@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Event {{ $event->id }}
        <a href="{{ url('events/' . $event->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Event"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['events', $event->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Event',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $event->id }}</td>
                </tr>
                <tr><th> Title </th><td> {{ $event->title }} </td></tr><tr><th> Location </th><td> {{ $event->location }} </td></tr><tr><th> Time </th><td> {{ $event->time }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
