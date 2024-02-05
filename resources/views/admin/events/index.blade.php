@extends('layouts.admin')

    @section('content')
    <div class="container-fluid mt-4">
    	<div class="row justify-content-center">
            <h1 class="text-center">Events</h1>
            @foreach ($events as $event)
            <div class="col-md-4 py-2">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            {{ $event->name }}
                        </h4>
                    </div>
                    
                    <div class="row p-2">
                       <div class="col-6 card-body">
                            <h5 class="d-inline-block">Date:</h5>
                            <p>{{ $event->date }}</p>
    
                            {{-- category --}}
                            <h6 class="card-subtitle mb-2 text-muted">
                                Tickets: {{ $event->available_tickets  }}
                            </h6>

                            {{-- tag --}}
                            <h6 class="card-subtitle mb-2 text-muted pt-2">
                                @if (count($event->tags) > 0)
                                    <ul>
                                        @foreach ($event->tags as $tag)
                                            <li>#{{ $tag->name }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No Tag #</p>
                                @endif
                            </h6>
                        </div>
                        {{-- buttons --}}
                        <div class="col-6 d-flex flex-column justify-content-center align-items-center py-2">
                            <div class="col-4 d-flex justify-content-center">
                                <a class="btn btn-outline-warning text-dark" href="{{ route("admin.events.show", $event->id) }}">Dettaglio</a>
                            </div>
                            <div class="col-4 d-flex justify-content-center py-1">
                                <a class="btn btn-outline-info text-body" href="{{ route("admin.events.edit", $event->id) }}">Modifica</a>
                            </div>
    
                            <div class="col-4 d-flex justify-content-center">
                                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST"
                                    class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Elimina" class="btn btn-outline-danger text-body">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            @endforeach
    	</div>
    </div>
@endsection
