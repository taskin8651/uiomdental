<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPageSection;
use App\Models\BeforeAfterGallery;
use App\Models\DentistProfileSection;
use App\Models\HeroSection;
use App\Models\ServiceSection;
use App\Models\Testimonial;
use App\Models\WebsiteSetting;

class IndexController extends Controller
{
    public function index()
    {
        $aboutPageSection = AboutPageSection::with('media')->first();
        $heroSection = HeroSection::with('media')->first();
        $dentistProfileSection = DentistProfileSection::with('media')->first();
        $beforeAfterGalleries = BeforeAfterGallery::with('media')
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->take(3)
            ->get();
        $serviceSections = ServiceSection::with(['activeItems', 'media'])
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->take(4)
            ->get();
        $testimonials = Testimonial::where('status', 1)
            ->orderByDesc('is_featured')
            ->orderBy('sort_order', 'asc')
            ->take(3)
            ->get();
        $websiteSetting = WebsiteSetting::first();

        return view('frontend.index', compact(
            'aboutPageSection',
            'heroSection',
            'dentistProfileSection',
            'beforeAfterGalleries',
            'serviceSections',
            'testimonials',
            'websiteSetting'
        ));
    }
}
