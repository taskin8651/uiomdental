<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ServiceSection;

class ServicesController extends Controller
{
    public function index()
    {
        $serviceSections = ServiceSection::with([
                'activeItems',
                'media',
            ])
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('frontend.services', compact('serviceSections'));
    }
}