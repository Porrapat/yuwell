<?php

namespace App\Http\Controllers;
use App\services;
use App\producttype;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $services = new services();
        $services->service_type	            = $request['service_type'];
        $services->service_title_th 	        = $request['service_title_th'];
        $services->service_title_en 	        = $request['service_title_en'];
        $services->service_content_th 	        = $request['service_content_th'];
        $services->service_content_en 	        = $request['service_content_en'];
        $services->service_features_th 	        = $request['service_features_th'];
        $services->service_features_en 	        = $request['service_features_en'];

            if ($request->hasFile('service_img_cover')!=''){
                $filename = 'image_news_'.Str::random(12).".". $request->file('service_img_cover')->getClientOriginalExtension();
                $request->file('service_img_cover')->move(public_path().'/img/services/', $filename);
                $services->service_img_cover= 'img/services/'.$filename;        
            }else{
                $services->service_img_cover = 'img/services/no.png';
            }
            if ($request->hasFile('service_img')!=''){
                $filename = 'image_news_'.Str::random(12).".". $request->file('service_img')->getClientOriginalExtension();
                $request->file('service_img')->move(public_path().'/img/services/', $filename);
                $services->service_img= 'img/services/'.$filename;        
            }else{
                $services->service_img = 'img/services/no.png';
            }
            if ($request->hasFile('service_video')!=''){
                $filename = 'image_news_'.Str::random(12).".". $request->file('service_video')->getClientOriginalExtension();
                $request->file('service_video')->move(public_path().'/img/services/', $filename);
                $services->service_video= 'img/services/'.$filename;        
            }else{
                $services->service_video = 'img/services/no.png';
            }
            $services->save();
            
        return back()->withSuccess('New Product Type Has Been Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $producttype = producttype::where('type_id', $id)->first();
        $services = services::leftJoin('tb_product_type', 'tb_services.service_type', '=', 'tb_product_type.type_id')
        ->where('service_type', $id)
        ->get();
        $data = array(
            'producttype' => $producttype,
            'services' => $services,

        );
        return view('backend.product.services',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = services::where('service_id', $id)->first();
       
        $data = array(
            'services' => $services,

        );
        return view('backend.product.services-edit',$data);
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
        //
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
