@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <h2 class="py-3 text-center">{{ $event->name }}</h2>
            <div class="col-3">
                <h4>Date: {{ $event->date }}</h4>
                <h4>Tickets: {{ $event->available_tickets}}</h4>
                <h4>{{ $event->tag->name ?? "No Tag" }}</h4>
            </div>
            <div class="py-3 text-center">
                <a href="{{ route('admin.events.index') }}" class="btn btn-primary">Torna alla Event list</a>
                <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-warning">Modifica</a>
            </div>
        </div>
    </div>
@endsection
