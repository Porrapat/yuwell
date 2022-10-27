<?php

namespace App\Http\Controllers;
use App\video;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class VideoController extends Controller
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
        return view('backend.video.video',$data);
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
        $video = new video();
        $video->video_name_th 	            = $request['video_name_th'];
        $video->video_name_en 	            = $request['video_name_en'];
        $video->video_link 	                = $request['video_link'];
        if ($request->hasFile('video_img')!=''){
            $filename = 'image_news_'.Str::random(12).".". $request->file('video_img')->getClientOriginalExtension();
            $request->file('video_img')->move(public_path().'/img/video/', $filename);
            $video->video_img= 'img/video/'.$filename;        
        }else{
            $video->video_img = 'img/video/no.png';
        }
        $video->save();
       
   
        return back()->withSuccess('Video Has Been Saved!');
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
        $video = video::where('video_id', $id) 
        ->first();
        $data = array(
            'video' => $video,
        );
        return view('backend.video.video-edit',$data);
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
        // $video = video::where('video_id', $id)->first();
        // $video->video_name_th 	            = $request['video_name_th'];
        // $video->video_name_en 	        = $request['video_name_en'];
        // $video->video_link 	        = $request['video_link'];
       
        // $video->save();
       
        if ($request->hasFile('video_img')!=''){
            $filename = 'image_news_'.Str::random(12).".". $request->file('video_img')->getClientOriginalExtension();
            $request->file('video_img')->move(public_path().'/img/video/', $filename);
            $image = 'img/video/'.$filename ;    
            $data = video::where('video_id' , $id)->first();
            if($data->video_img != 'no.png'){
                 $delete =  File::delete(public_path() . '/img/video/' . $data->video_img);
            }
            $update = [
            'video_name_th'             => $request->video_name_th, 
            'video_name_en'         => $request->video_name_en, 
            'video_link'         => $request->video_link,  
           
            'video_img'              => $image
            ];

        }
        else{
            $update = [
                'video_name_th'             => $request->video_name_th, 
                'video_name_en'         => $request->video_name_en, 
                'video_link'         => $request->video_link,  
            ];
           
        }
        video::where('video_id',$id)->update($update);
        return redirect('admin/video')->withSuccess('news Has Been Saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        video::where('video_id', $id)->delete();
        return back();
    }
}
