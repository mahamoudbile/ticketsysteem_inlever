<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use GrahamCampbell\ResultType\Success;
use Ramsey\Uuid\Codec\OrderedTimeCodec;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        $events = Event::orderBy('created_at', 'DESC')->get();
        return view('/dashboard/events/index')->with('events', $events);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/dashboard/events/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    dd( $request->all());

        $this->validate($request,[
            'name' => 'required',
            'photo' => 'required',
            'event_start' => 'required | date',
            'event_end' => 'required | date',
            'available_tickets' => 'numeric',
            'location' => 'required',
            'price' => 'numeric',
            'description' => 'required'
        ]);
        $event = new Event();
        $event->name = $request->name;
        $event->photo = $request->photo;
        // if($request->hasFile('photo'))
        // {
        //     $file = $request->file('photo');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extention;
        //     // $file->move('uploads/', $filename);
        //     // $event->photo = $filename;
        // }
        $event->event_start = $request->event_start;
        $event->event_end = $request->event_end;
        $event->available_tickets = $request->available_tickets;
        $event->location = $request->location;
        $event->price = $request->price;
        $event->description = $request->description;
        $event->save();
        return redirect('/dashboard/events')->with('status', 'Evenement succesvol opgeslagen');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('/dashboard/events/show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Responses
     */
    public function edit($id)
    {
       $event = Event::findOrFail($id);
       return view('/dashboard/events/edit')->with(['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $this->validate($request,[
            'name' => 'required',
            'photo' => 'required',
            'event_start' => 'required | date',
            'event_end' => 'required | date',
            'available_tickets' => 'numeric',
            'location' => 'required',
            'price' => 'numeric',
            'description' => 'required'
        ]);

        $event = Event::findOrFail($id);

        $event->name = $request->name;
        $event->photo = $request->photo;
        // if($request->hasFile('photo'))
        // {
        //     $file = $request->file('photo');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extention;
        //     $file->move('uploads/', $filename);
        //     $event->photo = $filename;
        // }
        $event->event_start = $request->event_start;
        $event->event_end = $request->event_end;
        $event->available_tickets = $request->available_tickets;
        $event->location = $request->location;
        $event->price = $request->price;
        $event->description = $request->description;
        $event->save();

    
        return redirect('/dashboard/events')->with('status', 'Evenement Succesvol geupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::destroy($id);
        return redirect('/dashboard/events')->with('status', 'Evenement verwijderd ');
    }
}
