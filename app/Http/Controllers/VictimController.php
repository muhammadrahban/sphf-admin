<?php

namespace App\Http\Controllers;

use App\Models\Victim;
use Illuminate\Http\Request;

class VictimController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value'); // Get the search term

            $query = Victim::orderBy('created_at', 'DESC');

            // Apply search filter
            if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('filled_da_form_id', 'like', "%{$search}%")
                        ->orWhere('da_cnic', 'like', "%{$search}%")
                        ->orWhere('da_occupant_name', 'like', "%{$search}%")
                        ->orWhere('gender', 'like', "%{$search}%")
                        ->orWhere('tehsil', 'like', "%{$search}%")
                        ->orWhere('union_council', 'like', "%{$search}%")
                        ->orWhere('district', 'like', "%{$search}%")
                        ->orWhere('deh', 'like', "%{$search}%");
                });
            }

            $totalRecords = $query->count();

            $query->skip($start)->take($length);

            $victims = $query->get();

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $totalRecords,
                'recordsFiltered' => $totalRecords,
                'data' => $victims,
            ]);
        }

        return view('victim.VictimIndex');
    }
}
