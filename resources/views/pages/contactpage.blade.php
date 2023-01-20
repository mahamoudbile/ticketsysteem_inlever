@extends('layouts.base')

@section('content')  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TicketSystem</title>


    <h1>Contact met ons</h1>
    <form action="homepage.blade.php" method="post">
        <label for="">Name</label>
        <input type="text" name="" id=""><br>

        <label for="">telefoonnummer</label>
        <input type="text" name="" id=""><br>

        <label for="">Email</label>
        <input type="text" name="" id=""><br>

        <button>Verzend</button>
    </form>
    
    
@endsection