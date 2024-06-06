<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>EventMate | Edit Event</title>
    <link rel="icon" type="image/png" href="{{ asset('img/titlelogo.png') }}">
    @vite('resources/css/app.css')

    <style>
        .title {
            height: 1300px;
        }
    </style>
</head>

<body>
    <div class="flex items-center justify-between font-body">
        <div class="title bg-gradient-to-r from-[#4CC9F0] to-[#3A0CA3] text-white w-2/5">
            <div class="ml-6 mt-10">
                <a href="javascript:history.go(-1)">
                    <img src="{{ asset('img/icon-leftarrow.png') }}" class="h-7 item-center">
                </a>
            </div>
            <h1 class="font-bold text-6xl text-start leading-tight p-20">Edit<br>Event</h1>
        </div>
    
        @if ($errors->any())
            <div class="absolute bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">{{ $errors->first() }}</span>
            </div>
        @endif
    
        <div class="mr-32 mt-20 w-2/5 form-container">
            <form action="{{ route('events.update', $event->id) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="event_name" class="block text-red-500 text-xs font-semibold -mb-1">*</label>
                    <input type="text" id="event_name" name="event_name"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:italic placeholder:text-sm"
                        value="{{ old('event_name', $event->event_name) }}" required>
                </div>
                <div class="mb-4">
                    <label for="date" class="block text-red-500 text-xs font-semibold -mb-1">*</label>
                    <input type="date" id="date" name="date"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:italic placeholder:text-sm"
                        value="{{ old('date', $event->date) }}" required>
                </div>
                <div class="mb-4">
                    <label for="time" class="block text-red-500 text-xs font-semibold -mb-1">*</label>
                    <input type="time" id="time" name="time"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:italic placeholder:text-sm"
                        value="{{ old('time', $event->time) }}" required>
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-red-500 text-xs font-semibold -mb-1">*</label>
                    <input type="text" id="location" name="location"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:italic placeholder:text-sm"
                        value="{{ old('location', $event->location) }}" required>
                </div>
                <div class="mb-4">
                    <label for="location_link" class="block text-red-500 text-xs font-semibold -mb-1"></label>
                    <input type="url" id="location_link" name="location_link"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:italic placeholder:text-sm"
                        value="{{ old('location_link', $event->location_link) }}" placeholder="Location Link">
                </div>
                <div class="mb-4">
                    <label for="capacity" class="block text-red-500 text-xs font-semibold -mb-1">*</label>
                    <input type="number" id="capacity" name="capacity"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:italic placeholder:text-sm"
                        value="{{ old('capacity', $event->capacity) }}" required>
                </div>
                <div class="mb-4">
                    <label for="dresscode" class="block text-red-500 text-xs font-semibold -mb-1">*</label>
                    <input type="text" id="dresscode" name="dresscode"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:italic placeholder:text-sm"
                        value="{{ old('dresscode', $event->dresscode) }}" required>
                </div>
                <div class="mb-4">
                    <label for="cp_name" class="block text-red-500 text-xs font-semibold -mb-1">*</label>
                    <input type="text" id="cp_name" name="cp_name"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:italic placeholder:text-sm"
                        value="{{ old('cp_name', $event->cp_name) }}" required>
                </div>
                <div class="mb-4">
                    <label for="contact_person" class="block text-red-500 text-xs font-semibold -mb-1">*</label>
                    <input type="text" id="contact_person" name="contact_person"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:italic placeholder:text-sm"
                        value="{{ old('contact_person', $event->contact_person) }}" required>
                </div>
                <div class="mb-4">
                    <label for="socmed_name" class="block text-red-500 text-xs font-semibold -mb-1">*</label>
                    <input type="text" id="socmed_name" name="socmed_name"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:italic placeholder:text-sm"
                        value="{{ old('socmed_name', $event->socmed_name) }}" required>
                </div>
                <div class="mb-4">
                    <label for="social_media_link" class="block text-red-500 text-xs font-semibold -mb-1"></label>
                    <input type="url" id="social_media_link" name="social_media_link"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:italic placeholder:text-sm"
                        value="{{ old('social_media_link', $event->social_media_link) }}" placeholder="Social Media Link">
                </div>
                <div class="mb-4">
                    <label for="event_hashtag" class="block text-red-500 text-xs font-semibold -mb-1"></label>
                    <input type="text" id="event_hashtag" name="event_hashtag"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:italic placeholder:text-sm"
                        value="{{ old('event_hashtag', $event->event_hashtag) }}" placeholder="Event Hashtag">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2"></label>
                    <textarea name="description" id="description"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:font-normal placeholder:text-gray-400 placeholder:text-lg px-4"
                        placeholder="Note / Event's Description">{{ old('description', $event->description) }}</textarea>
                    @error('description')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-10 mb-5">
                    <label for="attendance" class="block text-gray-700 text-base mb-2 flex items-center">
                        <input type="checkbox" id="attendance" name="attendance" value="1"
                            {{ old('attendance') ? 'checked' : '' }} class="form-checkbox h-5 w-5 text-blue-600">
                        <span class="ml-2">Allow Attendance</span>
                    </label>
                    @error('attendance')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
    
                <button type="submit"
                    class="mt-6 mb-20 bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">
                    Edit Event
                </button>
            </form>
        </div>
    </div>
</body>
                