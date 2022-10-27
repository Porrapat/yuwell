<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contacts;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = contacts::all();
        $data = array(
            'contact' => $contact,
           
        );
        return view('backend.contact.contact',$data);
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
        $contact = new contacts();
        $contact->contact_content_th	        = $request['contact_content_th'];
        $contact->contact_content_en	        = $request['contact_content_en'];
        $contact->contact_address_th            = $request['contact_address_th'];
        $contact->contact_address_en	        = $request['contact_address_en'];
        $contact->contact_phone	                = $request['contact_phone'];
        $contact->contact_website	            = $request['contact_website'];
        $contact->contact_facebook              = $request['contact_facebook'];
        $contact->contact_email                 = $request['contact_email'];
        $contact->contact_line                  = $request['contact_line'];
        $contact->contact_work_time_th          = $request['contact_work_time_th'];
        $contact->contact_work_time_en          = $request['contact_work_time_en'];
        $contact->contact_map                   = $request['contact_map'];
        $contact->contact_twitter               = $request['contact_twitter'];
        $contact->contact_instragram            = $request['contact_instragram'];
        $contact->contact_youtube               = $request['contact_youtube'];
        $contact->contact_linkin                = $request['contact_linkin'];
        $contact->contact_lazada                = $request['contact_lazada'];
        $contact->contact_shopee                = $request['contact_shopee'];
        $contact->contact_jd                    = $request['contact_jd'];


        $contact->save();

        return redirect('/admin/contact');
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
        $contact = contacts::where('contact_id', $id) 
        ->first();
        $data = array(
            'contact' => $contact,
        );
        return view('backend.contact.contact-edit',$data);
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
        $contact = contacts::where('contact_id', $id)->first();
        $contact->contact_content_th	        = $request['contact_content_th'];
        $contact->contact_content_en	        = $request['contact_content_en'];
        $contact->contact_address_th            = $request['contact_address_th'];
        $contact->contact_address_en	        = $request['contact_address_en'];
        $contact->contact_phone	                = $request['contact_phone'];
        $contact->contact_website	            = $request['contact_website'];
        $contact->contact_facebook              = $request['contact_facebook'];
        $contact->contact_email                 = $request['contact_email'];
        $contact->contact_line                  = $request['contact_line'];
        $contact->contact_work_time_th          = $request['contact_work_time_th'];
        $contact->contact_work_time_en          = $request['contact_work_time_en'];
        $contact->contact_map                   = $request['contact_map'];
        $contact->contact_twitter               = $request['contact_twitter'];
        $contact->contact_instragram            = $request['contact_instragram'];
        $contact->contact_youtube               = $request['contact_youtube'];
        $contact->contact_linkin                = $request['contact_linkin'];
        $contact->contact_lazada                = $request['contact_lazada'];
        $contact->contact_shopee                = $request['contact_shopee'];
        $contact->contact_jd                    = $request['contact_jd'];
            $contact->save();

            if ($contact->save()) {
                return redirect('/admin/contact')->withSuccess('Contact information is now updated!');
            } else {
                return redirect('admin/contact')->withError('Something Wrong. Contact Us Can Not Updated!');
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
        //
    }
}
