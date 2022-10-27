<?php

namespace App\Http\Controllers;
use App\sector;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sector = sector::all();
        $data = array(
            'sector' => $sector,
        );
        return view('backend.sector.sector',$data);
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
        $sector = new sector();
        $sector->sector_content_th 	        = $request['sector_content_th'];
        $sector->sector_content_en 	        = $request['sector_content_en'];

        if ($request->hasFile('sector_img')!=''){
            $filename = 'image_sector_'.Str::random(12).".". $request->file('sector_img')->getClientOriginalExtension();
            $request->file('sector_img')->move(public_path().'/img/sector/', $filename);
            $sector->sector_img= 'img/sector/'.$filename;        
        }else{
            $sector->sector_img = 'img/sector/no.png';
        }
        if ($request->hasFile('sector_logo')!=''){
            $filename = 'image_sector_'.Str::random(12).".". $request->file('sector_logo')->getClientOriginalExtension();
            $request->file('sector_logo')->move(public_path().'/img/sector/', $filename);
            $sector->sector_logo= 'img/sector/'.$filename;        
        }else{
            $sector->sector_logo = 'img/sector/no.png';
        }
        $sector->save();
       
   
        return back()->withSuccess('sector Has Been Saved!');
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
        $sector = sector::where('sector_id', $id) 
        ->first();
        $data = array(
            'sector' => $sector,
        );
        return view('backend.sector.sector-edit',$data);
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
          // dd($request);
          $sector = sector::where('sector_id',$id)->first();
          $sector->sector_content_th 	        = $request['sector_content_th'];
          $sector->sector_content_en 	        = $request['sector_content_en'];
          $sector->save();

          if ($request->hasFile('sector_logo')!=''){
              $filename = 'image_sector_'.Str::random(12).".". $request->file('sector_logo')->getClientOriginalExtension();
              $request->file('sector_logo')->move(public_path().'/img/sector/', $filename);
              $image = 'img/sector/'.$filename ;    
              $data = sector::where('sector_id' , $id)->first();
              if($data->sector_logo != 'no.png'){
                   $delete =  File::delete(public_path() . '/img/sector/' . $data->sector_logo);
              }
              $update = [ 
              'sector_logo' => $image
              ];
              sector::where('sector_id',$id)->update($update);
  
          }
          if($request->hasFile('sector_img')!=''){
              $filename = 'image_sector_'.Str::random(12).".". $request->file('sector_img')->getClientOriginalExtension();
              $request->file('sector_img')->move(public_path().'/img/sector/', $filename);
              $image1 = 'img/sector/'.$filename ;    
              $data1 = sector::where('sector_id' , $id)->first();
              if($data1->sector_img != 'no.png'){
                   $delete =  File::delete(public_path() . '/img/sector/' . $data1->sector_img);
              }
              $update1 = [
                  'sector_img' => $image1
                  ];
                  sector::where('sector_id',$id)->update($update1);
          }
          return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        sector::where('sector_id', $id)->delete();
        return back();
    }
}
