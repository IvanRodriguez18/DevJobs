@extends('layouts.app')

@section('navegacion')
    @include('ui.navegacion ')
@endsection

@section('content')
<h1 class="text-center text-2xl text-gray-600 mt-5">Notificaciones</h1>

@if (count($notificaciones) > 0)
<div class="flex justify-between flex-wrap">
    @foreach ($notificaciones as $notificacion)
        @php
            $data = $notificacion->data
        @endphp
        <div class="bg-white p-5 mt-4 rounded shadow-md">
            <h3 class="text-center text-gray-600 mb-3">Un candidato se ha postulado para la vacante</h3>
            <span class=" block text-sm text-gray-700 text-center font-bold mb-3">{{ $data['vacante'] }}</span>
            <span class=" block text-sm text-gray-700 text-center font-bold mb-3">Postulado: {{ $notificacion->created_at->diffForHumans() }}</span>
            <a href="{{ route('candidatos.index', ['id' => $data['id_vacante']]) }}" class="text-sm text-gray-600 block text-center font-bold mb-4">Ver Candidato</a>
        </div>
    @endforeach
</div>
@else
    <div class="mx-auto mt-4 p-5 rounded w-4/6 bg-yellow-200 text-yellow-600 text-lg text-center">Aún no hay notificaciones para mostrar</div>
@endif

@endsection
