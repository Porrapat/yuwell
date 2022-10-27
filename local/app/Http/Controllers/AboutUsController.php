<?php

namespace App\Http\Controllers;
use DB;
use App\about;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = about::first();
        $data = array(
            'about' => $about,
        );
        return view('backend.about.about-us',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $about = new about();
        // $about->about_us_title_th	        = $request['about_us_title_th'];
        // $about->about_us_title_en 	        = $request['about_us_title_en'];
        $about->about_us_content_th 	    = $request['about_us_content_th'];
        $about->about_us_content_en 	    = $request['about_us_content_en'];
        $about->save();
    
        
        return back()->withSuccess('New Product Has Been Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = about::where('about_us_id', $id) 
        ->first();
        $data = array(
            'about' => $about,
           
        );
        return view('backend.about.about-us-edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $about = about::where('about_us_id', $id)
        ->update([
            'about_us_content_th'	        => $request['about_us_content_th'],
            'about_us_content_en'           => $request['about_us_content_en'],
            // 'about_us_title_th'             => $request['about_us_title_th'],
            // 'about_us_title_en'             => $request['about_us_title_en'],
        ]);
        return redirect('/admin/about');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
