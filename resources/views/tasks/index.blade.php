@extends('layout.app')

@section('title', 'Tasks')

@section('content')

@if (session()->has('success'))
    <div class="alert alert-success bg-red-500 text-white text-center py-3 px-6 rounded-md mt-4">
        {{ session('success') }}
    </div>
@endif

    <div class="mb-6">
        <a class=" bg-blue-200 p-3 rounded-md" href="{{ route('tasks.create') }}">Create Tasks</a>
    </div>
    <ul class="flex flex-col">
        @foreach ($tasks as $task)
            <li class="mb-5">
                <a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>
                <div class="flex flex-row gap-3">
                    <a href="{{ route('tasks.edit', $task->id) }}" class=" bg-green-300 p-3 rounded-md">Edit</a>

                    <div class="flex flex-row gap-3">
                        <a href="{{ route('tasks.show', $task->id) }}" class=" bg-yellow-400 p-3 rounded-md">Show</a>

                        <div class="flex flex-row gap-3">
                            <a href="{{ route('tasks.show', $task->id) }}" class=" bg-orange-200 p-3 rounded-md">Add a comment</a>    

                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class=" bg-red-200 p-3 rounded-md">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
