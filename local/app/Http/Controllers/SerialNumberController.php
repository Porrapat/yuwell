<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\serialnumber;

use Illuminate\Validation\Rule;

use PhpOffice\PhpSpreadsheet\IOFactory;

class SerialNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serialnumber = serialnumber::paginate(10);
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

    public function importExcel(Request $request)
    {
        $this->validate($request, [
            'serial_number_import_excel' => 'required|file|mimes:xls,xlsx'
        ]);
        $the_file = $request->file('serial_number_import_excel');

        try {
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $row_range    = range(2, $row_limit);
            foreach ( $row_range as $row ) {

                $serial_number = $sheet->getCell( 'A' . $row )->getValue();
                $product_name = $sheet->getCell( 'B' . $row )->getValue();
                $type_name = $sheet->getCell( 'C' . $row )->getValue();
                $lot = $sheet->getCell( 'D' . $row )->getValue();

                $found = serialnumber::where('serial_number_no', $serial_number)->first();
                if (!$found) {
                    $serialnumber = new serialnumber;
                    $serialnumber->serial_number_no = $serial_number;
                    $serialnumber->serial_number_product_name = $product_name;
                    $serialnumber->serial_number_type_name = $type_name;
                    $serialnumber->serial_number_lot = $lot;
                    $serialnumber->save();
                }
            }
        } catch (Exception $e) {
            return back()->withErrors('There was a problem uploading the data!');
        }
        return back()->withSuccess('Great! Data has been successfully uploaded.');
    }
}
