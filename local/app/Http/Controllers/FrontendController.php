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
use DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
    public function warranty()
    {
        return view('frontend.warranty');
    }

    public function warranty_store(Request $request)
    {
        echo $request->warranty_name;
        // return view('frontend.warranty');
    }

    public function serviceReport()
    {
        return view('frontend.service-report');
    }



}
