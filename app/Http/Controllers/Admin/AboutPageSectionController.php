<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAboutPageSectionRequest;
use App\Models\AboutPageSection;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AboutPageSectionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('about_page_section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aboutPageSection = AboutPageSection::with('media')->first();

        if (!$aboutPageSection) {
            $aboutPageSection = AboutPageSection::create($this->defaultData());
        }

        return view('admin.aboutPageSection.index', compact('aboutPageSection'));
    }

    public function update(UpdateAboutPageSectionRequest $request)
    {
        $aboutPageSection = AboutPageSection::first();

        if (!$aboutPageSection) {
            $aboutPageSection = AboutPageSection::create($this->defaultData());
        }

        $aboutPageSection->update($request->except('about_intro_image'));

        if ($request->hasFile('about_intro_image')) {
            $aboutPageSection
                ->addMediaFromRequest('about_intro_image')
                ->toMediaCollection('about_intro_image');
        }

        return redirect()
            ->route('admin.about-page-section.index')
            ->with('message', 'About page section updated successfully.');
    }

    private function defaultData()
    {
        return [
            'intro_tag' => 'Who We Are',
            'intro_title' => 'Dedicated to creating healthy and confident smiles.',
            'intro_description_1' => 'OM Dental Clinic is focused on providing high-quality dental treatment in a clean, comfortable and patient-friendly environment. We believe in accurate diagnosis, honest consultation and safe treatment planning.',
            'intro_description_2' => 'From dental consultation and teeth cleaning to root canal treatment, implants, braces and smile designing, our clinic offers complete dental solutions for families.',
            'intro_button_text' => 'Book Appointment',
            'intro_button_url' => '/appointment.html',
            'experience_number' => '10+',
            'experience_text' => 'Years of Smile Care',

            'feature_1_icon' => 'fa-solid fa-user-doctor',
            'feature_1_title' => 'Experienced Dentist',
            'feature_2_icon' => 'fa-solid fa-shield-heart',
            'feature_2_title' => 'Hygienic Setup',
            'feature_3_icon' => 'fa-solid fa-microscope',
            'feature_3_title' => 'Modern Equipment',
            'feature_4_icon' => 'fa-solid fa-heart-pulse',
            'feature_4_title' => 'Patient Friendly Care',

            'mission_icon' => 'fa-solid fa-bullseye',
            'mission_title' => 'Our Mission',
            'mission_description' => 'To provide safe, comfortable and affordable dental care with modern techniques and honest guidance.',

            'vision_icon' => 'fa-solid fa-eye',
            'vision_title' => 'Our Vision',
            'vision_description' => 'To become a trusted dental clinic known for ethical treatment, advanced care and long-term patient relationships.',

            'approach_icon' => 'fa-solid fa-hand-holding-heart',
            'approach_title' => 'Care Approach',
            'approach_description' => 'Every patient receives personal attention, proper explanation and a treatment plan based on comfort and need.',
        ];
    }
}