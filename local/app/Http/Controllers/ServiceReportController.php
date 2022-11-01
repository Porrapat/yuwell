<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\servicereport;

class ServiceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicereport = servicereport::all();
        return view('backend.service-report.service-report', compact('servicereport'));
    }

    public function edit(Request $request, $id)
    {
        $servicereport = servicereport::find($id);
        return view('backend.service-report.service-report-edit', compact('servicereport'));
    }

    public function editOnlyStatus(Request $request, $id)
    {
        $servicereport = servicereport::find($id);
        return view('backend.service-report.service-report-edit-only-status', compact('servicereport'));
    }
}
