@extends('layouts.base')

@section('content')  
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TicketSystem</title> -->


    <h1>Upcoming Events</h1>

   
    @foreach($events as $event)
    <div class="container1">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$event->name}}</h4>
                    <h6 class="card-eventstart"><b>Start datum:</b> {{$event->event_start}}</h6>
                    <h6 class="card-eventend"><b>Eind datum:</b> {{$event->event_end}}</h6>
                    <h6 class="card-location"><b>Locatie:</b> {{$event->location}}</h6>
                    <!-- <h6 class="card-location">{{$event->photo}}</h6> -->
                    <a href="{{route ('events.orderTicket', $event->id)}}" class="btn btn-primary">Bestel ticket</a>
                </div>
            </div>
        </div>
    @endforeach
    
    

    
    
@endsection


 