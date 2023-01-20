@extends('layouts.base')

@section('content') 

        @if(session()->has('message'))
                <p class="alert alert-success">{{session()->get('message')}}</p>
        @endif

        <h1>Tickets</h1>
        <div class="container" style="padding-bottom: 5%;">
            <div class="row">
                <div class="col-sm">
                <img src="IMG/event_homepage_one.webp" class="rounded float-left" alt="Events">
                </div>
                <div class="col-sm">
                <img src="IMG/event_homepage_third.jpg" class="rounded float-left" alt="Events" style="width: 140%;">
                </div>
                <div class="col-sm">
                  <!--  -->
                </div>
            </div>
        </div>

        <!-- table 1 en 2 -->

        <div class="container">
            <div class="row">
                <div class="col-sm">
                <h4>Top 3 Last upcoming Events</h4>
        <div class="index-table">
            <div class="row">
                    <table class="table table-responsive">
                        <thead class="table-yellow">
                            <tr>
                                <th><i class="fa-sharp fa-solid fa-ticket"></i></th>
                                <th><i class="fa-regular fa-calendar-days"></i></th>
                                <th><i class="fa-sharp fa-solid fa-location-dot"></i></th>
                                <th><i class="fa-solid fa-euro-sign"></i></th>
                            </tr>
                        </thead>
                        @foreach($lastEvents as $event)
                            <tr>
                                <td class="card-title"><i>{{$event->name}}<i></td>
                                <td class="card-title">{{date('Y-m-d', strtotime($event->event_start))}}</td>
                                <td class="card-title">{{$event->location}}</td>
                                <td class="card-title">€{{$event->price}}</td>
                            </tr>
                        @endforeach
                    </table>
            </div>
        </div>
                </div>
                <div class="col-sm">
                <h4>Populair Events</h4>
        <div class="index-table">
            <div class="row">
                    <table class="table table-responsive">
                        <thead class="table-yellow">
                            <tr>
                                <th><i class="fa-sharp fa-solid fa-ticket"></i></th>
                                <th><i class="fa-sharp fa-solid fa-location-dot"></i></th>
                            </tr>
                        </thead>
                        @foreach($populairEvents as $event)
                            <tr>
                                <td class="card-title"><i>{{$event->name}}<i></td>
                                <td class="card-title">{{$event->location}}</td>
                            </tr>
                        @endforeach
                    </table>
            </div>
        </div>
                <div class="col-sm">
                    <!-- <h4>ahi</h4> -->
                </div>
            </div>
        </div>

        <!-- button 'ticket bestellen' -->
            <div class="row">
                <div class="col-sm">
                <a href="{{url('eventspage')}}" class="btn btn-success">Bestel Nu Event Ticket </a>
                </div>
                <div class="col-sm">
                <a href="{{url ('eventspage')}}" class="btn btn-success">Bestel Nu Event Ticket</a>
                </div>
                
            </div>
        </div>



@endsection