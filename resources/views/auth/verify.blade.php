@extends('layouts.app')

@section('content')
<div class="mt-10 text-center bg-white p-8 w-full max-w-xl m-auto shadow-md rounded-md">
    <div class="text-2xl text-gray-600 mb-6">{{ __('Verify Your Email Address') }}</div>
    @if (session('resent'))
        <div class="alert alert-success">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif
    <p class="text-sm text-gray-600 mb-5">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
    <p class="text-sm text-gray-600 mb-5">{{ __('If you did not receive the email') }}</p>
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="bg-teal-500 hover:bg-teal-700 w-full p-3 text-lg text-gray-100 focus:outline-none focus:shadow-outline">{{ __('click here to request another') }}</button>
    </form>
</div>
@endsection
