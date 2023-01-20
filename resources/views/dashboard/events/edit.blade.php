@extends('layouts.base')

@section('content')
<div class="container">
  <h2>Evenement  Aanpassen</h2>

  @if ($errors->any())
              <div class="alert alert-danger">
                <P><b>Let op!</b> Er is iets mis gegaan!</P>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

  <form action="{{route('events.update', $event->id)}}" method="post">
    @csrf
    @method("PUT")

  <div class="form-group">
      <label for="name">Naam</label>
      <input type="text" class="form-control" id="name" value="{{$event->name}}" name="name" readonly>
    </div>

    <div class="form-group">
      <label for="photo">Afbeelding</label>
      <input type="text" class="form-control" id="photo" value="{{$event->photo}}" name="photo">
    </div>
    
  <div class="form-row">
      <div class="form-group col-md-6">
        <label for="event_start">Startdatum</label>
        <input type="date" class="form-control" id="event_start" name="event_start" value="{{date('Y-m-d', strtotime($event->event_start))}}">
      </div>
      <div class="form-group col-md-6">
        <label for="event_end">Einddatum</label>
        <input type="date" class="form-control" id="event_end" name="event_end" value="{{date('Y-m-d', strtotime($event->event_start))}}">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="available_tickets">Aantal tickets</label>
        <input type="number" class="form-control" id="available_tickets" value="{{$event->available_tickets}}" min="1" name="available_tickets">
      </div>

      <div class="form-group col-md-3">
        <label for="price">Prijs</label>
        <input type="number" class="form-control" id="price" value="{{$event->price}}" min="0" name="price">
      </div>

      <div class="form-group col-md-6">
        <label for="location">Locatie</label>
        <input type="text" class="form-control" id="location" value="{{$event->location}}" name="location">
      </div>


      <div class="form-group col-md-6">
        <label for="description">Beschrijving</label>
        <textarea name="description" id="description" cols="230" rows="5" value="{{$event->description}}" class="form-control">{{$event->description}}</textarea>
      </div>

    <!-- div for end form -->
    <!-- //// -->
    </div>
    <!-- //// -->

    <button type="submit" class="btn btn-success">Evenemtn updaten</button>
    <a href="{{route('events.show', $event->id)}}" class="btn btn-danger" onclick="cancelFunction()">cancel</a>

    
  </form>
</div>




<script>
function cancelFunction() {
  alert("Weet je zeker dat je wilt annuleren?");
}
</script>
@endsection