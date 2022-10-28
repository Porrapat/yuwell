<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\serialnumber;

use Illuminate\Validation\Rule;

class SerialNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serialnumber = serialnumber::all();
        return view('backend.serial-number.serial-number', compact('serialnumber'));
    }

    public function show()
    {

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'serial_number_no' => 'required|max:150|unique:tb_serial_number',
        ]);

        $serialnumber = new serialnumber();
        $serialnumber->serial_number_no = $request['serial_number_no'];
        $serialnumber->serial_number_product_name = $request['serial_number_product_name'];
        $serialnumber->serial_number_type_name = $request['serial_number_type_name'];
        $serialnumber->serial_number_lot = $request['serial_number_lot'];
        $serialnumber->save();

        return back()->withSuccess('New Serial Number Has Been Saved!');
    }

    public function edit(Request $request, $id)
    {
        $serialnumber = serialnumber::find($id);
        return view('backend.serial-number.serial-number-edit', compact('serialnumber'));
    }

    public function update(Request $request, $id)
    {
        $serialnumber = serialnumber::where('serial_number_id', $id)->first();
        $serialnumber->serial_number_product_name = $request->serial_number_product_name;
        $serialnumber->serial_number_type_name = $request->serial_number_type_name;
        $serialnumber->serial_number_lot = $request->serial_number_lot;
        $serialnumber->save();

        return redirect('admin/serial-number')->withSuccess('Repair Status Has Been Saved!');
    }

    public function destroy($id)
    {
        serialnumber::where('serial_number_id', $id)->delete();
        return back();
    }
}
