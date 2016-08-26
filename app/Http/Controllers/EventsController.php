<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class EventsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['calendar']]);
        $this->middleware('role:admin|leader|ops', ['except'=['calendar', 'index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function calendar()
    {
        $events = Event::orderBy('time', 'desc')->paginate(6);

        return view('events.calendar', compact('events'));
    }

    public function index()
    {
        $events = Event::paginate(15);

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        Event::create($request->all());

        Session::flash('flash_message', 'Event added!');

        return redirect('events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        
        $event = Event::findOrFail($id);
        $event->update($request->all());

        Session::flash('flash_message', 'Event updated!');

        return redirect('events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Event::destroy($id);

        Session::flash('flash_message', 'Event deleted!');

        return redirect('events');
    }
}
