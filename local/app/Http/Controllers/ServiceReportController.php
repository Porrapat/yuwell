<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\servicereport;
use App\repairstatus;

class ServiceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicereport = servicereport::paginate(10);
        return view('backend.service-report.service-report', compact('servicereport'));
    }

    public function show(Request $request, $id)
    {
        $servicereport = servicereport::with('service_report_images')->find($id);
        return view('backend.service-report.service-report-show', compact('servicereport'));
    }

    public function edit(Request $request, $id)
    {
        $servicereport = servicereport::find($id);
        return view('backend.service-report.service-report-edit', compact('servicereport'));
    }

    public function editOnlyStatus(Request $request, $id)
    {
        $servicereport = servicereport::find($id);
        $repairstatus = repairstatus::all();
        return view('backend.service-report.service-report-edit-only-status', compact('servicereport', 'repairstatus'));
    }

    public function updateOnlyStatus(Request $request, $id)
    {
        $servicereport = servicereport::where('service_report_id', $id)->first();
        $servicereport->service_report_repair_status_id = $request->service_report_repair_status_id;
        $servicereport->save();
        return redirect('admin/service-report')->withSuccess('Service Report Has Been Saved!');
    }

    public function destroy($id)
    {
        servicereport::where('service_report_id', $id)->delete();
        return back();
    }
}
