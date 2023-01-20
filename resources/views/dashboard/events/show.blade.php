@extends('layouts.base')

@section('content')
<h2>Events detailpagina</h2>

<h3><b>#</b>{{$event->id}}</h3>
<p><b>Nam: </b>{{$event->name}}</p>
<p><b>Startdatum: </b>{{$event->event_start}}</p>
<p><b>Einddatum: </b>{{$event->event_end}}</p>
<p><b>Beschikbare tickets: </b>{{$event->available_tickets}}</p>
<p><b>Locatie: </b>{{$event->location}}</p>
<p><b>Prijs: </b>€{{$event->price}}</p>
<p><b>Beschrijving: </b>{{$event->description}}</p>
<p><b>Aangemaakt: </b>{{$event->created_at}}</p>
<p><b>Geupdate: </b>{{$event->updated_at}}</p>

<a href="{{route('events.edit', $event->id)}}" class="btn btn-info">Updaten</a>
<a href="{{route('events.index')}}" class="btn btn-dark">Terug naar masterpage</a>
<form action="{{route('events.destroy', $event->id)}}" method="post">
    @csrf
    @method('DELETE')
    <input type="submit" value="Verwijderen" class="btn btn-danger" onclick="cancelFunction()">
</form>
</div>

<script>
    function cancelFunction(){
        if (confirm("Weet je zeker dat je wilt verwijderen?")) {

        }else {
           
        }
    }
</script>

@endsection

<!-- <i class="fa-solid fa-trash"></i> -->
