<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\homebanner;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sort_number = DB::table('tb_benner')
        ->orderBy('home_banner_sort', 'ASC')
        ->get();
        $sort_count = DB::table('tb_benner')
        ->orderBy('home_banner_sort', 'ASC')
        ->count();
        $ban = homebanner::all();
        $data = array(
            'ban' => $ban,
            'sort_number' => $sort_number,
            'sort_count' => $sort_count
        );
        // dd($data);
        return view('backend.home.homebanner',$data);
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
        $countBanner = homebanner::count();
        $ban = new homebanner();
        // $ban->home_banner_title         = $request['home_banner_title'];
        // $ban->home_banner_title_en      = $request['home_banner_title_en'];

        $ban->home_banner_show          = $request['home_banner_show'];
        $ban->home_banner_sort          = $countBanner+1;
        if ($request->hasFile('home_banner_img')!=''){
            $filename = 'image_news_'.Str::random(12).".". $request->file('home_banner_img')->getClientOriginalExtension();
            $request->file('home_banner_img')->move(public_path().'/img/banner/', $filename);
            $ban->home_banner_img= 'img/banner/'.$filename;
        }else{
            $ban->home_banner_img = 'img/banner/no.png';
        }
        
        $ban->save();

        return redirect('/admin/banner');
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
        $where = array('home_banner_id' => $id);
        $data['banner_info'] = homebanner::where($where)->first();
      
        return view('backend.home.homebanner_edit', $data);
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
        $request->validate([
           
            // 'home_banner_title' => 'required',
            // 'home_banner_title_en' => 'required',

            'home_banner_show' => 'required',
           
        ]);
        if ($request->hasFile('home_banner_img')!=''){
            $filename = 'image_news_'.Str::random(12).".". $request->file('home_banner_img')->getClientOriginalExtension();
            $request->file('home_banner_img')->move(public_path().'/img/banner/', $filename);
            $image = 'img/banner/'.$filename ;  
          
            $data = homebanner::where('home_banner_id' , $id)->first();
            if($data->home_banner_img != 'no.png'){
                 $delete =  File::delete(public_path() . '/img/banner/' . $data->home_banner_img);
            }
            $update = [
            // 'home_banner_title' => $request->home_banner_title, 
            // 'home_banner_title_en' => $request->home_banner_title_en, 

            'home_banner_show' => $request->home_banner_show,  
            'home_banner_img' => $image
            ];

        }
        else{
            // $image = $request->img;
            $update = [
            //     'home_banner_title' => $request->home_banner_title, 
            // 'home_banner_title_en' => $request->home_banner_title_en, 

                'home_banner_show' => $request->home_banner_show, 
            ];
        }
            
        homebanner::where('home_banner_id',$id)->update($update);
   
        // return back();
        return redirect('/admin/banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = homebanner::where('home_banner_id' , $id)->first();

        if($data->home_banner_img != 'no.png'){//ลบรูปที่ไม่ใช่ no.png
            $delete =  File::delete(public_path() . '/img/banner/' . $data->home_banner_img);
        }
        homebanner::where('home_banner_id',$id)->delete();

        
        return back();;
    }

    public function sortnumber(Request $request)
    {
        $sort_old = DB::table('tb_benner')
        ->where('home_banner_id', $request->id)
        ->first();

        // dd($sort_old);
        DB::table('tb_benner')
        ->where('home_banner_sort', $request->number)
        ->update([
            'home_banner_sort' => $sort_old->home_banner_sort
        ]);
        DB::table('tb_benner')
        ->where('home_banner_id', $request->id)
        ->update([
            'home_banner_sort' => $request->number
        ]);
    }

    public function showbanner(Request $request)
    {
        $banner = DB::table('tb_benner')
        ->where('home_banner_id', $request->id)
        ->update([
            'home_banner_show' => $request->one
        ]);

        return $banner;
    }
}
