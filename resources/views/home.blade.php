@extends('layout.app')

@section('title', 'Pagina principala')

@section('content')

    @auth
        <p>Welcome {{ auth()->user()->name }}</p>
        <h1>Hello</h1>
    @endauth

    <h1 class="text-center text-slate-600 text-4xl">To-Do App pentru echipe</h1>

    <div class="text-center">
        <ul class="list-none p-4 inline-flex mx-8">
            <li><a href="{{ route('tasks.index') }}"
                    class="text-cyan-600 font-bold px-3 rounded mr-4 hover:bg-cyan-600 hover:text-white transition-colors duration-300">Vezi
                    lista de sarcini</a></li>
            <li><a href="{{ route('tasks.create') }}"
                    class="text-cyan-600 font-bold px-3 rounded hover:bg-cyan-600 hover:text-white transition-colors duration-300">Adaugă
                    o sarcină nouă</a></li>
        </ul>

    </div>


    <p class="text-justify">Aplicația To-Do App ajută echipele să colaboreze eficient, să aloce sarcini și să monitorizeze
        progresul acestora. Este destinată unei echipe care dorește să își gestioneze sarcinile, să le atribuie membrilor și
        să monitorizeze starea și prioritatea sarcinilor, similar cu GitHub Issues. Cu o interfață intuitivă, aplicația
        permite utilizatorilor să vizualizeze sarcinile în curs de desfășurare și să se asigure că toate activitățile sunt
        finalizate la timp. În plus, funcționalitățile de notificare ajută echipele să rămână la curent cu termenii limită
        și să îmbunătățească comunicarea între membrii echipei.</p>

    <ol class="list-decimal list-inside">
        <h3 class="text-center text-slate-600 text-3xl p-4">Principalele funcționalități</h3>
        <li>Crearea sarcinilor
        <li>Editarea sarcinilor</li>
        <li>Stergerea sarcinilor.</li>
    </ol>

    @if (isset($lastTask))
        <x-task title="{{ $lastTask['title'] }}" description="{{ $lastTask['description'] }}"
            created="{{ $lastTask['created'] }}" updated="{{ $lastTask['updated'] }}" task="{{ $lastTask['task'] }}"
            status="{{ $lastTask['status'] }}" priority="{{ $lastTask['priority'] }}"
            assigned="{{ $lastTask['assigned'] }}" />
    @endif

@endsection
