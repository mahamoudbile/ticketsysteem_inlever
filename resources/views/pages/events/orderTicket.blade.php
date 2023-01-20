@extends('layouts.base')

@section('content')  
   <div class="container">
      <h3>Weet je zeker dat je ticket <b>'{{$event->name}}'</b> wilt bestellen</h3>
      <form action="{{route ('events.storeOrderTicket', $event->id)}}" method="post">
         @csrf
         <div class="py-12">
            <div class="form-group">
            <!-- <label for="amountTicket">Aaantal tickets</label> -->
            <!-- <input type="hidden" name="amountTicket" id="amountTicket" class="form-control" value="1"> -->
            </div>
         </div> 
         <div style="width:24%;">
            <div style="float: left;">
               <input type="submit" value="Ja" class="btn btn-success">
            </div>

            <div style="float: right;">
               <a href="{{url ('eventspage')}}" class="btn btn-danger">Nee</a>
            </div>
         </div>
      </form>
   </div>
    
    
@endsection