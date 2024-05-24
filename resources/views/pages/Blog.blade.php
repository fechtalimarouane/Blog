@extends('layout.layout')

@section('content')
    <div class="container mx-auto my-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($posts as $post)
            <div class="bg-white rounded-lg shadow-md p-4 border border-gray-200 hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1 flex flex-col justify-between h-full">
                <div>
                    <h1 class="text-xl font-semibold text-gray-800">{{ $post->titre }}</h1>
                    <p class="mt-2 text-gray-600">{{ $post->contenu }}</p>
                </div>
@if (Auth::check() and Auth::user()->admin)

    <div>
        <form action="/blog/delete/{{ $post->id }}" method="post">
            @csrf
            @method('DELETE')
          <button type="submit" class="relative -ml-px inline-flex items-center bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10">Delet</button>
        </form>
    </div>
    
@endif

                <div class="mt-4 flex items-center justify-between">
                    <a href="/blog/show/{{ $post->id }}" class="text-indigo-600 hover:underline">Read more</a>
                    
                    <span class="text-gray-400 text-sm">{{ $post->created_at->format('M d, Y') }}</span>
                </div>
                <div class="flex justify-between items-center">
                <p class="mt-4 text-gray-500 text-sm">Posted by: {{ $post->user->name }}</p>
                    
                    </div>
            </div>
        @endforeach
    </div>
@endsection

