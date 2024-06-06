<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventParticipant;
use CreateEventsTable;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function dashboard()
  {

    $userId = auth()->user()->id;
    $createdEvents = Event::where('user_id', $userId)->get();
    $joinedEvents = EventParticipant::where('user_id', $userId)->with('user', 'event')->get();
    return view('dashboard', compact('createdEvents', 'joinedEvents'));
  }
}
