@extends('layout.app')

@section('title', 'Edit Tasks')

@section('content')
    <div class="max-w-md mx-auto mt-10 p-5">
        <h1 class="text-2xl font-bold mb-5">Editează Sarcina</h1>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Titlu</label>
                <input type="text" name="title" id="title" value='{{ old('title') }}'
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-green-500"
                    value="{{ $task->title }}">
            </div>
            @error('title')
                <div class="text-red-500">*{{ $message }}</div>
            @enderror

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descriere</label>
                <textarea name="description" id="description" value='{{ old('description') }}'
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-green-500"
                    rows="4">{{ old('description', $task->description) }}</textarea>
            </div>
            @error('description')
                <div class="text-red-500">*{{ $message }}</div>
            @enderror

            <div class="mb-4">
                <label for="deadline" class="block text-sm font-medium text-gray-700">Data limită:</label>
                <input type="date" id="deadline" name="deadline" value='{{ old('deadline') }}'
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-green-500"
                    value="{{ $task->deadline }}">
            </div>
            @error('deadline')
                <div class="text-red-500">*{{ $message }}</div>
            @enderror

            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Categorie:</label>
                <select id="category_id" name="category_id" 
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-green-500">
                    <option value="" disabled selected>Alege o categorie</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (old('category_id', $task->category_id) == $category->id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
                <div class="text-red-500">*{{ $message }}</div>
            @enderror


            <div>
                <button type="submit"
                    class="w-full bg-green-400 text-white font-semibold py-2 rounded-md hover:bg-green-500 focus:outline-none">Edit</button>
            </div>
        </form>
    </div>
@endsection
