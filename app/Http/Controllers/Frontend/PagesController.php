<?php
//    $table->string('phone')->nullable();
//    $table->string('email')->nullable();
//    $table->string('address')->nullable();
//    $table->string('map')->nullable();
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\About;
use App\Models\Gallery;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Service;
use App\Models\Social;
use App\Models\Partners;
use App\Models\Team;
 use App\Models\Contactus;
 use App\Models\Footer;
 use App\Models\Plog;



class PagesController extends Controller
{


    public function index() : View {
        // return view("frontend.pages.index");
        $aboutus = about::all();
        $Services = Service::all();
        $sliders = Slider::all();
        $Partners= Partners::paginate(5);
        $Gallerys= Gallery::paginate(3);
        $Contactus= Contactus::all()->first();
        $Teams= Team::paginate(3);
        $slider_img  = Slider::where('id',1)->get();
        $SocialFac  = Social::where('name','Facebook')->first();
        $SocialTwi  = Social::where('name','twitter')->first();
        $SocialInsta  = Social::where('name','instagram')->first();
        $SocialYout  = Social::where('name','youtube')->first();
        $Footers= Footer::where('id',1)->get();
        $Plogs_home= Plog::paginate(3);

        return view("frontend.pages.index",
        compact('aboutus','sliders','slider_img'
        ,'SocialFac','SocialTwi','SocialInsta',
        'SocialYout','Partners','Gallerys'
        ,'Teams','Contactus','Footers','Plogs_home','Services'));
    }

    public function gallery() : View {
        $aboutus = about::all();
        $Services = Service::all();
        $sliders = Slider::all();
        $Partners= Partners::all();
        $Gallerys= Gallery::all();
        $Contactus= Contactus::all()->first();
        $Teams= Team::paginate(3);
        $slider_img  = Slider::where('id',1)->get();
        $SocialFac  = Social::where('name','Facebook')->first();
        $SocialTwi  = Social::where('name','twitter')->first();
        $SocialInsta  = Social::where('name','instagram')->first();
        $SocialYout  = Social::where('name','youtube')->first();
        $Footers= Footer::where('id',1)->get();
        $Plogs_home= Plog::paginate(3);

        return view("frontend.pages.gallery",
        compact('aboutus','sliders','slider_img'
        ,'SocialFac','SocialTwi','SocialInsta',
        'SocialYout','Partners','Gallerys','Services'
        ,'Teams','Contactus','Footers','Plogs_home'));
    }

    /*
     public function about(){
            $aboutus = about::all();
            return view('frontend.includes.home.about',compact('aboutus'));
        }
        */
    public function about(Request $Request) : View {
        $aboutus = about::all();
        $sliders = Slider::all();
        $slider_img  = Slider::where('id',2)->get();
        $Footers= Footer::where('id',1)->get();
        $Contactus= Contactus::all()->first();
        $SocialFac  = Social::where('name','Facebook')->first();
        $SocialTwi  = Social::where('name','twitter')->first();
        $SocialInsta  = Social::where('name','instagram')->first();
        $SocialYout  = Social::where('name','youtube')->first();


        return view("frontend.pages.about",compact('aboutus',
        'slider_img','sliders','Footers','Contactus','SocialFac','SocialTwi'
        ,'SocialInsta','SocialYout'));
    }

    public function contact() : View {
        $slider_img  = Slider::where('id',1)->get();
        $Contactus= Contactus::all()->first();
        $SocialFac  = Social::where('name','Facebook')->first();
        $SocialTwi  = Social::where('name','twitter')->first();
        $SocialInsta  = Social::where('name','instagram')->first();
        $SocialYout  = Social::where('name','youtube')->first();


        return view("frontend.pages.contact",compact('slider_img'
        ,'Contactus','SocialFac','SocialTwi'
        ,'SocialInsta','SocialYout'));
    }

    public function products() : View {
        $Products= Product::all();
        $slider_img  = Slider::where('id',1)->get();
        $SocialFac  = Social::where('name','Facebook')->first();
        $SocialTwi  = Social::where('name','twitter')->first();
        $SocialInsta  = Social::where('name','instagram')->first();
        $SocialYout  = Social::where('name','youtube')->first();
        $Footers= Footer::where('id',1)->get();
        $Contactus= Contactus::all()->first();


        return view("frontend.pages.products",compact('Products','slider_img'
        ,'SocialFac','SocialTwi','SocialInsta','SocialYout'
        ,'Footers','Contactus'));
    }

    public function services() : View {
        $slider_img  = Slider::where('id',1)->get();
        $Services = Service::all();
        $Contactus= Contactus::all()->first();
        $SocialFac  = Social::where('name','Facebook')->first();
        $SocialTwi  = Social::where('name','twitter')->first();
        $SocialInsta  = Social::where('name','instagram')->first();
        $SocialYout  = Social::where('name','youtube')->first();
        $Footers= Footer::where('id',1)->get();
        return view("frontend.pages.service.index",compact('slider_img','Services','slider_img'
        ,'SocialFac','SocialTwi','SocialInsta'
        ,'SocialYout','Footers','Contactus'));
    }

    public function serviceDetails() : View {
        $slider_img  = Slider::where('id',1)->get();
        $Contactus= Contactus::all()->first();
        $SocialFac  = Social::where('name','Facebook')->first();
        $SocialTwi  = Social::where('name','twitter')->first();
        $SocialInsta  = Social::where('name','instagram')->first();
        $SocialYout  = Social::where('name','youtube')->first();
        $Footers= Footer::where('id',1)->get();
        return view("frontend.pages.service.details",compact('SocialFac','SocialTwi','SocialInsta'
        ,'SocialYout','Footers','Contactus','slider_img'));
    }

    public function blogs() : View {

        // $Plogs_home= Plog::paginate(3);
        $Plogs= Plog::all();
        $slider_img  = Slider::where('id',1)->get();
        $Contactus= Contactus::all()->first();
        $SocialFac  = Social::where('name','Facebook')->first();
        $SocialTwi  = Social::where('name','twitter')->first();
        $SocialInsta  = Social::where('name','instagram')->first();
        $SocialYout  = Social::where('name','youtube')->first();
        $Footers= Footer::where('id',1)->get();

        return view("frontend.pages.blog.index",compact('Plogs','slider_img'
        ,'SocialFac','SocialTwi','SocialInsta','SocialYout'
    ,'Footers','Contactus'));

//     return view("frontend.pages.blog.index",compact('Plogs','slider_img'
//     ,'SocialFac','SocialTwi','SocialInsta','SocialYout'
// ,'Footers','Contactus'));  'frontend.includes.home.blog'
    }

    public function blogDetails() : View {
        $Plogs= Plog::all();
        $slider_img  = Slider::where('id',1)->get();
        $Contactus= Contactus::all()->first();
        $SocialFac  = Social::where('name','Facebook')->first();
        $SocialTwi  = Social::where('name','twitter')->first();
        $SocialInsta  = Social::where('name','instagram')->first();
        $SocialYout  = Social::where('name','youtube')->first();
        $Footers= Footer::where('id',1)->get();
        $Partners= Partners::all();
        return view("frontend.pages.blog.details",compact('slider_img'
        ,'SocialFac','SocialTwi','SocialInsta',
        'SocialYout','Partners'
        ,'Contactus','Footers','Plogs'));

    }
}
