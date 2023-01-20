@extends('layouts.base')

@section('content')


<h2>Evenementen beheer</h2>
@if(session('status'))
<h6 class="alert alert-success">{{ session('status') }}</h6>
@endif
<a href="{{route('events.create')}}" class="btn btn-primary">Nieuw evenement toevoegen</a>
<div class="index-table">
    <div class="row">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Naam</th>
                    <th scope="col">Startdatum</th>
                    <th scope="col">Prijs</th>
                    <th scope="col">Aantal tickets</th>
                    <th scope="col">Locatie</th>
                </tr>
            </thead>
            @foreach($events as $event)
                        <tr>
                            <td><a href="{{route('events.show', $event->id)}}"<b>{{$event->name}}</a></td>
                            <td class="card-title"> {{$event->event_start}}</td>
                            <td class="card-title"> €{{$event->price}}</td>
                            <td class="card-title"> {{$event->available_tickets}}</td>
                            <td class="card-title"> {{$event->location}}</td>
                        </tr>
                        
        @endforeach
        </table>
    </div>
</div>

@endsection

