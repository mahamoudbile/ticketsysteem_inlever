@extends('layouts.base')

@section('content')
<div class="container">
  <h2>Evenement  aanmaken</h2>

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

  <form action="{{route('events.store')}}" method="post" enctype="mulitpart/form-data">
    @csrf

  <div class="form-group">
      <label for="name">Naam</label>
      <input type="text" class="form-control" id="name" placeholder="Vul hier de naam van het evenement in" name="name">
    </div>

    <div class="form-group">
      <!-- <label for="photo">Evenement afbeelding</label><br> -->
      <!-- <input type="text" class="form-control" id="photo" placeholder="Voeg een afbeelding toe" name="photo"> -->
      <input type="file" id="photo" name="photo" accept="image/png" class="form-control">
      <!-- <input type="submit" value="Uploaden"> -->
    </div>
    
  <div class="form-row">
      <div class="form-group col-md-6">
        <label for="event_start">Startdatum</label>
        <input type="date" class="form-control" id="event_start" name="event_start">
      </div>
      <div class="form-group col-md-6">
        <label for="event_end">Einddatum</label>
        <input type="date" class="form-control" id="event_end" name="event_end">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="available_tickets">Aantal tickets</label>
        <input type="number" class="form-control" id="available_tickets" placeholder="1" min="1" name="available_tickets">
      </div>

      <div class="form-group col-md-3">
        <label for="price">Prijs</label>
        <input type="number" class="form-control" id="price" placeholder="€ 0,00" min="0" name="price">
      </div>

      <div class="form-group col-md-6">
        <label for="location">Locatie</label>
        <input type="text" class="form-control" id="location" placeholder="Vul hier de stad in" name="location">
      </div>


      <div class="form-group col-md-6">
        <label for="description">Beschrijving</label>
      <textarea name="description" id="description" cols="230" rows="5" placeholder="Vul hier de evenement beschrijving in" class="form-control"></textarea>
      </div>

    <!-- div for end form -->
    <!-- //// -->
    </div>
    <!-- //// -->

    <button type="submit" class="btn btn-success">Sla de nieuwe evenement op</button>
    <a href="{{route('events.index')}}" class="btn btn-danger" onclick="cancelFunction()">cancel</a>

    
  </form>
</div>

<script>
  function cancelFunction(){
    alert("Weet je het zeker dat je wilt annuleren?");
  }
</script>
@endsection