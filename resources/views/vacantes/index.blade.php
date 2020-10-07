@extends('layouts.app')

@section('navegacion')
    @include('ui.navegacion')
@endsection

@section('content')
<h1 class="text-center text-2xl text-gray-600 mt-5">Administra tu Vacantes</h1>
@if (count($vacantes) > 0)
<div class="flex flex-col mt-10 mb-4">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
      <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        <table class="min-w-full">
          <thead class="bg-gray-100 ">
            <tr>
              <th class="px-6 py-3 border-b border-gray-200  text-center text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                Titulo Vacante
              </th>
              <th class="px-6 py-3 border-b border-gray-200  text-center text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                Estado
              </th>
              <th class="px-6 py-3 border-b border-gray-200  text-center text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                Candidatos
              </th>
              <th class="px-6 py-3 border-b border-gray-200  text-center text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                  Acciones
              </th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @foreach ($vacantes as $vacante)
            <tr>
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="flex items-center">

                  <div class="ml-4">
                    <div class="text-sm leading-5 font-medium text-gray-900"> {{ $vacante->vacante }} </div>
                    <div class="text-sm leading-5 text-gray-500">Categoria: {{ $vacante->categoria->categoria }}</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-no-wrap text-center border-b border-gray-200">
                <estado-vacante estado="{{ $vacante->estatus }}" vacante-id="{{ $vacante->id }}"></estado-vacante>
              </td>
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                  <a href="{{ route('candidatos.index', ['id' => $vacante->id]) }}" class="text-gray-500 hover:text-gray-600 text-center block">Candidatos: {{ $vacante->candidatos->count() }}</a>
              </td>
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm text-center leading-5 font-medium">
                    <a href="{{ route('vacante.edit', ['vacante' => $vacante->id]) }}" class="text-teal-600 hover:text-teal-900 mr-5">Editar</a>
                    <elimina-vacante vacante-id = "{{ $vacante->id }}" vacante="{{ $vacante->vacante }}"></elimina-vacante>
                    <a href="{{ route('vacantes.show', ['vacante' => $vacante->id]) }}" class="text-blue-600 hover:text-blue-900">Ver</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
<div class="mb-3">
    {{ $vacantes->links() }}
</div>
@else
    <p class="text-center mt-10 text-gray-700 text-sm">No hay vacantes para mostrar</p>
@endif
@endsection
