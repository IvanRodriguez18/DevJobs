<ul class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
    @foreach ($vacantes as $vacante)
        <li class="p-10 border border-gray-300 bg-white shadow">
            <h2 class="text-center text-xl font-semibold text-gray-700">{{ $vacante->vacante }}</h2>
            <p class="block text-gray-700 font-normal my-2 text-center text-sm">{{ $vacante->categoria->categoria }}</p>
            <p class="block text-gray-700 font-normal my-2 text-center text-sm">Ubicación: <span class="font-bold">{{ $vacante->ubicacion->ubicacion }}</span></p>
            <p class="block text-gray-700 font-normal my-2 text-center text-sm">Experiencia: <span class="font-bold">{{ $vacante->experiencia->experiencia }}</span></p>
            <a href="{{ route('vacantes.show', ['vacante' => $vacante->id]) }}" class="block my-2 text-sm text-teal-700 text-center font-bold" target="_blank">
                Ir a la vacante
            </a>
        </li>
    @endforeach
</ul>
