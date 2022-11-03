<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\warranty;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class WarrantyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warranty = warranty::paginate(10);
        return view('backend.warranty.warranty', compact('warranty'));
    }

    public function edit(Request $request, $id)
    {
        $warranty = warranty::find($id);
        return view('backend.warranty.warranty-edit', compact('warranty'));
    }

    public function update(Request $request, $id)
    {
        $warranty = warranty::where('warranty_id', $id)->first();
        $warranty->warranty_name = $request->warranty_name;
        $warranty->warranty_surname = $request->warranty_surname;
        $warranty->warranty_address = $request->warranty_address;
        $warranty->warranty_telephone = $request->warranty_telephone;
        $warranty->warranty_email = $request->warranty_email;
        $warranty->save();

        return redirect('admin/warranty')->withSuccess('Warranty Has Been Saved!');
    }

    public function destroy($id)
    {
        warranty::where('warranty_id', $id)->delete();
        return back();
    }

    private function setExcelWarrantyHeader($sheet)
    {
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Serial Number');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Surname');
        $sheet->setCellValue('E1', 'Address');
        $sheet->setCellValue('F1', 'Telephone');
        $sheet->setCellValue('G1', 'Email');
        $sheet->setCellValue('H1', 'Product Name');
        $sheet->setCellValue('I1', 'Type Name');
        $sheet->setCellValue('J1', 'Lot');
        $sheet->setCellValue('K1', 'Shop Name');
        $sheet->setCellValue('L1', 'Buy Date');
        $sheet->setCellValue('M1', 'Bill Reciept Image');
        $sheet->setCellValue('N1', 'Why You Know Yuwell');
        $sheet->setCellValue('O1', 'Decistion Buy Because');
        $sheet->setCellValue('P1', 'Created At');
        $sheet->setCellValue('Q1', 'Updated At');
        $sheet->getStyle('A1:Q1')->applyFromArray($this->getHeaderStyleArray());
    }

    private function setExcelWarrantyData($sheet, $warrantys)
    {
        foreach($warrantys as $index => $warranty)
        {
            $sheet->setCellValue('A'.($index+2), $warranty->warranty_id);
            $sheet->setCellValue('B'.($index+2), $warranty->warranty_serial_number);
            $sheet->setCellValue('C'.($index+2), $warranty->warranty_name);
            $sheet->setCellValue('D'.($index+2), $warranty->warranty_surname);
            $sheet->setCellValue('E'.($index+2), $warranty->warranty_address);
            $sheet->setCellValue('F'.($index+2), $warranty->warranty_telephone);

            $sheet->setCellValue('G'.($index+2), $warranty->warranty_email);
            $sheet->setCellValue('H'.($index+2), $warranty->warranty_product_name);
            $sheet->setCellValue('I'.($index+2), $warranty->warranty_type_name);
            $sheet->setCellValue('J'.($index+2), $warranty->warranty_lot);
            $sheet->setCellValue('K'.($index+2), $warranty->warranty_shop_name);
            $sheet->setCellValue('L'.($index+2), $warranty->warranty_buy_date);
            $sheet->setCellValue('M'.($index+2), $warranty->warranty_bill_reciept_image);
            $sheet->setCellValue('N'.($index+2), $warranty->warranty_why_know_yuwell);
            $sheet->setCellValue('O'.($index+2), $warranty->warranty_decision_buy_because);

            $sheet->setCellValue('P'.($index+2), $warranty->warranty_created_at);
            $sheet->setCellValue('Q'.($index+2), $warranty->warranty_updated_at);
        }
    }

    public function printExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $this->setExcelWarrantyHeader($sheet);

        $warrantys = warranty::all();
        $this->setExcelWarrantyData($sheet, $warrantys);

        $this->setAutoColumnWidth($sheet);

        $this->getDownloadExcelFileXLSX($spreadsheet, 'warrantys-report.xlsx');
    }
}
