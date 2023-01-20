<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = new Event();
        $event->name = 'Mahamoud';
        $event->photo = 'event_poto';
        $event->event_start = '2022-12-01';
        $event->event_end = '2023-12-01';
        $event->available_tickets = '3';
        $event->price = '4';
        $event->location = 'Tilburg';
        $event->description = 'test';
        $event->save();

        $event = new Event();
        $event->name = 'Ciise';
        $event->photo = 'event_poto_2';
        $event->event_start = '2022-12-01';
        $event->event_end = '2023-12-01';
        $event->available_tickets = '3';
        $event->price = '4';
        $event->location = 'Breda';
        $event->description = 'Getest';
        $event->save();
    }
}