<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($num_utenti = null): void
    {
        $array_event = config("event");

        foreach ($array_event as $event) {
            $new_event = new Event();
            $new_event->fill($event);
            // $new_event->user_id = (condizione) ? random : niente;
            // $new_event->user_id = ($num_utenti != null) ? rand(1, $num_utenti) : null;
            if ($num_utenti) {
                $new_event->user_id = rand(1, $num_utenti);
            }
            $new_event->save();
        }
    }
}
