@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Events</h1>
    <div>
            @foreach($events as $item)
                <div class="container">
                    <div class="row">
                        <!-- Card Projects -->
                        <div class="col-md-6 col-md-offset-3">
                            <div class="card">
                                <div class="card-image">
                                    <img class="img-responsive" src="{{ $item->image }}">
                                    <span class="card-title">{{ $item->title }}</span>
                                </div>
                                
                                <div class="card-content">
                                    <p>{{ $item->location }} on {{ $item->time->format('M d, Y') }} at {{ $item->time->format('g:iA') }}</p>
                                </div>
                                
                                <div class="card-description">
                                    {{$item->description}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                    
                    
            @endforeach
        <div class="pagination-wrapper"> {!! $events->render() !!} </div>
    </div>

</div>
@endsection
