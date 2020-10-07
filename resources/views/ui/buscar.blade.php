<h2 class="my-10 text-lg text-gray-700">Busca una vacante</h2>

<form action="{{ route('vacante.buscar') }}" method="POST">
    @csrf
    <div class="w-full">
        <label for="categoria" class="block tracking-wide text-gray-700 text-sm uppercase font-bold mb-2">Categoria Vacante</label>
        <select name="categoria" class="block border border-gray-600 w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:border-gray-500 leading-tight" id="categoria">
            <option disabled selected>---Selecciona---</option>
            @foreach($categorias as $categoria)
                <option {{ old('categoria') == $categoria->id ? 'selected' : '' }} value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
        @error('categoria')
            <span class="text-xs text-red-700 p-2 w-full mt-5 text-left" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="w-full">
        <label for="ubicacion" class="block tracking-wide text-gray-700 text-sm uppercase font-bold mb-2">Ubicación</label>
        <select name="ubicacion" class="block w-full border border-gray-600 bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:border-gray-500 leading-tight" id="ubicacion">
            <option disabled selected>---Selecciona---</option>
            @foreach($ubicaciones as $ubicacion)
                <option {{ old('ubicacion') == $ubicacion->id ? 'selected' : '' }} value="{{ $ubicacion->id }}">{{ $ubicacion->ubicacion }}</option>
            @endforeach
        </select>
        @error('ubicacion')
            <span class="text-xs text-red-700 p-2 w-full mt-5 text-left" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <button type="submit" class="bg-teal-500 w-full hover:bg-teal-600 text-gray-100 font-bold p-3 focus:outline-none mt-3 focus:shadow-outline">
        Buscar Vacantes
    </button>
</form>
