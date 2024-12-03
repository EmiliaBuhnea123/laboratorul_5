@extends('layout.app')

@section('title', 'Profiles')

@section('content')
<h1 class="text-3xl font-bold text-center">Toate Profilurile</h1>

@if ($profiles->isEmpty())
    <p class="text-center">Nu există profiluri disponibile.</p>
@else
    <table class="table-auto w-full border-collapse border border-gray-200 mt-4">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Nume</th>
                <th class="border border-gray-300 px-4 py-2">Descriere</th>
                <th class="border border-gray-300 px-4 py-2">Avatar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profiles as $profile)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $profile->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $profile->description }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if ($profile->avatar)
                            <img src="{{ asset('storage/' . $profile->avatar) }}" alt="Avatar" class="w-16 h-16 rounded-full">
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
