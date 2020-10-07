@extends('layouts.app')

@section('navegacion')
    @include('ui.navegacion')
@endsection

@section('content')
    <h1 class="text-center text-2xl text-gray-600 mt-4">Candidatos: {{ $vacante->vacante }}</h1>
    @if (count($vacante->candidatos) > 0)
        <ul class="max-w-md mx-auto mt-5">
            @foreach ($vacante->candidatos as $candidato)
                <li class="p-5 rounde border border-gray-400 mb-4">
                    <p class="mb-4 text-sm text-gray-700 font-bold text-center">Nombre del Candidato: <span class="text-sm text-gray-600">{{ $candidato->nombre }}</span></p>
                    <p class="mb-4 text-sm text-gray-700 font-bold text-center">Email: <span class="text-sm text-gray-600">{{ $candidato->email }}</span></p>
                    <a href="/storage/cv/{{ $candidato->cv }}" target="_blank" class="text-sm text-gray-700 block text-center font-bold">Ver Curriculum</a>
                </li>
            @endforeach
        </ul>
    @else
    <div class="mx-auto mt-4 p-5 rounded w-4/6 bg-yellow-200 text-yellow-600 text-lg text-center">Aún no hay candidatos para mostrar</div>
    @endif
@endsection
