<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Event</title>

    @vite('resources/css/app.css')

</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="max-w-md bg-white rounded-lg shadow-md p-8 w-96">
        <h1 class="text-3xl font-bold mb-8">Create Event</h1>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">{{ $errors->first() }}</span>
            </div>
        @endif

        <form action="{{ route('events.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="event_name" class="block text-gray-700 text-sm font-bold mb-2">Event Name</label>
                <input type="text" id="event_name" name="event_name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Event Name" value="{{ old('event_name') }}">
                @error('event_name')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date</label>
                <input type="date" id="date" name="date"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ old('date') }}">
                @error('date')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="time" class="block text-gray-700 text-sm font-bold mb-2">Time</label>
                <input type="time" id="time" name="time"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ old('time') }}">
                @error('time')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location</label>
                <input type="text" id="location" name="location"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Location" value="{{ old('location') }}">
                @error('location')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="location_link" class="block text-gray-700 text-sm font-bold mb-2">Location Link</label>
                <input type="url" id="location_link" name="location_link"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Location Link" value="{{ old('location_link') }}">
                @error('location_link')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="capacity" class="block text-gray-700 text-sm font-bold mb-2">Capacity</label>
                <input type="number" id="capacity" name="capacity"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Capacity" value="{{ old('capacity') }}">
                @error('capacity')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="dresscode" class="block text-gray-700 text-sm font-bold mb-2">Dresscode</label>
                <input type="text" id="dresscode" name="dresscode"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Dresscode" value="{{ old('dresscode') }}">
                @error('dresscode')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="contact_person" class="block text-gray-700 text-sm font-bold mb-2">Contact Person</label>
                <input type="text" id="contact_person" name="contact_person"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Contact Person" value="{{ old('contact_person') }}">
                @error('contact_person')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="social_media_link" class="block text-gray-700 text-sm font-bold mb-2">Social Media
                    Link</label>
                <input type="url" id="social_media_link" name="social_media_link"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Social Media Link" value="{{ old('social_media_link') }}">
                @error('social_media_link')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="event_hashtag" class="block text-gray-700 text-sm font-bold mb-2">Event Hashtag</label>
                <input type="text" id="event_hashtag" name="event_hashtag"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Event Hashtag" value="{{ old('event_hashtag') }}">
                @error('event_hashtag')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="attendance" class="block text-gray-700 text-sm font-bold mb-2">Attendance</label>
                <input type="checkbox" id="attendance" name="attendance" value="1"
                    {{ old('attendance') ? 'checked' : '' }} class="form-checkbox h-5 w-5 text-blue-600"><span
                    class="ml-2">Allow Attendance</span>
                @error('attendance')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="polling" class="block text-gray-700 text-sm font-bold mb-2">Polling</label>
                <input type="checkbox" id="polling" name="polling" value="1"
                    {{ old('polling') ? 'checked' : '' }} class="form-checkbox h-5 w-5 text-blue-600"><span
                    class="ml-2">Allow Polling</span>
                @error('polling')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <!-- Add other input fields as needed -->

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Create Event
            </button>
        </form>
    </div>
</body>

</html>
