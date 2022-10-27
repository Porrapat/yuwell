<?php

namespace App\Http\Controllers;
use DB;
use App\producttype;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\File;
class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        $producttype = producttype::all();
       
        $data = array(
            'producttype' => $producttype,
        );
        return view('backend.product.product-type',$data);
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
            $producttype = new producttype();
            $producttype->type_name 	        = $request['type_name'];
            $producttype->type_name_th 	        = $request['type_name_th'];
            $producttype->type_content_th 	    = $request['type_content_th'];
            $producttype->type_content_en 	    = $request['type_content_en'];
            if ($request->hasFile('type_img_cover')!=''){
                $filename = 'image_news_'.Str::random(12).".". $request->file('type_img_cover')->getClientOriginalExtension();
                $request->file('type_img_cover')->move(public_path().'/img/producttype/', $filename);
                $producttype->type_img_cover= 'img/producttype/'.$filename;        
            }else{
                $producttype->type_img_cover = 'img/producttype/no.png';
            }
            if ($request->hasFile('type_img_icon')!=''){
                $filename = 'image_news_'.Str::random(12).".". $request->file('type_img_icon')->getClientOriginalExtension();
                $request->file('type_img_icon')->move(public_path().'/img/producttype/', $filename);
                $producttype->type_img_icon= 'img/producttype/'.$filename;        
            }else{
                $producttype->type_img_icon = 'img/producttype/no.png';
            }
            $producttype->save();
            
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producttype = producttype::where('type_id',$id)
        ->first();
        $data = array(
            'producttype' => $producttype,
        );
        return view('backend.product.product-type-edit',$data);
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
       $producttype = producttype::where('type_id',$id)->first();
       $producttype->type_name 	        = $request['type_name'];
       $producttype->type_name_th 	    = $request['type_name_th'];
       $producttype->save();

       if ($request->hasFile('type_img_cover')!=''){
           $filename = 'image_producttype_'.Str::random(12).".". $request->file('type_img_cover')->getClientOriginalExtension();
           $request->file('type_img_cover')->move(public_path().'/img/producttype/', $filename);
           $image = 'img/producttype/'.$filename ;    
           $data = producttype::where('type_id' , $id)->first();
           if($data->type_img_cover != 'no.png'){
                $delete =  File::delete(public_path() . '/img/producttype/' . $data->type_img_cover);
           }
           $update = [ 
           'type_img_cover' => $image
           ];
           producttype::where('type_id',$id)->update($update);

       }
       if($request->hasFile('type_img_icon')!=''){
           $filename = 'image_producttype_'.Str::random(12).".". $request->file('type_img_icon')->getClientOriginalExtension();
           $request->file('type_img_icon')->move(public_path().'/img/producttype/', $filename);
           $image1 = 'img/producttype/'.$filename ;    
           $data1 = producttype::where('type_id' , $id)->first();
           if($data1->type_img_icon != 'no.png'){
                $delete =  File::delete(public_path() . '/img/producttype/' . $data1->type_img_icon);
           }
           $update1 = [
               'type_img_icon' => $image1
               ];
               producttype::where('type_id',$id)->update($update1);
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

            producttype::destroy($id);
            return back()->withSuccess('producttype Has Been Deleted!');
       
    }
    public function delproducttypeimg($id)
    {
        // dd($id);
            $producttypeimg = producttypeimg::where('producttype_img_id', $id)->delete();
           
            return back()->withSuccess('producttype Has Been Deleted!');
       
    }

    public function producttypebanner()
    {
        $banner = banner::where('banner_id', 3)->first();
        $data = array(
            'banner' => $banner, 
        );
        return view('backoffice.producttype.banner',$data);
    }

    public function filterIntType(Request $request) 
    {
        // dd($request);
        $type = $request->intyp;
       
        if ($type == 1) {
            $carbrand  = carbrand::all();
            $th_add = '';
            $en_add = '';
            foreach ($carbrand as $key => $item){
                // $data1 = '<option value="'.$item->car_brand_id.'">'.$item->car_brand_name.'</option>';
            $th_add = '<div class="form-group">
            <strong>Car Brand</strong>
            <select name="producttype_car_brand" class="default-select2 form-control">
            <option value="'.$item->car_brand_id.'">'.$item->car_brand_name.'</option>
                </select>
            </div>';
                      
            $en_add = '';
        }  
        $data = array(
            'th_add' => $th_add, 
            'en_add' => $en_add, 
        ); 

        }else{
        $product      = product::all();
        $th_add = '';
        $en_add = '';
        
        foreach ($product as $key => $item){
            // $data2 = ' <option value="'.$item->product_id.'">'.$item->product_name.'</option>';
       
            $en_add = '
            <div class="form-group">
            <strong>Name Product</strong>
            <select name="producttype_name_product" class="default-select2 form-control">
            <option value="'.$item->product_id.'">'.$item->product_name.'</option>
            </select>
            </div>';
            $th_add = '';
        }
                    $data = array(
                        'th_add' => $th_add, 
                        'en_add' => $en_add, 
                    );
        }
        // dd($data);
        return $data;
    }

    
}
