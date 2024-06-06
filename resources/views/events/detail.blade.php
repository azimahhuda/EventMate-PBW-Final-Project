@extends('layout/aplikasi')

@section('title', 'Dashboard')

@section('content')
    <div class="h-4/5 mt-2 overflow-y-auto">
        <div class="bg-white rounded-lg shadow-xl p-8">
            <div  class="mb-4 bg-[#403ED2] h-32 rounded-t-2xl rounded-br-full flex flex-column shadow-xl">
                <div class="ml-4 mt-3">
                    <a href="/dashboard">
                        <img src="{{ asset('img/icon-leftarrow.png') }}" class="h-5 item-center mr-1">
                    </a>
                </div>
                <div class="flex items-end py-5 px-2">
                    <h1 class="text-4xl text-white font-bold flex">{{ $event->event_name }}</h1>
                @foreach ($event->participants as $participant)
                    @if ($participant->attendance)
                        <p class="text-transparent ml-4 mb-1">You're Present</p>
                    @else
                    <form action="{{ route('events.updateAttendance', ['event' => $event->id, 'participant' => $participant->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="ml-4 bg-white font-semibold text-sm px-4 py-2 rounded-full hover:bg-gray-300">Mark as Present</button>
                    </form>
                    @endif
                @endforeach
                </div>
            </div>
            <div class="flex justify-between">
                <div class="ml-6">
                    @foreach ($event->participants as $participant)
                    @if ($participant->attendance)
                        <p class="mb-4 text-green-500">You're Present</p>
                    @else
                    @endif
                    @endforeach
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
                </div>
                <div class="w-2/5 mr-16 max-h-96 overflow-y-auto">
                    <p class="text-gray-700 mb-10"><span class="font-bold mr-2">Description: </br></span> {!! nl2br(e($event->description)) !!}</p>
                </div>
            </div>
            @foreach ($event->participants as $participant)
                @if(!$participant->feedback)
                    <div class="mt-2">
                        <form action="{{ route('events.submitFeedback', ['event' => $event->id, 'participant' => $participant->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            <textarea name="feedback" rows="3" class="rounded-xl shadow-lg bg-slate-200 w-full p-2 placeholder:p-4 mt-10" placeholder="Write your feedback..."></textarea>
                            <div class="flex align-right item-right">
                                <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded ml-auto hover:bg-blue-700 text-sm">Send Feedback</button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="mt-2 bg-gray-200 p-2 rounded-lg p-4">
                        <strong class="mr-2">Your Feedback:</strong> {{ $participant->feedback }}
                    </div>
                @endif
            @endforeach
            </ul>
        </div>
    </div>
@endsection
