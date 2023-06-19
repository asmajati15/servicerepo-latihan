@extends('posts.layout')

@section('content')
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
        <form action="{{ route('post.update', $post->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="mb-3">
                  <label for="titleInput" class="form-label">Title</label>
                  <input name="title" type="text" class="form-control" id="titleInput" value="{{ old('title', $post->title) }}">
                </div>
                <div class="mb-3">
                  <label for="descInput" class="form-label">Description</label>
                  <input name="description" type="text" class="form-control" id="descInput" value="{{ old('description', $post->description) }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
