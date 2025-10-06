<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <h1 class="text-xl font-bold">VYRE</h1>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="Name" />
                <x-input id="name" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="email" value="Email" />
                <x-input id="email" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-label for="phone" value="Phone" />
                <x-input id="phone" type="text" name="phone" :value="old('phone')" required />
            </div>

            <div class="mt-4">
                <x-label for="address" value="Address" />
                <x-input id="address" type="text" name="address" :value="old('address')" required />
            </div>

            <div class="mt-4">
                <x-label for="password" value="Password" />
                <x-input id="password" type="password" name="password" required />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="Confirm Password" />
                <x-input id="password_confirmation" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('login') }}" class="underline text-sm text-gray-600">Already registered?</a>
                <x-button class="ml-4">Register</x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
