<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateHeroSectionRequest;
use App\Models\HeroSection;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class HeroSectionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hero_section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $heroSection = HeroSection::with('media')->first();

        if (! $heroSection) {
            $heroSection = HeroSection::create($this->defaultData());
        }

        return view('admin.heroSection.index', compact('heroSection'));
    }

    public function update(UpdateHeroSectionRequest $request)
    {
        $heroSection = HeroSection::first();

        if (! $heroSection) {
            $heroSection = HeroSection::create($this->defaultData());
        }

        $heroSection->update($request->except('hero_image'));

        if ($request->hasFile('hero_image')) {
            $heroSection
                ->addMediaFromRequest('hero_image')
                ->toMediaCollection('hero_image');
        }

        return redirect()
            ->route('admin.hero-section.index')
            ->with('message', 'Hero section updated successfully.');
    }

    private function defaultData()
    {
        return [
            'badge_icon' => 'fa-solid fa-shield-heart',
            'badge_text' => 'Trusted Dental Care For Your Family',
            'title' => 'Healthy Smile,',
            'highlight_title' => 'Confident Life',
            'description' => 'Experience gentle, modern and professional dental care at OM Dental Clinic. Book appointments online for consultation, root canal, scaling, implants, braces, smile designing and emergency dental care.',
            'stat_1_number' => '10+',
            'stat_1_text' => 'Years Experience',
            'stat_2_number' => '5k+',
            'stat_2_text' => 'Happy Patients',
            'stat_3_number' => '15+',
            'stat_3_text' => 'Dental Services',
            'top_card_icon' => 'fa-solid fa-tooth',
            'top_card_title' => 'Painless Treatment',
            'top_card_text' => 'Advanced dental care',
            'bottom_card_icon' => 'fa-solid fa-clock',
            'bottom_card_title' => 'Easy Booking',
            'bottom_card_text' => 'Online appointment',
        ];
    }
}
