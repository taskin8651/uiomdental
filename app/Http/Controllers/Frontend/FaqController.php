<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('frontend.faqs', compact('faqs'));
    }
}