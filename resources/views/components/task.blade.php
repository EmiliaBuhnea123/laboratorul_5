   @props([
   'title' => 'Titlu implicit',
   'description' => 'Descriere implicită',
   'created' => now()->toDateString(),
   'updated' => now()->toDateString(),
   'task' => 'Edit / Delete',
   'status' => 'Nu este finalizată',
   'priority' => 'ridicata',
   'assigned' => 'Emilia'
])

<div class="bg-white rounded-lg p-5 my-5 shadow-md text-slate-600">
        <h2 class="text-2xl">{{ $title }}</h2>
        <p class="text-base my-1.5 mx-auto">{{ $description }}</p>
        <p class="text-base my-1.5 mx-auto">{{ $created }}</p>
        <p class="text-base my-1.5 mx-auto">{{ $updated }}</p>
        <div>
            <a href="#" class="list-none font-bold hover:text-cyan-600 transition-colors duration-200">{{ $task }}</a>
        </div>
        <p class="text-base my-1.5 mx-auto">{{ $status }}</p>
        <x-priority />
        <span class="inline mt-2.5 text-base font-bold">{{ $assigned }}</span>
</div>




