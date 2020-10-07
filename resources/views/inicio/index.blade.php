@extends('layouts.app')

@section('navegacion')
    @include('ui.categoriasNav')
@endsection

@section('content')
    <div class="flex flex-col lg:flex-row shadow bg-white mt-4">
        <div class="lg:w-1/2 px-8 lg:px-12 py-12 lg:py-24">
            <p class="text-2xl text-gray-700">
                Dev<span class="font-bold">Jobs</span>
            </p>
            <h1 class="mt-2 sm:mt-4 text-3xl font-bold text-gray-700 leading-tight">
                Encuentra un empleo en tu ciudad o de forma remota
                <span class="text-teal-500 block">Para desarrolladores y Diseñadores web</span>
            </h1>
            @include('ui.buscar')
        </div>
        <div class="block lg:w-1/2">
            <img class="inset-0 h-full w-full object-cover" src="{{ asset('img/background.jpg') }}" alt="devJobs">
        </div>
    </div>
    <div class="my-4 bg-gray-100 p-4 shadow">
        <h1 class="text-2xl text-gray-700 m-0">Nuevas <span class="font-bold">Vacantes</span></h1>
        @include('ui.listadoVacantes')
    </div>
@endsection
