<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'event_name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'location_link' => 'nullable|url',
            'capacity' => 'required|integer',
            'dresscode' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'social_media_link' => 'nullable|url',
            'event_hashtag' => 'nullable|string|max:255',
            'attendance' => 'nullable|boolean',
            'polling' => 'nullable|boolean'
        ]);

        // Penyimpanan data event
        $event = Event::create([
            'event_name' => $request->event_name,
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location,
            'location_link' => $request->location_link,
            'capacity' => $request->capacity,
            'dresscode' => $request->dresscode,
            'contact_person' => $request->contact_person,
            'social_media_link' => $request->social_media_link,
            'event_hashtag' => $request->event_hashtag,
            'attendance' => $request->attendance ?? false,
            'polling' => $request->polling ?? false,
            'event_code' => Str::random(6),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    public function index()
    {
        $createdEvents = Auth::user()->events;
        // Debugging
        dd($createdEvents);

        $joinedEvents = Event::whereHas('participants', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }
}
