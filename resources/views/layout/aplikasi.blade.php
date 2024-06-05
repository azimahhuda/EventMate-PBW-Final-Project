<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('img/titlelogo.png') }}">
    @vite('resources/css/app.css')
    <title>EventMate - @yield('title')</title>
    <style>
        .hidden { display: none; }
        .block { display: block; }
    </style>
</head>
<body class="font-body">
    <main class="min-h-screen w-full bg-gray-100 text-gray-700" x-data="layout">
        <header class="flex w-full h-24 items-center justify-between border-b-2 border-gray-200 bg-white p-2">
                <div class="flex items-center flex-shrink-0 text-white mr-6 ml-10">
                    <a id="navlogo" href="/index">
                        <img src="{{ asset('img/NavLogo.png') }}" class="fill-current h-12 mr-2">
                    </a>
                </div>
    
                <div class="flex justify-center mr-10">
                    <div class="relative">
                        <div>
                            <button type="button" class="flex items-center gap-x-1.5 rounded-md bg-white text-2xl font-normal text-gray-900 shadow-sm hover:bg-gray-50 mr-5" id="menu-button" aria-expanded="false" aria-haspopup="true">+</button>
                        </div>
                      
                        <div id="dropdown-menu" class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-blue-100" role="menuitem" tabindex="-1" id="menu-item-0">Join Event</a>
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-blue-100" role="menuitem" tabindex="-1" id="menu-item-1">Create Event</a>
                            </div>
                        </div>
                    </div>
                    <div class="text-lg font-semibold">
                        {{ Auth::user()->name }}
                    </div>
                </div>
        </header>

        <div class="flex">
            <!-- sidebar -->
            <aside class="flex w-72 flex-col border-r-2 border-gray-200 bg-white p-3" style="height: 90.5vh" x-show="asideOpen">
                <a href="#" class="flex items-center rounded-md py-2 px-12 hover:bg-blue-100">
                    <span class="text-2xl"><i class="bx bx-home"></i></span>
                    <span class="font-semibold ml-2">Home</span>
                </a>

                <a href="#" class="flex items-center rounded-md px-12 py-2 hover:bg-blue-100 mt-0">
                    <span class="text-2xl"><svg xmlns="http://www.w3.org/2000/svg" fill="black" class="bi bi-gear w-6 h-6" viewBox="0 0 17 16">
                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
                      </svg></span>
                    <span class="font-semibold ml-2">Settings</span>
                </a>

                <button class="flex px-10 py-2 rounded-full -ml-12 mt-96">
                    <a href="/index" class="flex ml-16">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-left m-2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                        </svg>
                        <p class="mt-1 ml-1 font-semibold text-base">Logout</p>
                    </a>
                </button>
                <p class="ml-8 mt-6 text-base text-gray-400">Copyright EventMate</p>
        
            </aside>

            <!-- main content -->
            <div class="w-full p-4">
                @yield('content')
            </div>
        </div>
    </main>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("layout", () => ({
                profileOpen: false,
                asideOpen: true,
            }));
        });
    </script>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    <script>
        document.getElementById('menu-button').addEventListener('click', function() {
            var dropdownMenu = document.getElementById('dropdown-menu');
            var isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function(event) {
            var button = document.getElementById('menu-button');
            var dropdownMenu = document.getElementById('dropdown-menu');
            var isClickInsideButton = button.contains(event.target);
            var isClickInsideMenu = dropdownMenu.contains(event.target);

            if (!isClickInsideButton && !isClickInsideMenu) {
                dropdownMenu.classList.add('hidden');
                button.setAttribute('aria-expanded', 'false');
            }
        });
    </script>
</body>
</html>
