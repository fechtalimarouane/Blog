@extends('layout.layout2')
@section('items')


<div class="mt-6 ml-6">
<a href="/blog/create" class="inline-block text-white font-bold py-2 px-4 rounded-full bg-gradient-to-r from-pink-500 to-purple-800 border border-transparent transform hover:scale-110 hover:border-white transition-transform duration-3000 ease-in-out">
  CREATE BLOGE
</a>
</div>
    <div class="container mx-auto my-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
      @foreach ($posts as $post)
          <div class="bg-white rounded-lg shadow-md p-4 border border-gray-200 hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1 flex flex-col justify-between h-full">
              <div>
                  <h1 class="text-xl font-semibold text-gray-800">{{ $post->titre }}</h1>
                  <p class="mt-2 text-gray-600">{{ $post->contenu }}</p>
              </div>
              <div class="mt-4 flex items-center justify-between">
                  <a href="/blog/show/{{ $post->id }}" class="text-indigo-600 hover:underline">Read more</a>
                  
                  <span class="text-gray-400 text-sm">{{ $post->created_at->format('M d, Y') }}</span>
              </div>
              <div class="flex justify-between items-center">
              <p class="mt-4 text-gray-500 text-sm">Posted by: {{ $post->user->name }}</p>
                      <span class="isolate inline-flex rounded-md shadow-sm mt-3">
                      <a href="/blog/edit/{{ $post->id }}"><button type="button" class="relative inline-flex items-center rounded-l-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10">Update</button></a>
                      
                      <form action="/blog/delete/{{ $post->id }}">
                        @csrf
                        @method('DELETE')
                      <button type="submit" class="relative -ml-px inline-flex items-center bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10">Delet</button>
                    </form>
                    
                    </span>
                  </div>
          </div>
      @endforeach
  </div>

@endsection

