<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\repairstatus;

class RepairStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repairstatus = repairstatus::all();
        return view('backend.repair-status.repair-status', compact('repairstatus'));
    }

    public function show()
    {

    }

    public function store(Request $request)
    {
        $repairstatus = new repairstatus();
        $repairstatus->repair_status_name = $request['repair_status_name'];
        $repairstatus->save();

        return back()->withSuccess('New Repair Status Has Been Saved!');
    }

    public function edit(Request $request, $id)
    {
        $repairstatus = repairstatus::find($id);
        return view('backend.repair-status.repair-status-edit', compact('repairstatus'));
    }

    public function update(Request $request, $id)
    {
        $repairstatus = repairstatus::where('repair_status_id', $id)->first();
        $repairstatus->repair_status_name = $request->repair_status_name;
        $repairstatus->save();

        return redirect('admin/repair-status')->withSuccess('Repair Status Has Been Saved!');
    }

    public function destroy($id)
    {
        repairstatus::where('repair_status_id', $id)->delete();
        return back();
    }
}
