<?php

namespace Database\Seeders;

use App\Models\Ticket;
use carbon\carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ticket = new Ticket();
        $ticket->title = "Lowlands";
        $ticket->customer_name = "Mahamoud Bile Ciise";
        $ticket->barcodd = "55992232";
        $ticket->save();
    }
}
