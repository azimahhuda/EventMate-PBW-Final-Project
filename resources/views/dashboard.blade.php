@extends('layout/aplikasi')

@section('title', 'Dashboard')

@section('content')
<div class="container flex gap-24 ml-8">
    @if ($createdEvents->isEmpty() && $joinedEvents->isEmpty())
    <div class="w-full mt-40 p-4 flex justify-center items-center">
        <div>
            <div>
                <img src="{{ asset('img/usernewpict.png') }}" class="h-48 item-center mr-1">
            </div>
            <p class="font-semibold flex justify-center items-center text-center -mt-2">Add Your Event!</p>
        </div>
        <div class="ml-4 flex flex-col items-center text-center">
            <a id="joinEventBtnDashboard" href="#" class="bg-customBlue hover:bg-[#B5179E] font-semibold text-base text-white py-2 w-32 rounded-xl mb-3" role="menuitem" tabindex="-1">Join Event</a>
            <a href="/events/create" class="bg-customBlue hover:bg-[#B5179E] font-semibold text-base text-white py-2 w-32 rounded-xl"> Create Event</a>
        </div>
    </div>
    @else
        <div class="w-2/5">
            <h2 class="text-xl font-bold mb-4">Your Created Events</h2>
            <ul class="event-list">
                @foreach ($createdEvents as $index => $event)
                <li class="flex flex-column mb-2 event-item rounded-lg cursor-pointer mb-4 {{ ($index % 2 === 0) ? 'bg-gradient-to-r from-[#4794EE] to-[#4039D1] text-white' : 'bg-gradient-to-r from-[#B5179E] to-[#560BAD] text-white' }}">
                    <a href="{{ route('events.createdetail', ['id' => $event->id]) }}" class="p-3">
                        <p class="text-3xl font-semibold p-2 ml-1">{{ $event->event_name }}</p>
                        <p class="ml-3 mt-4 flex flex-row item-center font-semibold">
                            <span><img src="{{ asset('img/icon-calendar.png') }}" class="h-5 item-center mr-1"></span>{{ $event->date }}
                        </p>
                        <p class="ml-3 flex flex-row item-center font-semibold">
                            <span><img src="{{ asset('img/icon-location.png') }}" class="h-5 item-center mr-1"></span>{{ $event->location }}
                        </p>
                        <p class="ml-3 flex flex-row item-center font-semibold">
                            <span><img src="{{ asset('img/icon-code.png') }}" class="h-5 item-center mr-1"></span>{{ $event->event_code }}
                        </p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="w-2/5">
            <h2 class="text-xl font-bold mb-4">Event You've Joined</h2>
            <ul class="event-list">
                @foreach ($joinedEvents as $index => $event)
                <li class="flex flex-column mb-2 event-item rounded-lg cursor-pointer mb-4 {{ ($index % 2 === 0) ? 'bg-gradient-to-r from-[#4794EE] to-[#4039D1] text-white' : 'bg-gradient-to-r from-[#B5179E] to-[#560BAD] text-white' }}">
                    <a href="{{ route('events.detail', ['id' => $event->id]) }}" class="p-3">
                        <p class="text-3xl font-semibold p-2 ml-1">{{ $event->event->event_name }}</p>
                        <p class="ml-3 mt-4 flex flex-row item-center font-semibold">
                            <span><img src="{{ asset('img/icon-calendar.png') }}" class="h-5 item-center mr-1"></span>{{ $event->event->date }}
                        </p>
                        <p class="ml-3 flex flex-row item-center font-semibold">
                            <span><img src="{{ asset('img/icon-location.png') }}" class="h-5 item-center mr-1"></span>{{ $event->event->location }}
                        </p>
                        <p class="ml-3 flex flex-row item-center font-semibold">
                            <span><img src="{{ asset('img/icon-code.png') }}" class="h-5 item-center mr-1"></span>{{ $event->event->event_code }}
                        </p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("joinEventBtn");
    var btnDashboard = document.getElementById("joinEventBtnDashboard");

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }
    // Open modal from dashboard
    btnDashboard.onclick = function() {
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
});
</script>
@endsection
