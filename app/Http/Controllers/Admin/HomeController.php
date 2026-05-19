<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutPageSection;
use App\Models\AppointmentRequest;
use App\Models\BeforeAfterGallery;
use App\Models\ContactEnquiry;
use App\Models\DentistProfileSection;
use App\Models\Faq;
use App\Models\GalleryCategory;
use App\Models\GalleryItem;
use App\Models\HeroSection;
use App\Models\ServiceSection;
use App\Models\Testimonial;
use App\Models\WebsiteSetting;

class HomeController
{
    public function index()
    {
        $today = now()->toDateString();

        $stats = [
            'appointments_total' => AppointmentRequest::count(),
            'appointments_today' => AppointmentRequest::whereDate('created_at', $today)->count(),
            'scheduled_today' => AppointmentRequest::whereDate('date', $today)->count(),
            'enquiries_total' => ContactEnquiry::count(),
            'enquiries_today' => ContactEnquiry::whereDate('created_at', $today)->count(),
            'services' => ServiceSection::count(),
            'gallery_items' => GalleryItem::count(),
            'testimonials' => Testimonial::count(),
        ];

        $recentAppointments = AppointmentRequest::latest()->take(6)->get();
        $recentEnquiries = ContactEnquiry::latest()->take(6)->get();

        $modules = [
            [
                'title' => 'Hero Section',
                'count' => HeroSection::count(),
                'meta' => optional(HeroSection::latest()->first())->title ?? 'Homepage hero content',
                'icon' => 'fa-house-medical',
                'route' => route('admin.hero-section.index'),
            ],
            [
                'title' => 'About Page',
                'count' => AboutPageSection::count(),
                'meta' => optional(AboutPageSection::latest()->first())->intro_title ?? 'Clinic intro content',
                'icon' => 'fa-building',
                'route' => route('admin.about-page-section.index'),
            ],
            [
                'title' => 'Dentist Profile',
                'count' => DentistProfileSection::count(),
                'meta' => optional(DentistProfileSection::latest()->first())->doctor_name ?? 'Doctor profile content',
                'icon' => 'fa-user-doctor',
                'route' => route('admin.dentist-profile-section.index'),
            ],
            [
                'title' => 'Services',
                'count' => ServiceSection::count(),
                'meta' => ServiceSection::where('status', 1)->count() . ' active sections',
                'icon' => 'fa-tooth',
                'route' => route('admin.service-sections.index'),
            ],
            [
                'title' => 'Gallery',
                'count' => GalleryItem::count(),
                'meta' => GalleryCategory::count() . ' categories',
                'icon' => 'fa-images',
                'route' => route('admin.gallery-items.index'),
            ],
            [
                'title' => 'Before After',
                'count' => BeforeAfterGallery::count(),
                'meta' => BeforeAfterGallery::where('status', 1)->count() . ' active results',
                'icon' => 'fa-images',
                'route' => route('admin.before-after-galleries.index'),
            ],
            [
                'title' => 'Testimonials',
                'count' => Testimonial::count(),
                'meta' => Testimonial::where('status', 1)->count() . ' active reviews',
                'icon' => 'fa-star',
                'route' => route('admin.testimonials.index'),
            ],
            [
                'title' => 'FAQs',
                'count' => Faq::count(),
                'meta' => Faq::where('status', 1)->count() . ' active FAQs',
                'icon' => 'fa-circle-question',
                'route' => route('admin.faqs.index'),
            ],
            [
                'title' => 'Website Settings',
                'count' => WebsiteSetting::count(),
                'meta' => optional(WebsiteSetting::latest()->first())->site_name ?? 'Site settings',
                'icon' => 'fa-gear',
                'route' => route('admin.website-settings.index'),
            ],
        ];

        return view('home', compact(
            'stats',
            'recentAppointments',
            'recentEnquiries',
            'modules'
        ));
    }
}
