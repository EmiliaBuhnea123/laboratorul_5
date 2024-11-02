@extends('layout.app')

@section('title', 'Create Tasks')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Noutate</title>
    </head>

    <body>
        <div class="max-w-md mx-auto mt-10 p-5">
            <h1 class="text-2xl font-bold mb-5">Adaugă o sarcină</h1>
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Titlu:</label>
                    <input type="text" id="title" name="title"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Descriere:</label>
                    <textarea id="description" name="description"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500"
                        rows="4"></textarea>
                </div>

                <div class="mb-4">
                    <label for="tags">Selectează etichetele:</label>
                    <select name="tags[]" id="tags" multiple style="width: 400px;"> 
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>            
                
                <div>
                    <button type="submit"
                        class="w-full bg-blue-300 text-white font-semibold py-2 rounded-md hover:bg-blue-400 focus:outline-none">Salvează sarcina</button>
                </div>
            </form>
        </div>
    </body>

    </html>
@endsection
