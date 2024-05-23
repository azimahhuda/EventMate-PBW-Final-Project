<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>EventMate | Dashboard</title>
</head>
<body>
    <header>
        <nav id="navbar" class="fixed top-0 left-0 w-full p-6 font-body z-50">
            <div class="flex items-center justify-between flex-wrap">
                <div class="flex items-center flex-shrink-0 text-white mr-6 ml-20">
                    <a id="navlogo" href="/index">
                        <img src="{{ asset('img/NavLogo.png') }}" class="fill-current h-12 mr-2">
                    </a>
                </div>

                <div class="mr-10">
                    <a href="/sesi" class="bg-customBlue font-medium inline-block text-lg px-6 py-3 leading-none rounded-md text-white hover:bg-[#B5179E] mt-4 lg:mt-0">Sign Out</a>
                  </div>
            </div>
        </nav>
    </header>
</body>
</html>