<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return response()->json([
            "success" => true,
            "payload" => $events
        ]);
    }

    // metodo show che usa il success true/false
    public function show($id)
    {
        $events = Event::with("user", "tags")->find($id);

        // STESSO LAVORO, MA CON DIVERSI MODI

        // if ($events) {
        //     return response()->json([
        //         "success" => true,
        //         "payload" => $events
        //     ]);
        // } else {
        //     return response()->json([
        //         "success" => false,
        //         "playload" => "Nessun evento corrispondente all'id"
        //     ]);
        // }


        // return $events ? response()->json([
        //     "success" => true,
        //     "payload" => $events
        // ]) : response()->json([
        //     "success" => false,
        //     "playload" => "Nessun evento corrispondente all'id"
        // ]);

        return response()->json([
            "success" => $events ? true : false,
            "payload" => $events ? $events : "Nessun evento corrispondente all'id"
        ]);
    }

    // metodo show che usa l'Http code (404 not found) con findOrFail
    // public function show($id)
    // {
    //     $events = Event::with("user")->findOrFail($id);

    //     return response()->json([
    //         "success" => $events ? true : false,
    //         "payload" => $events ? $events : "Nessun evento corrispondente all'id"
    //     ]);
    // }

    // metodo show che usa l'errore manuale 
    // public function show($id)
    // {
    //     $events = Event::with("user")->find($id);

    //     if (!$events) {
    //         return response(null, 404);
    //     }

    //     return response()->json([
    //         "success" => true,
    //         "payload" => $events
    //     ]);
    // }
}
