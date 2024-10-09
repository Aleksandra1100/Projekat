@extends('layouts.app')

@section('content')
<div class="bg-gray-800 text-gray-300 h-screen flex items-center justify-center">

    <div class="bg-gray-700 max-w-xl mx-auto p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-white mb-6">Register</h2>

        <!-- Form start -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm text-gray-400">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" class="w-full bg-gray-600 text-gray-200 p-3 rounded-md border border-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500" required autofocus>
                @error('name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-400">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" class="w-full bg-gray-600 text-gray-200 p-3 rounded-md border border-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-400">Password</label>
                <input id="password" type="password" name="password" class="w-full bg-gray-600 text-gray-200 p-3 rounded-md border border-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm text-gray-400">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="w-full bg-gray-600 text-gray-200 p-3 rounded-md border border-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button & Already Registered Link -->
            <div class="flex items-center justify-between">
                <a class="text-sm text-gray-300 mr-8 hover:underline" href="{{ route('login') }}">
                    Already registered?
                </a>

                <button type="submit" class="bg-green-600 text-white p-3 rounded-md font-semibold hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
@endsection