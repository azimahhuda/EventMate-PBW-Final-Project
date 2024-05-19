<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>EventMate</title>
</head>
<body class="font-body">
    <header>
        <nav class="flex items-center justify-between flex-wrap bg-[#D0E1F5] p-6 font-body">
            <div class="flex items-center flex-shrink-0 text-white mr-6 ml-20">
                <a href="#">
                    <img src="{{ asset('img/NavLogo.png') }}" class="fill-current h-12 mr-2">
                </a>
            </div>

            <div class="w-full block lg:flex lg:items-center lg:w-auto mr-20">
              <div class="text-lg font-semibold lg:flex-grow text-black justify-end">
                <a href="#" class="block mt-4 lg:inline-block lg:mt-0 hover:text-customBlue mr-8">About</a>
                <a href="#" class="block mt-4 lg:inline-block lg:mt-0 hover:text-customBlue mr-8">FAQ</a>
                <a href="#" class="block mt-4 lg:inline-block lg:mt-0 hover:text-customBlue mr-10">Contact</a>
              </div>
              
              <div>
                <a href="#" class="bg-customBlue font-semibold inline-block text-lg px-6 py-3 leading-none rounded-md text-white hover:bg-[#B5179E] mt-4 lg:mt-0">Sign In</a>
              </div>
            </div>
          </nav>
    </header>

    <div id="welcome" class="flex item-center justify-center gap-20">
        <div class="mt-20">
            <img src="{{ asset('img/img1lp.png') }}">
        </div>
        <div class="mt-48">
            <h1 class="text-6xl font-semibold">Welcome To</br>EventMate</h1>
            <h3 class="text-3xl mt-5">Schedule, register, and enjoy</br>the moment!</h3>
        </div>
    </div>

    <div id="about" class="flex item-center justify-center gap-16 mt-40">
        <div class="ml-48 mt-20">
            <h3 class="text-4xl font-bold mb-5">About</h3>
            <p class="text-xl">EventMate is dedicated to supporting community events.</br>
                With a focus on the comfort and needs of communities,</br>
                EventMate simplifies event coordinators tasks in</br>
                scheduling, managing participant registrations, and</br>
                disseminating important information to community</br>
                members. With EventMate, every community event will</br>
                be more organized, smooth, and satisfying!
            </p>
        </div>
        <div>
            <img src="{{ asset('img/img2lp.png') }}">
        </div>
    </div>
</body>
</html>