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
 use App\Models\Blog;



class PagesController extends Controller
{

    public function milk() : View {
        return view('frontend.layouts.milk');

    }
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
        $blogs_home= Blog::paginate(3);

        return view("frontend.pages.index",
        compact('aboutus','sliders','slider_img'
        ,'SocialFac','SocialTwi','SocialInsta',
        'SocialYout','Partners','Gallerys'
        ,'Teams','Contactus','Footers','blogs_home','Services'));
    }

    public function gallery() : View {
        $aboutus = about::all();
        $Services = Service::all();
        $sliders = Slider::all();
        $Partners= Partners::all();
        $Gallerys= Gallery::all();
        $Gallerys22= Gallery::simplePaginate(5);

        $Contactus= Contactus::all()->first();
        $Teams= Team::paginate(3);
        $slider_img  = Slider::where('id',1)->get();
        $SocialFac  = Social::where('name','Facebook')->first();
        $SocialTwi  = Social::where('name','twitter')->first();
        $SocialInsta  = Social::where('name','instagram')->first();
        $SocialYout  = Social::where('name','youtube')->first();
        $Footers= Footer::where('id',1)->get();
        $blogs_home= Blog::paginate(3);

        return view("frontend.pages.gallery",
        compact('aboutus','sliders','slider_img'
        ,'SocialFac','SocialTwi','SocialInsta',
        'SocialYout','Partners','Gallerys','Services'
        ,'Teams','Contactus','Footers','blogs_home',
    'Gallerys22'));
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
        'slider_img','Footers','Contactus','SocialFac','SocialTwi'
        ,'SocialInsta','SocialYout'));
    }

    public function contact() : View {
        $slider_img  = Slider::where('id',1)->get();
        $Contactus= Contactus::all()->first();
        $SocialFac  = Social::where('name','Facebook')->first();
        $SocialTwi  = Social::where('name','twitter')->first();
        $SocialInsta  = Social::where('name','instagram')->first();
        $SocialYout  = Social::where('name','youtube')->first();
        $Footers= Footer::where('id',1)->get();


        return view("frontend.pages.contact",compact('slider_img'
        ,'Contactus','SocialFac','SocialTwi'
        ,'SocialInsta','SocialYout','Footers'));
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
        // $Services = Service::all();
        $Services = Service::simplePaginate(6);
        $Contactus= Contactus::all()->first();
        $SocialFac  = Social::where('name','Facebook')->first();
        $SocialTwi  = Social::where('name','twitter')->first();
        $SocialInsta  = Social::where('name','instagram')->first();
        $SocialYout  = Social::where('name','youtube')->first();
        $Footers= Footer::where('id',1)->get();
        return view("frontend.pages.service.index",compact('slider_img',
         'Services','slider_img'
        ,'SocialFac','SocialTwi','SocialInsta'
        ,'SocialYout','Footers','Contactus'));
    }

    public function serviceDetails($id) : View {
        $slider_img  = Slider::where('id',1)->get();
        $Contactus= Contactus::all()->first();
        $Services = Service::findOrFail($id)->simplePaginate(1);
        // $Services = Service::where('id',$id)->simplePaginate(1);

        $SocialFac  = Social::where('name','Facebook')->first();
        $SocialTwi  = Social::where('name','twitter')->first();
        $SocialInsta  = Social::where('name','instagram')->first();
        $SocialYout  = Social::where('name','youtube')->first();
        $Footers= Footer::where('id',1)->get();
        return view("frontend.pages.service.details",compact('SocialFac',
        'SocialTwi','SocialInsta'
        ,'SocialYout'
        ,'Services'
        ,'Footers','Contactus','slider_img'));
    }

    public function blogs() : View {

        // $blogs_home= Blog::paginate(3);
        $blogs= Blog::all();
        $slider_img  = Slider::where('id',1)->get();
        $Contactus= Contactus::all()->first();
        $SocialFac  = Social::where('name','Facebook')->first();
        $SocialTwi  = Social::where('name','twitter')->first();
        $SocialInsta  = Social::where('name','instagram')->first();
        $SocialYout  = Social::where('name','youtube')->first();
        $Footers= Footer::where('id',1)->get();

        return view("frontend.pages.blog.index",compact('blogs','slider_img'
        ,'SocialFac','SocialTwi','SocialInsta','SocialYout'
    ,'Footers','Contactus'));

//     return view("frontend.pages.blog.index",compact('blogs','slider_img'
//     ,'SocialFac','SocialTwi','SocialInsta','SocialYout'
// ,'Footers','Contactus'));  'frontend.includes.home.blog'
    }

    public function blogDetails() : View {
        $blogs= Blog::all();
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
        ,'Contactus','Footers','blogs'));

    }
}
