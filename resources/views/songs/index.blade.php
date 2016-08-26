@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Songs <a href="{{ url('/songs/create') }}" class="btn btn-primary btn-xs" title="Add New Song"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Title </th><th> Artist </th><th>Link</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($songs as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->artist }}</td>
                    <td><a href="{{ $item->link }}">{{ $item->link }}</a></td>
                    <td>
                        <a href="{{ url('/songs/' . $item->id) }}" class="btn btn-success btn-xs" title="View Song"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/songs/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Song"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/songs', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Song" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Song',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $songs->render() !!} </div>
    </div>

</div>
@endsection
