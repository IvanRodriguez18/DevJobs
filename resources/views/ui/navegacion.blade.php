<a href="{{ route('vacantes.index') }}" class="text-white font-bold text-sm p-4 hover:underline {{ Request::is('vacante') ? 'bg-teal-500' : '' }}">Vacantes</a>
<a href="{{ route('vacantes.create') }}" class="text-white font-bold text-sm p-4 hover:underline {{ Request::is('vacante/create') ? 'bg-teal-500' : '' }}">Nueva Vacante</a>
<a href="http://" class="text-white font-bold text-sm p-4 hover:underline">Categoria 3</a>
<a href="http://" class="text-white font-bold text-sm p-4 hover:underline">Categoria 4</a>