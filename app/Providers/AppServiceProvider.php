<?php

namespace App\Providers;

use App\Models\WebsiteSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('frontend.*', function ($view) {
            $setting = WebsiteSetting::first();
            $siteName = $setting->site_name ?? 'OM Dental Clinic';
            $contactNumber = $setting->contact_number ?? '+91 99999 99999';
            $whatsappNumber = $setting->whatsapp_number ?? '919999999999';
            $clinicAddress = $setting->clinic_address ?? 'Clinic Address Here, Your City, Your State, India';
            $mapEmbedUrl = $setting->map_embed_url ?? 'https://www.google.com/maps?q=Delhi,India&output=embed';
            $mapDirectionUrl = $setting->map_direction_url ?? 'https://www.google.com/maps';
            $callLink = 'tel:' . preg_replace('/\s+/', '', $contactNumber);
            $whatsappLink = 'https://wa.me/' . preg_replace('/\D+/', '', $whatsappNumber);

            $view->with([
                'frontendSiteName' => $siteName,
                'frontendContactNumber' => $contactNumber,
                'frontendClinicAddress' => $clinicAddress,
                'frontendMapEmbedUrl' => $mapEmbedUrl,
                'frontendMapDirectionUrl' => $mapDirectionUrl,
                'frontendCallLink' => $callLink,
                'frontendWhatsappLink' => $whatsappLink,
                'frontendWhatsappAppointmentLink' => $whatsappLink . '?text=' . rawurlencode("Hi {$siteName}, I want to book an appointment."),
            ]);
        });
    }
}
