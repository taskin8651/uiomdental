<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequestRequest;
use App\Http\Requests\StoreContactEnquiryRequest;
use App\Models\AppointmentRequest;
use App\Models\ContactEnquiry;

class EnquiryController extends Controller
{
    public function storeContact(StoreContactEnquiryRequest $request)
    {
        ContactEnquiry::create($request->validated());

        return back()->with('message', 'Thank you. Your enquiry has been submitted successfully.');
    }

    public function storeAppointment(StoreAppointmentRequestRequest $request)
    {
        AppointmentRequest::create($request->validated());

        return back()->with('message', 'Thank you. Your appointment request has been submitted successfully.');
    }
}
