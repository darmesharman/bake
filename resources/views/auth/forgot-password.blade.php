@extends('layouts.guest')
    @section('content')
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif


        <form method="POST" action="{{ route('forgotPassword.store') }}">
            @csrf

            <div class="block">
                <x-jet-label for="phone_number" value="{{ __('Phone number') }}" />
                <x-jet-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="btn btn-primary mxa">
                    {{ __('Confirm') }}
                </x-jet-button>
            </div>
        </form>
    @endsection

