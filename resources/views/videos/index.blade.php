@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Videos <a href="{{ url('/videos/create') }}" class="btn btn-primary btn-xs" title="Add New video"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Title </th><th> Video </th><th> Description </th>
                    @if(Auth::user()->hasRole(['admin', 'leader', 'ops']))
                    <th>Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($videos as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        <video width="320" height="240" controls>
                            <source src="{{ $item->link }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </td>
                    <td>{{ $item->description }}</td>
                    @if(Auth::user()->hasRole(['admin', 'leader', 'ops']))
                        <td>
                            <a href="{{ url('/videos/' . $item->id) }}" class="btn btn-success btn-xs" title="View video"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                            <a href="{{ url('/videos/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit video"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/videos', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete video" />', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'title' => 'Delete video',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                ));!!}
                            {!! Form::close() !!}
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $videos->render() !!} </div>
    </div>

</div>
@endsection
