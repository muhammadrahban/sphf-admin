<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    function index()
    {
        $donations =  Donation::with('user', 'victim')->orderBy('created_at', 'DESC')->get();
        return view('donation.DonationIndex', compact('donations'));
    }
}
