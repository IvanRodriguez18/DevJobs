@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous"/>
@endsection

@section('navegacion')
    @include('ui.categoriasNav')
@endsection

@section('content')
    <h1 class="text-center text-2xl text-gray-600 mt-5">{{ $vacante->vacante }}</h1>
    <div class="mt-5 mb-5 md:flex items-start">
        <div class="md:w-3/5">
            <a href="/storage/vacantes/{{ $vacante->imagen }}" data-lightbox="imagen" data-title="Vacante: {{ $vacante->vacante }}">
                <img src="/storage/vacantes/{{ $vacante->imagen }}" class="mb-5 rounded w-64 mt-5 cursor-pointer" alt="{{ $vacante->vacante }}">
            </a>
            <p class="block text-gray-700 font-bold mb-5"><i class="fas fa-clock"></i> Publicado: <span class="font-normal">{{ $vacante->created_at->diffForHumans() }}</span></p>
            <p class="block text-gray-700 font-bold mb-5"><i class="fas fa-laptop-code"></i> Categoria: <span class="font-normal">{{ $vacante->categoria->categoria }}</span></p>
            <p class="block text-gray-700 font-bold mb-5"><i class="fas fa-running"></i> Experiencia: <spant class="font-normal">{{ $vacante->experiencia->experiencia }}</spant></p>
            <p class="block text-gray-700 font-bold mb-5"><i class="fas fa-money-bill-alt"></i> Rango Salarial: <span class="font-normal">{{ $vacante->salario->salario }}</span></p>
            <p class="block text-gray-700 font-bold mb-5"><i class="fas fa-map-marker-alt"></i> Ubicación: <span class="font-normal">{{ $vacante->ubicacion->ubicacion }}</span></p>
            <p class="block text-gray-700 font-bold mb-5"><i class="fas fa-user-tag"></i> Reclutador: <span class="font-normal">{{ $vacante->reclutador->name }}</span></p>
            <h2 class="text-gray-700 font-bold text-md mt-5">Habilidades Técnicas</h2>
            @php
                $arraySkills = explode(',', $vacante->skill);
            @endphp
            @foreach ($arraySkills as $skill)
                <p class="inline-block rounded-full border border-gray-500 py-2 px-8 text-gray-700 font-bold mt-5">
                    {{ $skill }}
                </p>
            @endforeach
            <h2 class="text-gray-700 font-bold text-md mt-5">Descripción del puesto</h2>
            <div class="descripcion mt-5">
                {!! $vacante->descripcion !!}
            </div>
        </div>
        <aside class="md:w-2/5 border border-gray-500 rounded px-3">
            <h2 class="text-center text-gray-700 font-bold mt-4 uppercase">Contacta al Reclutador</h2>
            <form action="{{ route('candidatos.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Nombre Completo</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" name="nombre" id="nombre" placeholder="Nombre Completo" value="{{ old('nombre') }}">
                    @error('nombre')
                        <span class="text-xs text-red-700 p-2 w-full mt-5 text-left" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Correo Electrónico</label>
                    <input type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" name="email" id="email" placeholder="Correo Electrónico" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-xs text-red-700 p-2 w-full mt-5 text-left" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="cv" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Adjunta CV</label>
                    <input type="file" class="focus:outline-none w-full" name="cv" id="cv" accept="application/pdf">
                    @error('cv')
                        <span class="text-xs text-red-700 p-2 w-full mt-5 text-left" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <input type="hidden" name="vacante_id" value="{{ $vacante->id }}">
                <div class="flex justify-center mt-4 mb-3">
                    <button type="submit" class="bg-teal-500 text-gray-200 text-center rounded-full py-2 px-6 hover:text-white focus:outline-none">Enviar <i class="fas fa-paper-plane"></i></button>
                </div>
            </form>
        </aside>
    </div>
@endsection
