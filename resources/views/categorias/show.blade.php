@extends('layouts.app')

@section('navegacion')
    @include('ui.categoriasNav')
@endsection

@section('content')
    <h1 class="text-center my-4 text-gray-600 text-lg">Categoria: <span class="font-bold">{{$categoria->categoria}}</span></h1>
    @include('ui.listadoVacantes')
@endsection
