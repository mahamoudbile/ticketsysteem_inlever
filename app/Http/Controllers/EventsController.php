<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function addEvent(){
        return view('addEvent');
    }

    public function procesAddEven(Request $request){
        
    }
}
