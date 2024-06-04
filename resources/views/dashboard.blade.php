<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Include Tailwind CSS -->
    @vite('resources/css/app.css')


    <!-- Inline Style for Custom Classes -->
    <style>
        .bg-customBlue {
            background-color: #3182ce;
        }

        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-gray-100 text-center">
    <div class="flex justify-center mt-8">
        <a href="/logout" class="bg-red-500 text-white text-lg px-6 py-3 rounded-md hover:bg-red-600">Logout</a>
    </div>
    <div class="flex justify-center mt-8">
        <a href="/events/create" class="bg-customBlue text-white text-lg px-6 py-3 rounded-md hover:bg-blue-600">Create
            Event</a>
    </div>
    <div class="flex justify-center mt-8">
        <!-- Updated ID to match JavaScript selector -->
        <a id="joinEventBtn" href="#"
            class="bg-customBlue text-white text-lg px-6 py-3 rounded-md hover:bg-blue-600">Join Event</a>
    </div>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">Your Created Events</h2>
        <ul>
            @foreach ($createdEvents as $event)
                <li class="mb-2">{{ $event->event_name }} - {{ $event->date }} - {{ $event->event_code }} <a
                        href="{{ route('events.detail', ['id' => $event->id]) }}"
                        class="text-blue-600 underline italic">Detail
                        Event</a></li>
            @endforeach
        </ul>

        <h2 class="text-2xl font-bold mt-8 mb-4">Events You've Joined</h2>
        <ul>
            @foreach ($joinedEvents as $event)
                <li class="mb-2">{{ $event->event->event_name }} - {{ $event->event->date }} -
                    {{ $event->event->event_code }} <a href="{{ route('events.detail', ['id' => $event->id]) }}"
                        class="text-blue-600 underline italic">Detail
                        Event</a>
                </li>
            @endforeach
        </ul>
    </div>

    <div x-data="{ showModal: false }" id="myModal" class="modal">
        <!-- Modal Content -->
        <div x-show="showModal" class="modal-content">
            <div class="sm:flex sm:items-start">
                <!-- Close button -->
                <button @click="showModal = false" type="button" class="close" aria-label="Close">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
                <!-- Modal Content -->
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Join Event</h3>
                    <div class="mt-2">
                        <form action="{{ route('events.join') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                                <input type="text" id="name" name="name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Your Name">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                                <input type="email" id="email" name="email"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Your Email">
                            </div>
                            <div class="mb-4">
                                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
                                <input type="text" id="phone" name="phone"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Your Phone Number">
                            </div>
                            <div class="mb-4">
                                <label for="event_code" class="block text-gray-700 text-sm font-bold mb-2">Event
                                    Code:</label>
                                <input type="text" id="event_code" name="event_code"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Event Code">
                            </div>
                            <div class="flex items-center justify-between">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Join
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- Modal Footer -->
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    <button @click="showModal = false" type="button"
                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-customBlue text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Close
                    </button>
                </span>
            </div>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("joinEventBtn");

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        modal.querySelector(".close").onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>
