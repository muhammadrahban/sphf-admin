<?php

namespace App\Http\Controllers;

use App\Models\Victim;
use Illuminate\Http\Request;

class VictimController extends Controller
{
    function index()
    {
        $victims = Victim::orderBy('created_at', "DESC")->get();
        return view('victim.VictimIndex', compact('victims'));
    }
}
