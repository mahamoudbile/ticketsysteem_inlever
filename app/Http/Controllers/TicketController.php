<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Ticket;
use Illuminate\Auth\Events\Validated;
use PhpParser\Node\Expr\New_;

class TicketController extends Controller
{
    /**
     * Display for a event
     *
     * @param $eventId
     */
    public function order($eventId) {
        $event = Event::findOrFail($eventId);
        return view('pages.events.orderTicket')->with('event', $event);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param $eventId
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($eventId ,Request $request)
    {
        $event = Event::findOrFail($eventId);
        
        $order = null;
        $this->Validate($request,[
            'amountTicket' => 'numeric'
        ]);

        \DB::transaction(function() use ($request, $event, &$order, $eventId){
        //Order

        $order = new Order();
        $order->cumstomer_id = \Auth::id();
        $order->event_id = $eventId;
        $order->status = 'paid';
        $order->order_number = Date('Ymd') . ( Order::all()->count() + 1);
        $order->order_date = date('Y-m-d h:m:s');
        $order->save();
        $this->order = $order;
       
        //Ticket   
        $amountOfTicket = $request->amountTicket;

        for ($i = 0; $i < $amountOfTicket; $i++){
            $ticket = new Ticket();
            $ticket->event_id = $order->id;
            $ticket->user_id =  \Auth::id();
            $ticket->save();

        
        }
        });
        return redirect()->route('pages/eventspage')->with('message', 'ticket besteld');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
