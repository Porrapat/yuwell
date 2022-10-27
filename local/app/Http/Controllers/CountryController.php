<?php

namespace App\Http\Controllers;
use App\country;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country = country::all();
        $data = array(
            'country' => $country,
        );
        return view('backend.country.country',$data);
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
        $country = new country();
        $country->country_name_th 	        = $request['country_name_th'];
        $country->country_name_en	        = $request['country_name_en'];

        if ($request->hasFile('country_img')!=''){
            $filename = 'image_country_'.Str::random(12).".". $request->file('country_img')->getClientOriginalExtension();
            $request->file('country_img')->move(public_path().'/img/country/', $filename);
            $country->country_img= 'img/country/'.$filename;        
        }else{
            $country->country_img = 'img/country/no.png';
        }
       
        $country->save();
       
   
        return back()->withSuccess('country Has Been Saved!');
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
        $country = country::where('country_id', $id) 
        ->first();
        $data = array(
            'country' => $country,
        );
        return view('backend.country.country-edit',$data);
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
          $country = country::where('country_id',$id)->first();
          $country->country_name_th 	        = $request['country_name_th'];
          $country->country_name_en 	        = $request['country_name_en'];
          $country->save();

        
          if($request->hasFile('country_img')!=''){
              $filename = 'image_country_'.Str::random(12).".". $request->file('country_img')->getClientOriginalExtension();
              $request->file('country_img')->move(public_path().'/img/country/', $filename);
              $image1 = 'img/country/'.$filename ;    
              $data1 = country::where('country_id' , $id)->first();
              if($data1->country_img != 'no.png'){
                   $delete =  File::delete(public_path() . '/img/country/' . $data1->country_img);
              }
              $update1 = [
                  'country_img' => $image1
                  ];
                  country::where('country_id',$id)->update($update1);
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
        country::where('country_id', $id)->delete();
        return back();
    }
}
