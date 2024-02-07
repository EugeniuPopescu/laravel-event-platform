<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with("user")->get();

        return response()->json([
            "success" => true,
            "payload" => $events
        ]);
    }
}
