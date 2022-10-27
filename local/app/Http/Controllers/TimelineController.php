<?php

namespace App\Http\Controllers;
use App\timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeline = timeline::all();
        $data = array(
            'timeline' => $timeline,
           
        );
        return view('backend.about.timeline',$data);
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
        $timeline = new timeline();
        $timeline->timeline_content_th	        = $request['timeline_content_th'];
        $timeline->timeline_content_en	        = $request['timeline_content_en'];
        $timeline->timeline_date                = $request['timeline_date'];
    
        $timeline->save();

        return redirect('/admin/timeline');
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
        $timeline = timeline::where('timeline_id', $id) 
        ->first();
        $data = array(
            'timeline' => $timeline,
        );
        return view('backend.about.timeline-edit',$data);
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
        $timeline = timeline::where('timeline_id', $id)->first();
        $timeline->timeline_content_th	        = $request['timeline_content_th'];
        $timeline->timeline_content_en	        = $request['timeline_content_en'];
        $timeline->timeline_date                = $request['timeline_date'];
       
            $timeline->save();

            if ($timeline->save()) {
                return redirect('/admin/timeline')->withSuccess('timeline information is now updated!');
            } else {
                return redirect('admin/timeline')->withError('Something Wrong. timeline Us Can Not Updated!');
            }       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        timeline::where('timeline_id', $id)->delete();
        return back();
    }
}
