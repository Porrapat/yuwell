<?php

namespace App\Http\Controllers;
use App\about;
use App\news;
use App\contacts;
use App\product;
use Response;
use App\overview;
use App\certificates;
use App\sector;
use App\timeline;
use Config;
use Session;
use App\country;
use App\video;
use App\producttype;
use App\serialnumber;
use App\warranty;
use App\servicereport;
use App\servicereportimage;
use DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function index()
    {
        $ban = DB::table('tb_benner')
        ->orderBy('home_banner_sort', 'ASC')
        ->where('home_banner_show', 1)
        ->get();

        $producttype = producttype::orderBy('type_id', 'DESC')->limit(10)->get();

        $news = DB::table('tb_news')
        ->orderBy('news_date', 'desc')
        ->limit(3)
        ->get();
        $about = about::first();
        $data = array(
            'producttype' => $producttype,
            'ban' => $ban,
            'news' => $news,
            'about' => $about,


        );
        return view('frontend.index',$data);
    }
    public function about()
    {
        $about = about::first();
        $overview = overview::first();
        $timeline = timeline::all();
        $country = country::all();
        $data = array(
            'overview' => $overview,
            'about' => $about,
            'timeline' => $timeline,
            'country' => $country,
        );

        return view('frontend.about',$data);
    }


    public function product()
    {

        $producttype = producttype::all();

        $data = array(


            'producttype' => $producttype,


        );
        return view('frontend.product',$data);
    }
    public function product_list()
    {

        return view('frontend.product-list');

    }

    public function product_detail()
    {

        return view('frontend.product-detail');

    }

    public function news()
    {
        $news_1 = news::orderBy('news_date', 'desc')
        ->first();
        $news = news::orderBy('news_date', 'desc')->where('news_id', '!=' , $news_1->news_id )
            ->paginate(12);
        $contact = contacts::first();

        $data = array(
            'contact' => $contact,
            'news' => $news,
            'news_1' => $news_1,


        );
        return view('frontend.news',$data);
    }

    public function news_detail($id)
    {
        $news = news::findorFail($id);
        $news_recent = news::where('news_id', '!=' , $id)->orderBy('news_date', 'desc')->limit(3)->get();
        $data = array(
            'news' => $news,
            'news_recent' => $news_recent,
        );
        return view('frontend.news-detail', $data);
    }
    public function video()
    {
        $video = video::all();
        $data = array(
            'video' => $video,
        );
        return view('frontend.video',$data);

    }
    public function industry()
    {
        $sector = sector::all();
        $data = array(
            'sector' => $sector,
        );
        return view('frontend.industry',$data);

    }
    public function contact()
    {
        $contact = contacts::first();
        $data = array(
            'contact' => $contact,

        );
        return view('frontend.contact',$data);

    }
    public function resultsearch()
    {

        return view('frontend.resultsearch');

    }
    public function privacy()
    {

        return view('frontend.privacy');

    }
    public function service_detail()
    {

        return view('frontend.service-detail');

    }
    public function service_sub()
    {

        return view('frontend.service-sub');

    }
    public function terms()
    {

        return view('frontend.terms');

    }
    public function switchLang($lang)
    {

        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale',$lang);
        }


        return back();
    }
    public function warranty(Request $request)
    {
        $found_serial = false;
        $found_warranty = false;
        $param = false;
        if ($request->serial_number)
        {
            $found_warranty = warranty::where('warranty_serial_number', $request->serial_number)->first();
            if ($found_warranty)
            {
                $disabled = false;
            }
            else
            {
                $disabled = true;
            }
            $param = true;

            $found_serial = serialnumber::where('serial_number_no', $request->serial_number)->first();
            if($found_serial)
            {
                $disabled = false;
            }
            else
            {
                $disabled = true;
            }
            $param = true;
        }
        else
        {
            $param = false;
            $disabled = true;
        }
        return view('frontend.warranty', compact('disabled', 'found_serial', 'found_warranty', 'param'));
    }

    public function warranty_store(Request $request)
    {
        $validatedData = $request->validate([
            'warranty_serial_number' => 'required',
            'warranty_name' => 'required',
            'warranty_surname' => 'required',
            'warranty_address' => 'required',
            'warranty_telephone' => 'required',
            'warranty_email' => 'required',
            'warranty_product_name' => 'required',
            'warranty_type_name' => 'required',
            'warranty_lot' => 'required',
            'warranty_shop_name' => 'required',
            'warranty_bill_image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $warranty = new warranty;
        $warranty->warranty_serial_number = $request->warranty_serial_number;
        $warranty->warranty_name = $request->warranty_name;
        $warranty->warranty_surname = $request->warranty_surname;
        $warranty->warranty_address = $request->warranty_address;
        $warranty->warranty_telephone = $request->warranty_telephone;
        $warranty->warranty_email = $request->warranty_email;
        $warranty->warranty_product_name = $request->warranty_product_name;
        $warranty->warranty_type_name = $request->warranty_type_name;
        $warranty->warranty_lot = $request->warranty_lot;
        $warranty->warranty_shop_name = $request->warranty_shop_name;
        if($request->warranty_buy_date)
        {
            $warranty->warranty_buy_date = Carbon::createFromFormat('d-m-Y', $request->warranty_buy_date);
        }

        if($request->warranty_why_know_yuwell && is_array($request->warranty_why_know_yuwell))
        {
            $warranty->warranty_why_know_yuwell = implode(",", $request->warranty_why_know_yuwell);
            if($request->warranty_why_know_yuwell_other)
            {
                $warranty->warranty_why_know_yuwell .= ",".$request->warranty_why_know_yuwell_other;
            }
        }
        if($request->warranty_decision_buy_because && is_array($request->warranty_decision_buy_because))
        {
            $warranty->warranty_decision_buy_because = implode(",", $request->warranty_decision_buy_because);
            if($request->warranty_decision_buy_because_other)
            {
                $warranty->warranty_decision_buy_because .= ",".$request->warranty_decision_buy_because_other;
            }
        }
        $warranty->warranty_created_at = Carbon::now();

        if($request->file('warranty_bill_image')){
            $file= $request->file('warranty_bill_image');
            $filename= date('YmdHi').rand(100,999).".".$file->getClientOriginalExtension();
            $file->move(public_path('img/warranty'), $filename);
            $warranty->warranty_bill_reciept_image = $filename;
        }

        $warranty->save();

        return redirect('/warranty')->with('success', 'Data is successfully saved');
    }

    public function serviceReport(Request $request)
    {
        $found_warranty = false;
        $param = false;
        if ($request->serial_number)
        {
            $found_warranty = warranty::where('warranty_serial_number', $request->serial_number)->first();
            if($found_warranty)
            {
                $disabled = false;
            }
            else
            {
                $disabled = true;
            }
            $param = true;
        }
        else
        {
            $param = false;
            $disabled = true;
        }
        return view('frontend.service-report', compact('disabled', 'found_warranty', 'param'));
    }

    public function serviceReport_store(Request $request)
    {
        $validatedData = $request->validate([
            'service_report_serial_number' => 'required',
            'service_report_name' => 'required',
            'service_report_surname' => 'required',
            'service_report_address' => 'required',
            'service_report_service_date' => 'required',
            'service_report_bill_image' => 'required',
            'service_report_bill_image.*' => 'mimes:jpg,png,jpeg,gif,svg'
        ]);

        $servicereport = new servicereport;
        $servicereport->service_report_serial_number = $request->service_report_serial_number;
        $servicereport->service_report_name = $request->service_report_name;
        $servicereport->service_report_surname = $request->service_report_surname;
        $servicereport->service_report_address = $request->service_report_address;
        if($request->service_report_service_date)
        {
            $servicereport->service_report_service_date = Carbon::createFromFormat('d-m-Y', $request->service_report_service_date);
        }

        $servicereport->service_report_email = $request->service_report_email;
        $servicereport->service_report_shop_name = $request->service_report_shop_name;
        if($request->service_report_buy_date)
        {
            $servicereport->service_report_buy_date = Carbon::createFromFormat('d-m-Y', $request->service_report_buy_date);
        }
        $servicereport->service_report_product_name = $request->service_report_product_name;
        $servicereport->service_report_type_name = $request->service_report_type_name;
        $servicereport->service_report_lot = $request->service_report_lot;

        $servicereport->service_report_problem = $request->service_report_problem;

        $servicereport->service_report_repair_status_id = 1;

        $servicereport->save();

        if($request->hasfile('service_report_bill_image'))
        {
            foreach($request->file('service_report_bill_image') as $key => $file)
            {
                $filename= date('YmdHi').rand(100,999).".".$file->getClientOriginalExtension();
                $file->move(public_path('img/servicereport'), $filename);
                $servicereportimage = new servicereportimage;
                $servicereportimage->service_report_id = $servicereport->service_report_id;
                $servicereportimage->service_report_image_name = $filename;
                $servicereportimage->save();
            }
        }

        $servicereport->service_report_repair_code = str_pad($servicereport->service_report_id, 5, '0', STR_PAD_LEFT);
        $servicereport->save();

        return redirect('/service-report')->with('success', 'Data is successfully saved. Your code is '.$servicereport->service_report_repair_code);
    }

    public function serviceReportCheck(Request $request)
    {
        $result = "";
        if ($request->service_report_repair_code)
        {
            $servicereport = servicereport::where('service_report_repair_code', $request->service_report_repair_code)->first();
            if($servicereport)
            {
                $result = $servicereport->repair_status->repair_status_name;
            }
            else
            {
                $result = "ไม่ค้นพบเลขซ่อมที่ต้องการ";
            }
        }
        return view('frontend.service-report-check', compact('result'));
    }
}
