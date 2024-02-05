@extends("layouts.admin")

@section("content")
<div class="container py-3">
    
    <div class="row">
        <h1>Edit Tag</h1>
    </div>

    <div class="row">
        <div class="col-6">
            <form action="{{ route("admin.tags.update", $tag->id) }}" method="POST">
                {{-- cross scripting request forgery --}}
                @csrf

                {{-- per la sintassi corretta --}}
                @method("PUT")

                {{-- name  --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name" value="{{ old("name") ?? $tag->name }}">

                    {{-- error message --}}
                    @error("name")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                {{-- link  --}}
                <div class="mb-3">
                    <label for="link"  class="form-label">Link</label>
                    <textarea class="form-control @error("link") is-invalid @enderror" rows="2" id="link" name="link" value="{{ old("link") ?? $tag->link }}"></textarea>

                    {{-- error message --}}
                    @error("link")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-dark">Edit</button>
                </form>
        </div>
    </div>
</div>
@endsection
