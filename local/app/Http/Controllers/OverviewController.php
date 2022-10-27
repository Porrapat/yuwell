<?php

namespace App\Http\Controllers;
use App\overview;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $overview = overview::all();
        $data = array(
            'overview' => $overview,
        );
        return view('backend.about.overview',$data);
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
          // dd($request);
          $overview = new overview();
        //   $overview->overview_content_th     = $request['overview_content_th'];
        //   $overview->overview_content_en     = $request['overview_content_en'];

    
          if ($request->hasFile('honor_img')!=''){
              $filename = 'image_news_'.Str::random(12).".". $request->file('honor_img')->getClientOriginalExtension();
              $request->file('honor_img')->move(public_path().'/img/honor/', $filename);
              $overview->honor_img= 'img/honor/'.$filename;
          }else{
              $overview->honor_img = 'img/honor/no.png';
          }
          
          $overview->save();
  
          return redirect('admin/overview');
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
        $where = array('honor_id' => $id);
        $data['overview'] = overview::where($where)->first();
      
        return view('backend.about.overview-edit', $data);
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
          //  dd($request);
          if ($request->hasFile('honor_img')!=''){
            $filename = 'image_news_'.Str::random(12).".". $request->file('honor_img')->getClientOriginalExtension();
            $request->file('honor_img')->move(public_path().'/img/honor/', $filename);
            $image = 'img/honor/'.$filename ;    
            $data = overview::where('honor_id' , $id)->first();
            if($data->honor_img != 'no.png'){
                 $delete =  File::delete(public_path() . '/img/honor/' . $data->honor_img);
            }
            $update = [
            'honor_img'          => $image
            ];
        }
        
        overview::where('honor_id',$id)->update($update);
   
        $data = array(
            'overview'=> $update,
        );
      
        return redirect('admin/overview');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        overview::where('honor_id', $id)->delete();
        return back();
    }
}
