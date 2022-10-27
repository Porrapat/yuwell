<?php

namespace App\Http\Controllers;
use App\product;
use App\producttype;
use DB;
use App\productcollection;
use App\productimg;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
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
        $product = new product();
        $product->product_type	            = $request['product_type'];
        $product->product_collection 	    = $request['product_collection'];
        $product->product_name 	            = $request['product_name'];
        $product->product_name_en 	        = $request['product_name_en'];
        $product->product_content_th 	    = $request['product_content_th'];
        $product->product_content_en 	    = $request['product_content_en'];
            if ($request->hasFile('product_manual_en')!=''){
                $filename = 'image_news_'.Str::random(12).".". $request->file('product_manual_en')->getClientOriginalExtension();
                $request->file('product_manual_en')->move(public_path().'/img/product/', $filename);
                $product->product_manual_en= 'img/product/'.$filename;        
            }else{
                $product->product_manual_en = 'img/product/no.png';
            }
           
            if ($request->hasFile('product_manual_th')!=''){
                $filename = 'image_news_'.Str::random(12).".". $request->file('product_manual_th')->getClientOriginalExtension();
                $request->file('product_manual_th')->move(public_path().'/img/product/', $filename);
                $product->product_manual_th= 'img/product/'.$filename;        
            }else{
                $product->product_manual_th = 'img/product/no.png';
            }
            $product->save();
            if (($request->file('fileimg')) != null)
            {
                $productimg = $request->file('fileimg');
                foreach($productimg as $uploadfile) {
                    $name = rand().time().'.'.$uploadfile->getClientOriginalExtension();
                    $uploadfile->storeAs('product_img',  $name);
                    $productimg = new productimg();
                    $productimg->img_name  = $name;
                    $productimg->img_product_fkey  = $product->product_id;
                    $productimg->save();
                }
            }
        return back()->withSuccess('New Product Has Been Saved!');
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
        $productcollection = productcollection::leftJoin('tb_product_type', 'tb_product_collection.collection_fkey', '=', 'tb_product_type.type_id')
        ->where('collection_id', $id)->first();
        $product = product::leftJoin('tb_product_collection', 'tb_product.product_collection', '=', 'tb_product_collection.collection_id')
        ->leftJoin('tb_product_type', 'tb_product.product_type', '=', 'tb_product_type.type_id')
        ->where('product_collection', $id)
        ->get();
        $data = array(
            'product' => $product,
            'productcollection' => $productcollection,

        );
        return view('backend.product.product',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $product = product::leftJoin('tb_product_collection', 'tb_product.product_collection', '=', 'tb_product_collection.collection_id')
        ->leftJoin('tb_product_type', 'tb_product.product_type', '=', 'tb_product_type.type_id')
        ->where('product_id', $id)
        ->first();
        $productimg = productimg::leftJoin('tb_product', 'tb_product_img.img_product_fkey', '=', 'tb_product.product_id')
        ->where('img_product_fkey', $id)
        ->get();
        $data = array(
            'product' => $product,
            'productimg' => $productimg,
        );
        return view('backend.product.product-edit',$data);
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
