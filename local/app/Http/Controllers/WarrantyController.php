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
        $warranty = warranty::all();
        return view('backend.warranty.warranty', compact('warranty'));
    }
}
