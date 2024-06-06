<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventParticipant;
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

    public function downloadParticipant($eventId)
    {
        $dataParticipant = EventParticipant::where('event_id', $eventId)->with('user', 'event')->get();

        // Menggunakan view yang tepat untuk menampilkan data dalam format yang diinginkan
        return view('events.downloadParticipant', compact('dataParticipant'))->render();
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
            'cp_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'socmed_name' => 'required|string|max:255',
            'social_media_link' => 'nullable|url',
            'event_hashtag' => 'nullable|string|max:255',
            'attendance' => 'nullable|boolean',
            'polling' => 'nullable|boolean',
            'description' => 'nullable|string|max:65535'
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
            'cp_name' => $request->cp_name,
            'contact_person' => $request->contact_person,
            'socmed_name' => $request->socmed_name,
            'social_media_link' => $request->social_media_link,
            'event_hashtag' => $request->event_hashtag,
            'description' => $request->description,
            'attendance' => $request->attendance ?? false,
            'polling' => $request->polling ?? false,
            'event_code' => Str::random(6),
            'user_id' => Auth::id(),
        ]);
        return redirect('/dashboard')->with('success', 'Event created successfully');
    }

    public function edit($id)
{
    $event = Event::findOrFail($id);
    return view('events.edit', compact('event'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'event_name' => 'required|string|max:255',
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',
        'location' => 'required|string|max:255',
        'location_link' => 'nullable|url',
        'capacity' => 'required|integer',
        'dresscode' => 'required|string|max:255',
        'cp_name' => 'required|string|max:255',
        'contact_person' => 'required|string|max:255',
        'socmed_name' => 'required|string|max:255',
        'social_media_link' => 'nullable|url',
        'event_hashtag' => 'nullable|string|max:255',
        'attendance' => 'nullable|boolean',
        'polling' => 'nullable|boolean',
        'description' => 'nullable|string|max:65535'
    ]);

    $event = Event::findOrFail($id);
    $event->update([
        'event_name' => $request->event_name,
        'date' => $request->date,
        'time' => $request->time,
        'location' => $request->location,
        'location_link' => $request->location_link,
        'capacity' => $request->capacity,
        'dresscode' => $request->dresscode,
        'cp_name' => $request->cp_name,
        'contact_person' => $request->contact_person,
        'socmed_name' => $request->socmed_name,
        'social_media_link' => $request->social_media_link,
        'event_hashtag' => $request->event_hashtag,
        'description' => $request->description,
        'attendance' => $request->attendance ?? false,
        'polling' => $request->polling ?? false,
    ]);

    return redirect('/dashboard')->with('success', 'Event updated successfully');
}

    public function index()
    {
        $user =  Auth::user();
        // Debugging
        $createdEvents = Event::where('user_id',  $user->id)->get();
        $joinedEvents = EventParticipant::where('user_id', auth()->user()->id)->with('user', 'event')->get();

        return view('events.index1', compact('createdEvents', 'joinedEvents'));
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect('/dashboard')->with('success', 'Event deleted successfully');
    }


    public function join(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'event_code' => 'required',
            'email' => 'required|email',
        ]);
        $event = Event::where('event_code', $request->input('event_code'))->first();
        if (!isset($event)) {
            return back()->withErrors('event not found , please insert the correct code');
        }

        if ($event->user_id == auth()->user()->id) {
            return back()->withErrors('You cannot participate in your own events');
        }

        $eventCreated = EventParticipant::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'user_id' => auth()->user()->id,
            'event_id' => $event->id
        ]);
        if (isset($eventCreated)) {
            return back()->with('success', 'success join an event');
        } else {
            return back()->withErrors('failed to join an event');
        }
    }


    public function detail($id)
    {
        $event = Event::where('id', $id)->with('participants')->first();

        return view('events.detail', compact('event'));
    }

    public function createdetail($id)
    {
        $event = Event::where('id', $id)->with('participants')->first();

        return view('events.createdetail', compact('event'));
    }

    public function updateAttendance(Request $request, $eventId, $participantId)
    {
        $participant = EventParticipant::where('event_id', $eventId)
                                        ->where('id', $participantId)
                                        ->firstOrFail();

        $participant->attendance = true;
        $participant->save();

        return back()->with('success', 'Participant marked as present');
    }

    public function submitFeedback(Request $request, $eventId, $participantId)
    {
        $request->validate([
            'feedback' => 'required|string|max:1000',
        ]);

        $participant = EventParticipant::where('event_id', $eventId)
                                        ->where('id', $participantId)
                                        ->firstOrFail();

        $participant->feedback = $request->input('feedback');
        $participant->save();

        return back()->with('success', 'Feedback submitted successfully');
    }
}
