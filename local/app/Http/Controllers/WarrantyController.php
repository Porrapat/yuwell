<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\warranty;
use App\video;

class WarrantyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = video::all();
        $data = array(
            'video' => $video,
        );
        return view('backend.warranty.warranty',$data);
    }
}
