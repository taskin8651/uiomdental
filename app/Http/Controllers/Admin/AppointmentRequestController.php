<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppointmentRequestRequest;
use App\Models\AppointmentRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class AppointmentRequestController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('appointment_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointmentRequests = AppointmentRequest::latest()->get();

        return view('admin.appointmentRequests.index', compact('appointmentRequests'));
    }

    public function show(AppointmentRequest $appointmentRequest)
    {
        abort_if(Gate::denies('appointment_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.appointmentRequests.show', compact('appointmentRequest'));
    }

    public function destroy(AppointmentRequest $appointmentRequest)
    {
        abort_if(Gate::denies('appointment_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointmentRequest->delete();

        return back()->with('message', 'Appointment request deleted successfully.');
    }

    public function massDestroy(MassDestroyAppointmentRequestRequest $request)
    {
        AppointmentRequest::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
