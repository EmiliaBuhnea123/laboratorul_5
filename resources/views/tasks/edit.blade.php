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
            <input type="text" name="title" id="title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-green-500" value="{{ $task->title }}">
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Descriere</label>
            <textarea name="content" id="content" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-green-500" rows="4">{{ $task->content }}</textarea>
        </div>

        <div>
            <button type="submit" class="w-full bg-green-400 text-white font-semibold py-2 rounded-md hover:bg-green-500 focus:outline-none">Edit</button>
        </div>
    </form>
</div>
@endsection

