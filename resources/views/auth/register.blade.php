@extends('layouts.app')

@section('content')
<div class="flex flex-wrap justify-center max-w-screen-md mx-auto">
    <div class="md:w-1/2 md:order-1 order-2">
        <div class="w-full max-w-sm">
            <div class="flex flex-col break-words bg-white border border-2 shadow-md mt-20">
                <div class="bg-gray-300 text-xl text-gray-700 text-center py-3 px-6 mb-0">
                        {{ __('Register') }}
                </div>
                <form method="POST" action="{{ route('register') }}" class="py-10 px-5" novalidate>
                    @csrf
                    <div class="flex flex-wrap mb-6">
                        <label for="name" class="block text-gray-700 text-lg mb-2">{{ __('Name') }}</label>
                        <input id="name" type="text" class="p-2 bg-gray-200 rounded form-input w-full focus:outline-none @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                        @error('name')
                            <span class="bg-red-100 border-l-4 border-red-500 text-sm text-red-700 p-3 w-full mt-5" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="flex flex-wrap mb-6">
                        <label for="email" class="block text-gray-700 text-lg mb-2">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="p-2 bg-gray-200 rounded form-input w-full focus:outline-none @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">    
                        @error('email')
                            <span class="bg-red-100 border-l-4 border-red-500 text-sm text-red-700 p-3 w-full mt-5" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="flex flex-wrap mb-6">
                        <label for="password" class="block text-gray-700 text-lg mb-2">{{ __('Password') }}</label>
                        <input id="password" type="password" class="p-2 bg-gray-200 rounded form-input w-full focus:outline-none @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                        @error('password')
                            <span class="bg-red-100 border-l-4 border-red-500 text-sm text-red-700 p-3 w-full mt-5" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 
                    <div class="flex flex-wrap mb-6">
                        <label for="password-confirm" class="block text-gray-700 text-lg mb-2">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="p-2 bg-gray-200 rounded form-input w-full focus:outline-none" name="password_confirmation" autocomplete="new-password">
                    </div>
                    <div class="flex flex-wrap">
                        <button type="submit" class="bg-teal-500 hover:bg-teal-700 w-full p-3 text-lg text-gray-100 focus:outline-none focus:shadow-outline font-bold">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="md:w-1/2 md:order-2 order-1 text-center flex flex-col justify-center px-10 mt-10">
        <h1 class="text-teal-500 text-2xl">¿Eres Reclutador?</h1>
        <p class="text-xl text-gray-600 mt-5 leading-7">Crea una cuenta gratis y comienza a publicar hasta 10 vacantes</p>
    </div>
</div>
@endsection
