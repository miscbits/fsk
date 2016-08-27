@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New Event</h1>
    <hr/>

    {!! Form::open(['url' => '/events', 'class' => 'form-horizontal', 'files'=>true]) !!}

            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                {!! Form::label('title', 'Title', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
                {!! Form::label('location', 'Location', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('location', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                {!! Form::label('description', 'Event Description', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
                {!! Form::label('image', 'Header Image', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::file('image', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('time') ? 'has-error' : ''}}">
                {!! Form::label('time', 'Time', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('datetime-local', 'time', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('time', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('time') ? 'has-error' : ''}}">
                {!! Form::label('public', 'Public Event', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('public', '1', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('public', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection