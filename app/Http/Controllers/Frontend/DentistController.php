<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DentistProfileSection;

class DentistController extends Controller
{
    public function index()
    {
        $dentistProfileSection = DentistProfileSection::with('media')->first();

        return view('frontend.dentist', compact('dentistProfileSection'));
    }
}