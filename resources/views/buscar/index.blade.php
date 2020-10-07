@extends('layouts.app')

@section('navegacion')
    @include('ui.categoriasNav')
@endsection

@section('content')

    @if (count($vacantes) > 0)
        @include('ui.listadoVacantes')
    @else
        <p class="text-center text-gray-700 mt-4 font-bold">No hay vacantes para mostrar</p>
    @endif

@endsection
