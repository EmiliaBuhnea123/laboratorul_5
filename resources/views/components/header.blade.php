<div>
    <nav class=" bg-slate-600 text-white p-2.5">

        <ul class="list-none p-0 flex space-x-16">
            @cannot('view-all-profiles')
            <li><a href="{{ route('home') }}" class="text-white no-underline hover:underline">Acasă</a></li>
            <li><a href="{{ route('about') }}" class="text-white no-underline hover:underline">Despre noi</a></li>
            @endcannot
            
            <li><a href="{{ route('tasks.create') }}" class="text-white no-underline hover:underline">Adaugă Sarcină</a>
            </li>
            <li><a href="{{ route('tasks.index') }}" class="text-white no-underline hover:underline">Lista Sarcini</a>
            </li>

            @can('view-all-profiles')
                <li><a href="{{ route('admin.profiles') }}" class="text-white no-underline hover:underline">Toate
                        Profilurile</a></li>
            @endcan

            @cannot('view-all-profiles')
                <a href="{{ route('tasks.profile.show', ['id' => auth()->user()->id]) }}"
                    class="text-white no-underline hover:underline">Profilul meu</a>
                @endcannot

                <form action="{{ route('auth.logout') }}" method="POST">

                    @csrf
                    @method('delete')
                    <button type="submit">Logout</button>
                </form>
        </ul>
    </nav>
</div>
