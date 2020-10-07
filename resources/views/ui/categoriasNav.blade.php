@foreach ($categorias as $categoria)
    <a href="{{ route('categorias.show', ['categoria' => $categoria->id]) }}" class="text-white text-sm font-bold p-4">{{$categoria->categoria}}</a>
@endforeach
