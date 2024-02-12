<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $events = Tag::all();

        return response()->json([
            "success" => true,
            "payload" => $events
        ]);
    }

    public function show($id)
    {
        $tags = Tag::all()->find($id);

        return response()->json([
            "success" => $tags ? true : false,
            "payload" => $tags ? $tags : "Nessun tag corrispondente all'id"
        ]);
    }
}
