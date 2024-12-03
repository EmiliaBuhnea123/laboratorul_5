@extends('layout.app')

@section('title', 'My profile')

@section('content')
    <h1 class="text-3xl font-bold text-center">Profilul meu</h1>

    @if ($profiles)
        <div class="mb-4">
            <h2 class="text-xl font-semibold">{{ $profiles->name }}</h2>
            <p>{{ $profiles->description }}</p>

            @if ($profiles->avatar)
                <img src="{{ asset('storage/' . $profiles->avatar) }}" alt="Avatar" class="mt-2 w-32 h-32 rounded-full">
            @endif
        </div>
    @else
        <p>Nu există informatii despre profil.</p>
    @endif
@endsection
