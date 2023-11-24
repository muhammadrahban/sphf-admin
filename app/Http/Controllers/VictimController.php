<?php

namespace App\Http\Controllers;

use App\Models\Victim;
use Illuminate\Http\Request;

class VictimController extends Controller
{
    function index(Request $request)
    {
        // $victims = Victim::orderBy('created_at', "DESC")->paginate(10);
        // return view('victim.VictimIndex', compact('victims'));

        if ($request->ajax()) {
            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');

            $query = Victim::orderBy('created_at', 'DESC');

            // Add other conditions or filters as needed
            // $query->where(...);

            $totalRecords = $query->count();

            $query->skip($start)->take($length);

            $victims = $query->get();

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $totalRecords,
                'recordsFiltered' => $totalRecords, // Adjust if you have filters
                'data' => $victims,
            ]);
        }

        return view('victim.VictimIndex');
    }
}
