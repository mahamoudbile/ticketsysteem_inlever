<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Url;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [pagesController::class, 'showHome'], function () {
    return view('/');
 });
require __DIR__.'/auth.php';

//pages (pagesController)
Route::get('/homepage',[pagesController::class, 'showHome'])->name('home');
Route::get('/eventspage',[pagesController::class, 'showEvents'])->name('events');
Route::get('/aboutUspage',[pagesController::class, 'showAaboutUs'])->name('about-us');
Route::get('/contactpage',[pagesController::class, 'showContact'])->name('contact-us');

// tussen

Route::get('/tickets',[pagesController::class, 'listTickets'])->name('listTickets');

Route::post('/creat-ticket',[pagesController::class, 'creatTicket'])->name('creatTicket');

Route::get('/admin/add-event',[pagesController::class, 'add-event'])->name('add-event')->middleware('auth');

// tussen

Route::post('/admin/addEvent', [EventsController::class, 'procesAddEvent'])->name('procesAddEvent')->middleware('auth');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {
    Route::resource('events', EventController::class);
});

Route::get('events/{id}/order',[\App\Http\Controllers\TicketController::class, 'order'])->middleware('auth')
->name('events.orderTicket');

Route::post('events/{id}/tickerOrder', [\App\Http\Controllers\TicketController::class, 'store'])
->middleware('auth')->name('events.storeOrderTicket');

Route::group(['prefix' => 'pages', 'middleware' => 'auth'], function() {
    Route::resource('ticketOrder', TicketController::class);
});
