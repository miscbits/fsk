@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Events <a href="{{ url('/events/create') }}" class="btn btn-primary btn-xs" title="Add New Event"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div>
            @foreach($events as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->title }}</td><td>{{ $item->location }}</td><td>{{ $item->time }}</td>
                    @if(Auth::user()->hasRole(['admin', 'leader', 'ops']))
                        <td>
                            <a href="{{ url('/events/' . $item->id) }}" class="btn btn-success btn-xs" title="View Event"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                            <a href="{{ url('/events/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Event"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/events', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Event" />', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'title' => 'Delete Event',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                ));!!}
                            {!! Form::close() !!}
                        </td>
                    @endif
                </tr>
            @endforeach
        <div class="pagination-wrapper"> {!! $events->render() !!} </div>
    </div>

</div>
@endsection
