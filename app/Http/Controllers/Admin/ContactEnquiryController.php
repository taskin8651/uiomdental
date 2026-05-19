<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContactEnquiryRequest;
use App\Models\ContactEnquiry;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ContactEnquiryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contact_enquiry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactEnquiries = ContactEnquiry::latest()->get();

        return view('admin.contactEnquiries.index', compact('contactEnquiries'));
    }

    public function show(ContactEnquiry $contactEnquiry)
    {
        abort_if(Gate::denies('contact_enquiry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contactEnquiries.show', compact('contactEnquiry'));
    }

    public function destroy(ContactEnquiry $contactEnquiry)
    {
        abort_if(Gate::denies('contact_enquiry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactEnquiry->delete();

        return back()->with('message', 'Contact enquiry deleted successfully.');
    }

    public function massDestroy(MassDestroyContactEnquiryRequest $request)
    {
        ContactEnquiry::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
