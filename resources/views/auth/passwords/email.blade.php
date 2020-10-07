@extends('layouts.app')

@section('content')
<div class="flex flex-wrap justify-center">
    <div class="w-full max-w-sm">
        <div class="flex flex-col break-words bg-white border border-2 shadow-md mt-12">
            <div class="bg-gray-300 text-xl text-gray-700 text-center py-3 px-6 mb-0">{{ __('Reset Password') }}</div>
            <form method="POST" action="{{ route('password.email') }}" class="py-10 px-5" novalidate>
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
                <div class="flex flex-wrap">
                    <button type="submit" class="bg-teal-500 hover:bg-teal-700 w-full p-3 text-sm text-gray-100 focus:outline-none focus:shadow-outline">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
                @if(session('status'))
                    <div class="flex flex-wrap my-2">
                        <span class="bg-green-300 border-l-4 border-green-500 text-sm text-green-700 p-3 w-full">
                            <strong>{{ session('status') }}</strong>
                        </span>
                    </div>
                @endif  
            </form>
        </div>
    </div>
</div>
@endsection
