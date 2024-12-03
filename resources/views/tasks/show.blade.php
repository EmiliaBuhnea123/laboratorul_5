@extends('layout.app')

@section('title', 'Sarcina')

@section('content')
@if (session()->has('success'))
    <div class="alert alert-success bg-red-500 text-white text-center py-3 px-6 rounded-md mt-4">
        {{ session('success') }}
    </div>
@endif

    <div class="max-w-md mx-auto mt-10 p-5">
        <h1 class="font-bold text-blue-500 text-2xl">{{ $task->title }}</h1>
        <p>{{ $task->description }}</p>

        <h3 class="font-bold text-slate-600 text-xl">Categoria</h3>

        @if ($task->category)
        <p>{{ $task->category->name }}</p>
        @else
        <p>Categoria: Nu a fost asociata o categorie</p>
        @endif

        <h3 class="font-bold text-slate-600 text-xl" >Etichete</h3>
        <ul>
            @foreach ($task->tag as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>

        <h3 class="font-bold text-slate-600 text-xl">Data limită</h3>
        <p>{{ $task->deadline }}</p>

        <h3 class="font-bold text-slate-600 text-xl" >Comentarii</h3>
        <ul>
            @foreach ($task->comments as $item)
                <li>{{ $item->comment }}</li> 
            @endforeach
        </ul>
      
        <h1 class="text-2xl font-bold mb-5">Adaugă un comentariu</h1>
        <form action="{{ route('tasks.comments.store', $task->id) }}" method="POST">
          @csrf
          <div class="mb-4">
            <textarea name="comment" cols="30" rows="10" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-orange-500" required></textarea>
        </div>
        <div class="mb-4"> 
            <button type="submit" class="w-full bg-orange-200 text-white font-semibold py-2 rounded-md hover:bg-orange-500 focus:outline-none">Submit</button>
        </div>        
        </form>

    </div>
@endsection
