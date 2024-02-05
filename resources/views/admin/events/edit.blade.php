@extends("layouts.admin")

@section("content")
<div class="container py-3">
    
    <div class="row">
        <h1>New Event</h1>
    </div>

    <div class="row">
        <div class="col-6">
            <form action="{{ route("admin.events.update", $event->id) }}" method="POST">
                {{-- cross scripting request forgery --}}
                @csrf

                {{-- per la sintassi corretta --}}
                @method("PUT")

                {{-- name  --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Event Name</label>
                    <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name" value="{{ old("name") ?? $event->name }}">

                    {{-- error message --}}
                    @error("name")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                {{-- date  --}}
                <div class="mb-3">
                    <label for="date"  class="form-label">Date</label>
                    <input type="text" class="form-control @error("date") is-invalid @enderror" id="date" name="date" value="{{ old("date") ?? $event->date }}">
                    

                    {{-- error message --}}
                    @error("date")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                {{-- available_tickets  --}}
                <div class="mb-3">
                    <label for="available_tickets" class="form-label">Tickets</label>
                    <input type="number" class="form-control @error("available_tickets") is-invalid @enderror" id="available_tickets" name="available_tickets" value="{{ old("available_tickets") ?? $event->available_tickets }}">

                    {{-- error message --}}
                    @error("available_tickets")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                {{-- select tag --}}
                <div class="mb-3">
                    <label for="tag" class="form-label">Tag</label>
                    <select multiple name="tags[]" id="" class="form-select">
                        <option value="">nessun tag</option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach 
                    </select>
                </div>

                <button type="submit" class="btn btn-dark">Edit</button>
                </form>
        </div>
    </div>
</div>
@endsection
