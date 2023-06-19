@extends('posts.layout')

@section('content')
    <a href="{{ route('post.index') }}">back</a>

    <div class="card">
        <div class="card-header">
            {{ $post->title }}
        </div>
        <div class="card body">
            {{ $post->description }}
        </div>
    </div>
@endsection
