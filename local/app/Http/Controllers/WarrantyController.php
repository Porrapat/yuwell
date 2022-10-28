<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\warranty;

class WarrantyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $contact = contacts::all();
        // $data = array(
        //     'contact' => $contact,

        // );
        // return view('backend.warrany.warrany',$data);
        return view('backend.warranty.warranty');
    }
}
