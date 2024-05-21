<?php

namespace App\Http\Controllers;

use App\Models\user_event_mate;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        //$data = user_event_mate::all();
        $data = user_event_mate::orderBy('name','asc')->get();
        return view('user/index')->with('data', $data);
    }

}
