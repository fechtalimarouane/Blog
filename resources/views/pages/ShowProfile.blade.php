
@extends('layout.layout2')

@section('items')
    

<div class="mt-16 container mx-auto p-4">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $post->titre }}</h1>
        <p class="text-gray-700 text-sm mb-6">By {{ $post->user->name }} on {{ $post->created_at->format('M d, Y') }}</p>
        <div class="prose">
            {{$post->contenu}}
        </div>
        <div class="mt-6">
            <a href="/blog" class="text-indigo-600 hover:text-indigo-900">Back to Blog</a>
        </div>
    </div>
</div>

@endsection
