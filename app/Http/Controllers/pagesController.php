<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;



class pagesController extends Controller
{
    public function showHome() {
        $lastEvents = Event::all();
        $lastEvents = Event::orderBy('created_at', 'DESC')->Limit(3)->get();
        $populairEvents = Event::all();
        $populairEvents = Event::orderBy('available_tickets', 'DESC')->Limit(3)->get();
        return view('/pages/homepage')->with('lastEvents', $lastEvents)->with('populairEvents', $populairEvents);
    }

    public function showEvents() {
        // $ticket = Ticket::first();
        // dd($ticket->customer_name);
        $events = Event::all();
        $events = Event::orderBy('created_at', 'DESC')->get();
        return view(view:'pages/eventspage')->with('events', $events);
    }

    public function showAaboutUs() {
        return view('pages/aboutUspage');
    }

    public function showLogin() {
        return view('pages/login');
    }
    

    public function showContact() {
        return view('pages/contactpage');
    }
    
    
}
