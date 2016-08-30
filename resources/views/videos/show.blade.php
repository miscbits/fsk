@extends('layouts.app')

@section('content')
<div class="container">

    <h1>video {{ $video->id }}
        <a href="{{ url('videos/' . $video->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit video"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['videos', $video->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete video',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $video->id }}</td>
                </tr>
                <tr><th> Title </th><td> {{ $video->title }} </td></tr><tr><th> Link </th><td> {{ $video->link }} </td></tr><tr><th> Description </th><td> {{ $video->description }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
