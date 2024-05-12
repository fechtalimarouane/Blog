@extends('layout.layout')

@section('content')
    <div class="container mx-auto my-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($posts as $post)
            <div class="bg-white rounded-lg shadow-md p-4 border border-gray-200 hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1 flex flex-col justify-between h-full">
                <div>
                    <h1 class="text-xl font-semibold text-gray-800">{{ $post->titre }}</h1>
                    <p class="mt-2 text-gray-600">{{ $post->contenu }}</p>
                </div>
                <div class="mt-4 flex items-center justify-between">
                    <a href="#" class="text-indigo-600 hover:underline">Read more</a>
                    <span class="text-gray-400 text-sm">{{ $post->created_at->format('M d, Y') }}</span>
                </div>
                <p class="mt-4 text-gray-500 text-sm">Posted by: {{ $post->user->name }}</p>
            </div>
        @endforeach
    </div>
@endsection

