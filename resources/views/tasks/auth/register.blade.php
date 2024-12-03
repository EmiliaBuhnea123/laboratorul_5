@extends('layout.auth')

@section('content')
    <form action={{ route('auth.register.store') }} method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>
        @error('name')
        <div class="text-red-500">*{{ $message }}</div>
    @enderror
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>
        @error('email')
        <div class="text-red-500">*{{ $message }}</div>
    @enderror
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>
        @error('password')
        <div class="text-red-500">*{{ $message }}</div>
    @enderror
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Password Confirmation</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>
        @error('password_confirmation')
        <div class="text-red-500">*{{ $message }}</div>
    @enderror
        <div class="mb-4">
            <button type="submit"
                class="w-full px-3 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700">Register</button>
        </div>
    </form>
@endsection
