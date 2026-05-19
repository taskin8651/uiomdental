<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPageSection;

class AboutController extends Controller
{
    public function index()
    {
        $aboutPageSection = AboutPageSection::with('media')->first();

        return view('frontend.about', compact('aboutPageSection'));
    }
}