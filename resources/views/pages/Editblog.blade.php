

@extends('layout.layout2')
@section('items')

<div class="min-h-screen flex items-center justify-center w-full dark:bg-gray-950">
    <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg px-8 py-6 max-w-md">
        <h1 class="text-2xl font-bold text-center mb-4 dark:text-gray-200">UPDATE BLOG</h1>
        <form action="/blog/updete/{{ $post->id }}" method="post">
            @csrf
            @method('put')
            <div class="mb-4">
                <label for="text" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                <input
                    type="text"
                    id="text"
                    name="titre"
                    class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Enter your title"
                    value="{{ $post->titre }}"
                >
                @error('titre')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="contenu" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">contenu</label>
                <textarea
                    type="text"
                    id="contenu"
                    name="contenu"
                    class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                >{{ $post->contenu }}</textarea>
                @error('contenu')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
           <button
                type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                UPDATE
            </button>
        </form>
    </div>
</div>


@endsection


