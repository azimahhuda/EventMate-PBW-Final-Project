<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>EventMate | Create Event</title>
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
            <h1 class="font-bold text-6xl text-start leading-tight p-16 ml-10">Create<br>Your<br>Event</h1>
        </div>
    
        @if ($errors->any())
            <div class="absolute bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">{{ $errors->first() }}</span>
            </div>
        @endif
    
        <div class="mr-32 mt-20 w-2/5 form-container">
            <form action="{{ route('events.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="event_name" class="block text-red-500 text-xs font-semibold -mb-1">*</label>
                    <input type="text" id="event_name" name="event_name"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:font-normal placeholder:text-gray-400 placeholder:text-lg px-4"
                        placeholder="Event Name" value="{{ old('event_name') }}">
                    @error('event_name')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="date" class="block text-red-500 text-sm font-bold -mb-1">*</label>
                    <input type="date" id="date" name="date"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:font-normal placeholder:text-gray-400 placeholder:text-lg px-4"
                        value="{{ old('date') }}">
                    @error('date')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="time" class="block text-red-500 text-xs font-bold -mb-1">*</label>
                    <input type="time" id="time" name="time"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:font-normal placeholder:text-gray-400 placeholder:text-lg px-4"
                        value="{{ old('time') }}">
                    @error('time')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-red-500 text-xs font-bold -mb-1">*</label>
                    <input type="text" id="location" name="location"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:font-normal placeholder:text-gray-400 placeholder:text-lg px-4"
                        placeholder="Location" value="{{ old('location') }}">
                    @error('location')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="location_link" class="block text-gray-700 text-xs font-bold mb-2"></label>
                    <input type="url" id="location_link" name="location_link"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:font-normal placeholder:text-gray-400 placeholder:text-lg px-4"
                        placeholder="Location's Link" value="{{ old('location_link') }}">
                    @error('location_link')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="capacity" class="block text-red-500 text-xs font-bold -mb-1">*</label>
                    <input type="number" id="capacity" name="capacity"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:font-normal placeholder:text-gray-400 placeholder:text-lg px-4"
                        placeholder="Capacity of Participats" value="{{ old('capacity') }}">
                    @error('capacity')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="dresscode" class="block text-red-500 text-xs font-bold -mb-1">*</label>
                    <input type="text" id="dresscode" name="dresscode"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:font-normal placeholder:text-gray-400 placeholder:text-lg px-4"
                        placeholder="Dresscode" value="{{ old('dresscode') }}">
                    @error('dresscode')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="cp_name" class="block text-red-500 text-xs font-bold -mb-1">*</label>
                    <input type="text" id="cp_name" name="cp_name"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:font-normal placeholder:text-gray-400 placeholder:text-lg px-4"
                        placeholder="Contact Person's Name" value="{{ old('cp_name') }}">
                    @error('cp_name')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="contact_person" class="block text-red-500 text-xs font-bold -mb-1">*</label>
                    <input type="text" id="contact_person" name="contact_person"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:font-normal placeholder:text-gray-400 placeholder:text-lg px-4"
                        placeholder="Contact Person's Number" value="{{ old('contact_person') }}">
                    @error('contact_person')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="socmed_name" class="block text-red-500 text-xs font-bold -mb-1">*</label>
                    <input type="text" id="socmed_name" name="socmed_name"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:font-normal placeholder:text-gray-400 placeholder:text-lg px-4"
                        placeholder="Social Media Name (ig/x/fb)" value="{{ old('socmed_name') }}">
                    @error('socmed_name')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="social_media_link" class="block text-gray-700 text-sm font-bold mb-2"></label>
                    <input type="url" id="social_media_link" name="social_media_link"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:font-normal placeholder:text-gray-400 placeholder:text-lg px-4"
                        placeholder="Social Media Link" value="{{ old('social_media_link') }}">
                    @error('social_media_link')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="event_hashtag" class="block text-gray-700 text-sm font-bold mb-2"></label>
                    <input type="text" id="event_hashtag" name="event_hashtag"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:font-normal placeholder:text-gray-400 placeholder:text-lg px-4"
                        placeholder="Event Hashtag" value="{{ old('event_hashtag') }}">
                    @error('event_hashtag')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2"></label>
                    <textarea name="description" id="description"
                        class="focus:bg-gray-100 focus:border-none focus:outline-none border-b-2 border-gray-500 focus:border-b-2 focus:border-gray-500 w-full h-12 placeholder:font-normal placeholder:text-gray-400 placeholder:text-lg px-4"
                        placeholder="Note / Event's Description">{{ old('description') }}</textarea>
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
                    Create Event
                </button>
            </form>
        </div>
    </div>  
</body>

</html>
