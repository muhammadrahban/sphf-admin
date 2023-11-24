<?php

namespace App\Http\Controllers;

use App\Models\GeneralDonation;
use Illuminate\Http\Request;

class GeneralDonationController extends Controller
{
    function index()
    {
        $general_donations = GeneralDonation::orderBy('created_at', 'DESC')->get();
        return view('generalDonation.GeneralDonationIndex', compact('general_donations'));
    }
}
