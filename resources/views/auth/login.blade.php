@extends('layouts.app')

@section('content')
<div class="flex flex-wrap justify-center">
    <div class="w-full max-w-sm">
        <div class="flex flex-col break-words bg-white border border-2 shadow-md mt-20">
            <div class="bg-gray-300 text-xl text-gray-700 text-center py-3 px-6 mb-0">
                {{ __('Login') }}
            </div>
            <form method="POST" action="{{ route('login') }}" class="py-10 px-5" novalidate>
                @csrf

                <div class="flex flex-wrap mb-6">
                    <label for="email" class="block text-gray-700 text-lg mb-2">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="p-2 bg-gray-200 rounded form-input w-full focus:outline-none @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                        @error('email')
                            <span class="bg-red-100 border-l-4 border-red-500 text-sm text-red-700 p-3 w-full mt-5">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="flex flex-wrap mb-6">
                    <label for="password" class="block text-gray-700 text-lg mb-2">{{ __('Password') }}</label>
                    <input id="password" type="password" class="py-2 bg-gray-200 rounded form-input w-full focus:outline-none @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                        @error('password')
                            <span class="bg-red-100 border-l-4 border-red-500 text-sm text-red-700 p-3 w-full mt-5" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="flex flex-wrap mb-6">
                    <label class="block text-gray-700 text-lg mb-2" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                    <input class="ml-3" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                </div>

                <div class="flex flex-wrap">
                    <button type="submit" class="bg-teal-500 hover:bg-teal-700 w-full p-3 text-lg text-gray-100 focus:outline-none focus:shadow-outline font-bold mb-3">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="text-gray-500 text-sm w-full text-center hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
