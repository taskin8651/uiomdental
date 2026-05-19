<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateDentistProfileSectionRequest;
use App\Models\DentistProfileSection;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class DentistProfileSectionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dentist_profile_section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dentistProfileSection = DentistProfileSection::with('media')->first();

        if (!$dentistProfileSection) {
            $dentistProfileSection = DentistProfileSection::create($this->defaultData());
        }

        return view('admin.dentistProfileSection.index', compact('dentistProfileSection'));
    }

    public function update(UpdateDentistProfileSectionRequest $request)
    {
        $dentistProfileSection = DentistProfileSection::first();

        if (!$dentistProfileSection) {
            $dentistProfileSection = DentistProfileSection::create($this->defaultData());
        }

        $dentistProfileSection->update($request->except('dentist_profile_image'));

        if ($request->hasFile('dentist_profile_image')) {
            $dentistProfileSection
                ->addMediaFromRequest('dentist_profile_image')
                ->toMediaCollection('dentist_profile_image');
        }

        return redirect()
            ->route('admin.dentist-profile-section.index')
            ->with('message', 'Dentist profile section updated successfully.');
    }

    private function defaultData()
    {
        return [
            'profile_tag' => 'Dentist Profile',
            'doctor_name' => 'Dr. Your Dentist Name',
            'designation' => 'BDS / MDS, Dental Surgeon',
            'description' => 'Dedicated to providing gentle, hygienic and result-focused dental care with modern treatment techniques and a patient-first approach.',

            'experience_number' => '10+',
            'experience_text' => 'Years Experience',

            'qualification_icon' => 'fa-solid fa-graduation-cap',
            'qualification_label' => 'Qualification',
            'qualification_value' => 'BDS / MDS',

            'specialization_icon' => 'fa-solid fa-stethoscope',
            'specialization_label' => 'Specialization',
            'specialization_value' => 'Root Canal, Cosmetic Dentistry',

            'button_1_text' => 'Book Appointment',
            'button_1_url' => '/appointment.html',
            'button_1_icon' => 'fa-solid fa-calendar-check',

            'button_2_text' => 'Call Now',
            'button_2_url' => 'tel:+919999999999',
            'button_2_icon' => 'fa-solid fa-phone-volume',

            'availability_tag' => 'Clinic Hours',
            'availability_title' => 'Doctor Availability',
            'availability_icon' => 'fa-solid fa-clock',

            'schedule_1_label' => 'Monday - Saturday',
            'schedule_1_value' => '10:00 AM - 7:00 PM',

            'schedule_2_label' => 'Lunch Break',
            'schedule_2_value' => '2:00 PM - 3:00 PM',

            'schedule_3_label' => 'Sunday',
            'schedule_3_value' => 'Emergency Only',

            'schedule_4_label' => 'Emergency Call',
            'schedule_4_value' => '+91 99999 99999',

            'availability_note' => 'Appointment timing may vary depending on doctor availability and prior bookings. Please call before visiting for emergency cases.',
        ];
    }
}