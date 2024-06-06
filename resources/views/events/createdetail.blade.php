@extends('layout/aplikasi')

@section('title', 'Dashboard')

@section('content')
    <div class="h-4/5 mt-2 overflow-y-auto">
        <div class="bg-white rounded-lg p-8">
            <div class="mb-4 bg-[#403ED2] h-32 rounded-t-2xl rounded-br-full flex flex-column shadow-xl relative">
                <div class="ml-4 mt-3">
                    <a href="/dashboard">
                        <img src="{{ asset('img/icon-leftarrow.png') }}" class="h-5 item-center mr-1">
                    </a>
                </div>
                <div class="flex items-end py-5 px-2 w-full">
                    <h1 class="text-4xl text-white font-bold flex">{{ $event->event_name }}</h1>
                </div>
                <div class="absolute top-2 right-2">
                    <img src="{{ asset('img/icon-threedots.png') }}" class="h-5 item-center mr-4 mt-2 cursor-pointer" id="event-menu-button" aria-expanded="false" aria-haspopup="true">
                    
                    <div id="event-dropdown-menu" class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="event-menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <a href="{{ route('events.edit', $event->id) }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-blue-100" role="menuitem" tabindex="-1">Edit Event</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirmDelete()" class="text-gray-700 block text-sm hover:bg-blue-100" role="menuitem" tabindex="-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-700 block px-4 py-2 text-sm hover:bg-blue-100">Delete Event</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between">
                <div class="ml-6">
                    <p class="text-gray-700 mb-4"><span class="font-bold mr-2">Event's Code: </span> {{ $event->event_code }}</p>
                    <p class="text-gray-700 mb-4"><span class="font-bold mr-2">Date: </span> {{ $event->date }}</p>
                    <p class="text-gray-700 mb-4"><span class="font-bold mr-2">Time: </span> {{ $event->time }}</p>
                    <div class="flex">
                        <p class="text-gray-700 mb-4"><span class="font-bold mr-2">Location: </span> {{ $event->location }}</p>
                        <div>
                            @if ($event->location_link)
                            <a href="{{ $event->location_link }}" target="_blank">
                                <img src="{{ asset('img/icon-rightarrow.png') }}" class="h-5 mt-1 ml-2">
                            </a>
                            @endif
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4"><span class="font-bold mr-2">Capacity of Participants: </span> {{ $event->capacity }}</p>
                    <p class="text-gray-700 mb-4"><span class="font-bold mr-2">Dresscode: </span> {{ $event->dresscode }}</p>
                    <div>
                        <p class="text-gray-700 mb-4"><span class="font-bold mr-2">Contact Person: </span><span> {{ $event->cp_name }}: </span> {{ $event->contact_person }}</p>
                    </div>
                    <div class="flex">
                        <p class="text-gray-700 mb-4"><span class="font-bold mr-2">Social Media: </span> {{ $event->socmed_name }}</p>
                        <div>
                            @if ($event->social_media_link)
                            <a href="{{ $event->social_media_link }}" target="_blank">
                                <img src="{{ asset('img/icon-rightarrow.png') }}" class="h-5 mt-1 ml-2">
                            </a>
                            @endif
                        </div>
                    </div>
                    @if ($event->event_hashtag)
                        <p class="text-gray-700 mb-4"><span class="font-bold mr-2">Hashtag: </span> {{ $event->event_hashtag }}</p>
                    @endif
                    <p class="text-gray-700 mb-4"><span class="font-bold mr-2">Attendance: </span> {{ $event->attendance ? 'Allowed' : 'Not Allowed' }}</p>
                </div>
                <div class="w-2/5 mr-16 max-h-96 overflow-y-auto">
                    <p class="text-gray-700 mb-10"><span class="font-bold mr-2">Description: </br></span> {!! nl2br(e($event->description)) !!}</p>
                </div>
            </div>
            <h2 class="text-xl font-semibold mt-8 mb-2">Participants:</h2>
            <div class="flex justify-between items-center mb-4">
            </div>
            <div>
                <div class="flex align-center justify-between items-center mb-4">
                    <form action="{{ route('events.downloadParticipant', $event->id) }}" method="GET">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-xs font-semibold hover:bg-blue-700 text-white py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">Download Data Participant</button>
                    </form>
                </div>
                <table class="w-full participant-table" align="center">
                    <tr class="bg-blue-500 h-10 text-white border-b-4 border-b-white">
                        <th>No. </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Attendance</th>
                        <th>Feedback</th>
                    </tr>
                    @foreach ($event->participants as $index => $participant)
                        <tr class="participant-row border-b-4 border-b-white">
                            <td class="bg-white">{{ $index + 1 }}</td>
                            <td class="bg-blue-100">{{ $participant->name }}</td>
                            <td class="bg-white">{{ $participant->email }}</td>
                            <td class="bg-blue-100">{{ $participant->phone }}</td>
                            <td class="bg-white">{{ $participant->attendance == true ? 'Present' : 'Not Present' }}</td>
                            <td class="bg-blue-100">{{ $participant->feedback }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this event?');
        }
    </script> 

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this event?');
    }

    document.addEventListener('DOMContentLoaded', function () {
        const menuButton = document.getElementById('event-menu-button');
        const dropdownMenu = document.getElementById('event-dropdown-menu');

        menuButton.addEventListener('click', function () {
            const isExpanded = menuButton.getAttribute('aria-expanded') === 'true';
            menuButton.setAttribute('aria-expanded', !isExpanded);
            dropdownMenu.classList.toggle('hidden');
        });

        // Close the dropdown if clicked outside
        document.addEventListener('click', function (event) {
            const isClickInside = menuButton.contains(event.target) || dropdownMenu.contains(event.target);
            if (!isClickInside) {
                menuButton.setAttribute('aria-expanded', 'false');
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>

@endsection
