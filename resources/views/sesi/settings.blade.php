@extends('layout.aplikasi')

@section('title', 'Settings')

@section('content')
<div class="container mr-10 bg-white p-20 mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-5">Settings</h2>
    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('settings.update') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <input type="text" id="name" name="name" class="border rounded w-full py-2 px-3" value="{{ old('name', $user->name) }}">
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" class="border rounded w-full py-2 px-3" value="{{ old('email', $user->email) }}">
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password (leave blank to keep current password)</label>
            <input type="password" id="password" name="password" class="border rounded w-full py-2 px-3">
            @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection