<?php

namespace App\Http\Controllers;
use App\news;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = news::all();
        $data = array(
            'news' => $news,
        );
        return view('backend.news.news',$data);
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
        $news = new news();
        $news->news_date 	            = $request['news_date'];
        $news->news_title_th 	        = $request['news_title_th'];
        $news->news_title_en 	        = $request['news_title_en'];
        $news->news_content_th 	        = $request['news_content_th'];
        $news->news_content_en 	        = $request['news_content_en'];
        $news->news_show 	            = $request['news_show'];

        if ($request->hasFile('news_img')!=''){
            $filename = 'image_news_'.Str::random(12).".". $request->file('news_img')->getClientOriginalExtension();
            $request->file('news_img')->move(public_path().'/img/news/', $filename);
            $news->news_img= 'img/news/'.$filename;        
        }else{
            $news->news_img = 'img/news/no.png';
        }
       
        $news->save();
       
   
        return back()->withSuccess('news Has Been Saved!');
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
        $news = news::where('news_id', $id) 
        ->first();
        $data = array(
            'news' => $news,
        );
        return view('backend.news.news-edit',$data);
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
        if ($request->hasFile('news_img')!=''){
            $filename = 'image_news_'.Str::random(12).".". $request->file('news_img')->getClientOriginalExtension();
            $request->file('news_img')->move(public_path().'/img/news/', $filename);
            $image = 'img/news/'.$filename ;    
            $data = news::where('news_id' , $id)->first();
            if($data->news_img != 'no.png'){
                 $delete =  File::delete(public_path() . '/img/news/' . $data->news_img);
            }
            $update = [
            'news_date'             => $request->news_date, 
            'news_title_th'         => $request->news_title_th, 
            'news_title_en'         => $request->news_title_en,  
            'news_content_th'       => $request->news_content_th,
            'news_content_en'       => $request->news_content_en,  
            'news_show'             => $request->news_show,  
            'news_img'              => $image
            ];

        }
        else{
            $update = [
            'news_date'             => $request->news_date, 
            'news_title_th'         => $request->news_title_th, 
            'news_title_en'         => $request->news_title_en,  
            'news_content_th'       => $request->news_content_th,
            'news_content_en'       => $request->news_content_en,
            'news_show'             => $request->news_show,  

            ];
           
        }
        news::where('news_id',$id)->update($update);
        return redirect('admin/news')->withSuccess('news Has Been Saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        news::where('news_id', $id)->delete();
        return back();
    }
}

