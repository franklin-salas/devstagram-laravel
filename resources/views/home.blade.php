@extends('layouts.app')

@section('titulo')
    Página principal
@endsection
@section('contenido')
 
@if ($posts->count())
<div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach ($posts as $post)
        <div>
            <a href="{{ route('post.show', ['post' => $post, 'user' => $post->user]) }}">
                <img src="{{ asset('uploads') . '/' . $post->imagen }}"
                    alt="Imagen del post {{ $post->titulo }}">
            </a>
        </div>
    @endforeach
</div>
<div class="my-10">
    {{ $posts->links() }}
</div>
@else
<p class="text-gray-600 uppercase text-sm text-center font-old">
    No hay posts / Sigue a alguien para poder ver posts
</p>
@endif
@endsection