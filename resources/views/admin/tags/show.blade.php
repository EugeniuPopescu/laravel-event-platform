@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="py-3 text-center">{{ $tag->name }}</h2>
            <div class="col-12">
                <p>{{ $tag->description }}</p>
            </div>
            <div class="py-3 text-center">
                <a href="{{ route('admin.tags.index') }}" class="btn btn-primary">Torna alla projects list</a>
                <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-warning">Modifica</a>
            </div>
        </div>
    </div>
@endsection
