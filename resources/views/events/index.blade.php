<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>Your Created Events</h2>
        <ul>
            @foreach($createdEvents as $event)
                <li>{{ $event->event_name }} - {{ $event->date }} - {{ $event->event_code }}</li>
            @endforeach
        </ul>
    
        <h2>Events You've Joined</h2>
        <ul>
            @foreach($joinedEvents as $event)
                <li>{{ $event->event_name }} - {{ $event->date }} - {{ $event->event_code }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>