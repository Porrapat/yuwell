<?php

namespace App\Http\Controllers;
use DB;
use App\producttype;
use App\productcollection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCollectionController extends Controller
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
        $productcollection = new productcollection();
        $productcollection->collection_fkey	            = $request['collection_fkey'];
        $productcollection->collection_name_th 	        = $request['collection_name_th'];
        $productcollection->collection_name_en 	        = $request['collection_name_en'];
            // if ($request->hasFile('collection_img')!=''){
            //     $filename = 'image_news_'.Str::random(12).".". $request->file('collection_img')->getClientOriginalExtension();
            //     $request->file('collection_img')->move(public_path().'/img/productcollection/', $filename);
            //     $productcollection->collection_img= 'img/productcollection/'.$filename;        
            // }else{
            //     $productcollection->collection_img = 'img/productcollection/no.png';
            // }
            $productcollection->save();
            
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
        $productcollection = productcollection::leftJoin('tb_product_type', 'tb_product_collection.collection_fkey', '=', 'tb_product_type.type_id')
        ->where('collection_fkey', $id)
        ->get();
        $data = array(
            'producttype' => $producttype,
            'productcollection' => $productcollection,

        );
        return view('backend.product.product-collection',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $productcollection = productcollection::leftJoin('tb_product_type', 'tb_product_collection.collection_fkey', '=', 'tb_product_type.type_id')
         ->where('collection_id', $id)
         ->first();
         $data = array(
             'productcollection' => $productcollection,
 
         );
         return view('backend.product.product-collection-edit',$data);
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
