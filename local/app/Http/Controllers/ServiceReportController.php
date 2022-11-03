<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\servicereport;
use App\repairstatus;

use Carbon\Carbon;

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

        if($request->service_report_buy_date)
        {
            $servicereport->service_report_buy_date = Carbon::createFromFormat('d/m/Y', $request->service_report_buy_date);
        }
        if($request->service_report_close_date)
        {
            $servicereport->service_report_close_date = Carbon::createFromFormat('d/m/Y', $request->service_report_close_date);
        }
        if($request->service_report_return_date)
        {
            $servicereport->service_report_return_date = Carbon::createFromFormat('d/m/Y', $request->service_report_return_date);
        }

        $servicereport->service_report_how_to_fix_problem = $request->service_report_how_to_fix_problem;
        $servicereport->service_report_replacement_parts = $request->service_report_replacement_parts;
        $servicereport->service_report_expense = $request->service_report_expense;
        $servicereport->service_report_note = $request->service_report_note;

        $servicereport->save();
        return redirect('admin/service-report')->withSuccess('Service Report Has Been Saved!');
    }

    public function print(Request $request, $id)
    {
        $servicereport = servicereport::find($id);
        return view('backend.service-report.service-report-print', compact('servicereport'));
    }

    public function destroy($id)
    {
        servicereport::where('service_report_id', $id)->delete();
        return back();
    }
}
