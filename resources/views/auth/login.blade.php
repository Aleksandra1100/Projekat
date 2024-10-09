@extends('layouts.app')

@section('content')
<div class="bg-gray-800 text-gray-300 h-screen flex items-center justify-center">
<div class="bg-gray-700 max-w-md mx-auto p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-white mb-6">Login</h2>
        <form method="POST" action="/login">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-200">Email</label>
                <input id="email" type="email" name="email" class="w-full bg-gray-600 text-gray-200 p-3 rounded-md border border-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter your email" required autofocus>
                <!-- Error message for email -->
                <p class="text-red-500 text-sm mt-2"> <!-- Display email error here --> </p>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-200">Password</label>
                <input id="password" type="password" name="password" class="w-full bg-gray-600 text-gray-200 p-3 rounded-md border border-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter your password" required>
                <!-- Error message for password -->
                <p class="text-red-500 text-sm mt-2"> <!-- Display password error here --> </p>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <input id="remember_me" type="checkbox" name="remember" class="text-indigo-600">
                <label for="remember_me" class="ml-2 text-sm text-gray-400">Remember me</label>
            </div>

            <!-- Submit button -->
            <div class="flex items-center justify-between">
                <a class="text-sm text-gray-100 mr-6 hover:underline" href="/password/reset">
                    Forgot your password?
                </a>
                <button type="submit" class="bg-green-600 text-white  p-4 rounded-md font-semibold hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Log in
                </button>
            </div>
        </form>
    </div>
    </div>
@endsection