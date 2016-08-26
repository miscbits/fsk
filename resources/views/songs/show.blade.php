@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Song {{ $song->id }}
        <a href="{{ url('songs/' . $song->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Song"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['songs', $song->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Song',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $song->id }}</td>
                </tr>
                <tr><th> Title </th><td> {{ $song->title }} </td></tr><tr><th> Artist </th><td> {{ $song->artist }} </td><th> Link </th><td> <a href="{{ $song->link }}">{{ $song->link }}</a> </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
