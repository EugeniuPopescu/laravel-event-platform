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
    public function run(): void
    {
        $array_event = config("event");

        foreach ($array_event as $event) {
            $new_event = new Event();
            $new_event->fill($event);
            $new_event->save();
        }
    }
}
