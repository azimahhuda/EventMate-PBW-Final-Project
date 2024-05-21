@extends('layout/aplikasi')

@section('konten')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="flex item-center justify-around mt-16 font-body ml-10 mr-10 items-center">
    <div class="flex flex-row justify-center items-center">
        <div>
            <div>
                <a href="/index">
                    <img src="{{ asset('img/signlogo.png') }}" style="height: 120px">
                </a>
            </div>           
        </div>
        <div class="ml-8">
            <a href="/index"><h1 class="text-4xl text-[#003249] font-bold">EventMate</h1></a>
            <a href="/index"><h3 class="text-3xl">Schedule, register, and</br>enjoy the moment!</h3></a>
        </div>
    </div>
    <div>
        <h1 class="flex justify-center text-3xl font-bold mb-10">Sign Up</h1>
        <form action="/sesi/create" method="post">
            @csrf
            <div>
                <label for="name" class="form-label"></label>
                <input type="name" name="name" class="form-control bg-gray-200 border-none rounded-full w-80 h-12 placeholder:font-normal placeholder:text-gray-400 placeholder:text-lg placeholder:px-4" placeholder="Name">
            </div>
            <div class="-mt-3">
                <label for="phone" class="form-label"></label>
                <input type="phone" name="phone" class="form-control bg-gray-200 border-none rounded-full w-80 h-12 placeholder:font-normal placeholder:text-gray-400 placeholder:text-lg placeholder:px-4" placeholder="Phone">
            </div>
            <div class="-mt-3">
                <label for="email" class="form-label"></label>
                <input type="email" name="email" value="{{ old('email') }}"  class="form-control bg-gray-200 border-none rounded-full w-80 h-12 placeholder:font-normal placeholder:text-gray-400 placeholder:text-lg placeholder:px-4" placeholder="Email">
            </div>
            <div class="-mt-3">
                <label for="password" class="form-label"></label>
                <input type="password" name="password" class="form-control bg-gray-200 border-none rounded-full w-80 h-12 placeholder:font-normal placeholder:text-gray-400 placeholder:text-lg placeholder:px-4" placeholder="Password">
            </div>
            <div class="flex justify-center">
                <button type="submit" name="submit" class="bg-customBlue rounded-full py-2 px-10 text-base text-white font-normal hover:bg-[#B5179E] mt-4">Sign Up</button>
            </div>
            <div class="border border-black mt-8"></div>
            <p class="flex justify-center mt-2">Already have have an account? <span class="ml-1 text-customBlue hover:text-[#B5179E]"> <a href="/sesi">Sign In</a></span></p>
        </form>
    </div>
</div>


@endsection
