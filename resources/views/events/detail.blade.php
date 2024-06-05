<!-- resources/views/events/show.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Event</title>
    <!-- Include Tailwind CSS -->
    @vite('resources/css/app.css')

</head>

<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto py-8">
        <div class="bg-white rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-bold mb-4">{{ $event->event_name }}</h1>
            <p class="text-gray-700 mb-4">Date: {{ $event->date }}</p>
            <p class="text-gray-700 mb-4">Time: {{ $event->time }}</p>
            <p class="text-gray-700 mb-4">Location: {{ $event->location }}</p>
            @if ($event->location_link)
                <p class="text-gray-700 mb-4">Location Link: <a href="{{ $event->location_link }}"
                        class="text-blue-500">{{ $event->location_link }}</a></p>
            @endif
            <p class="text-gray-700 mb-4">Capacity: {{ $event->capacity }}</p>
            <p class="text-gray-700 mb-4">Dresscode: {{ $event->dresscode }}</p>
            <p class="text-gray-700 mb-4">Contact Person: {{ $event->contact_person }}</p>
            @if ($event->social_media_link)
                <p class="text-gray-700 mb-4">Social Media Link: <a href="{{ $event->social_media_link }}"
                        class="text-blue-500">{{ $event->social_media_link }}</a></p>
            @endif
            @if ($event->event_hashtag)
                <p class="text-gray-700 mb-4">Event Hashtag: {{ $event->event_hashtag }}</p>
            @endif
            <p class="text-gray-700 mb-4">Attendance: {{ $event->attendance ? 'Allowed' : 'Not Allowed' }}</p>
            <p class="text-gray-700 mb-4">Polling: {{ $event->polling ? 'Allowed' : 'Not Allowed' }}</p>
            <p class="text-gray-700 mb-4">Event Code: {{ $event->event_code }}</p>

            <h2 class="text-xl font-semibold mt-8 mb-4">Participants:</h2>
            <ul class="list-disc pl-6">
                @foreach ($event->participants as $participant)
                    <li>{{ $participant->name }} - {{ $participant->email }} -
                        {{ $participant->attendance == true ? 'present' : 'not-present' }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>
