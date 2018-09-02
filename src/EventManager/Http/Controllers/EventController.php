<?php

namespace Paplow\EventManager\Http\Controllers;

use Paplow\EventManager\Models\EventManager;
use Paplow\EventManager\Http\Requests\EventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('event.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return array
     */
    public function get_events()
    {
        return EventManager::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        EventManager::create($request->all());
        return redirect()->back()->with('status', 'Event added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param EventManager $event
     * @return void
     */
    public function show(EventManager $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EventManager $event
     * @return \Illuminate\Http\Response
     */
    public function edit(EventManager $event)
    {
        return view('event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $request
     * @param EventManager $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, EventManager $event)
    {
        $event->update($request->all());
        return redirect()->route('event.index')->with('status', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param EventManager $event
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(EventManager $event)
    {
        $event->delete();
        return redirect()->route('event.index')->with('status', 'Deleted successfully.');
    }

}
