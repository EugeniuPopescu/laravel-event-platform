<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        $tags = Tag::all();

        return view("admin.events.index", compact("events", "tags"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();

        return view("admin.events.create", compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $validated = $request->validated();
        $validated["user_id"] = Auth::id();

        $new_event = new Event();
        $new_event->fill($validated);
        $new_event->save();

        // relazione portfolio tag
        if ($request->tags) {
            // 
            $new_event->tags()->attach($request->tags);
        }


        return redirect()->route("admin.events.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $tag = Tag::all();

        return view("admin.events.show", compact('event', 'tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $tags = Tag::all();

        return view("admin.events.edit", compact('event', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $validated_data = $request->validated();

        $event->fill($validated_data);
        $event->update();

        // ddd($event);

        // var_dump($request->filled("tags"));
        // var_dump($validated_data["tags"]);

        if ($request->filled("tags")) {
            $validated_data["tags"] = array_filter($validated_data["tags"]) ? $validated_data["tags"] : [];
            $event->tags()->sync($validated_data["tags"]);
        }

        return redirect()->route("admin.events.index");
        // return "ok";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route("admin.events.index");
    }
}
