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
        <h2>Create Event</h2>
        <form action="/events" method="post">
            @csrf
            <div class="form-group">
                <label for="event_name">Event's name</label>
                <input type="text" class="form-control" id="event_name" name="event_name" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="location_link">Location's link (optional)</label>
                <input type="url" class="form-control" id="location_link" name="location_link">
            </div>
            <div class="form-group">
                <label for="capacity">Capacity of member</label>
                <input type="number" class="form-control" id="capacity" name="capacity" required>
            </div>
            <div class="form-group">
                <label for="dresscode">Dresscode</label>
                <input type="text" class="form-control" id="dresscode" name="dresscode" required>
            </div>
            <div class="form-group">
                <label for="contact_person">Contact Person</label>
                <input type="text" class="form-control" id="contact_person" name="contact_person" required>
            </div>
            <div class="form-group">
                <label for="social_media_link">Social media link</label>
                <input type="url" class="form-control" id="social_media_link" name="social_media_link">
            </div>
            <div class="form-group">
                <label for="event_hashtag">Event's hashtag</label>
                <input type="text" class="form-control" id="event_hashtag" name="event_hashtag">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="attendance" name="attendance">
                <label class="form-check-label" for="attendance">Attendance</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="polling" name="polling">
                <label class="form-check-label" for="polling">Polling</label>
            </div>
                <button type="submit" class="btn btn-primary mt-3">Create Event</button>
        </form>
    </div>
</body>
</html>