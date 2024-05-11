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
    use App\Models\Settings;
    use App\Models\Logo;
    use App\Models\Order_items;
    use App\Models\orders;



class PagesController extends Controller
{
    // public function milk() : View {
    //     return view('frontend.layouts.milk');

    // }
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
        $titles = Settings::all();
        $logos = Logo::where('id',4)->get();
        $Products= Product::all();
        // foreach($logos as $logo);

        $keywordsSetting = Settings::where('key', 'keywords')->value('value');
        $seoSetting = Settings::where('key', 'seo')->value('value');
        $DesSetting = Settings::where('key', 'Description')->value('value');
        $orders= Product::all();

        return view("frontend.pages.index",
        compact('aboutus','sliders','slider_img'
        ,'SocialFac','SocialTwi','SocialInsta',
        'SocialYout','Partners','Gallerys'
        ,'Teams','Contactus','Footers'
        ,'blogs_home','Services','logos'
        ,'titles','keywordsSetting','seoSetting'
        ,'DesSetting','Products','orders'));
    }

    public function gallery() : View {
        $aboutus = about::all();
        $Services = Service::all();
        $sliders = Slider::all();
        $Partners= Partners::all();
        $Gallerys= Gallery::all();
        $Gallerys22= Gallery::simplePaginate(5);
        $Products= Product::all();
        $Contactus= Contactus::all()->first();
        $Teams= Team::paginate(3);
        $slider_img  = Slider::where('id',1)->get();
        $SocialFac  = Social::where('name','Facebook')->first();
        $SocialTwi  = Social::where('name','twitter')->first();
        $SocialInsta  = Social::where('name','instagram')->first();
        $SocialYout  = Social::where('name','youtube')->first();
        $Footers= Footer::where('id',1)->get();
        $blogs_home= Blog::paginate(3);
        $keywordsSetting = Settings::where('key', 'keywords')->value('value');
        $seoSetting = Settings::where('key', 'seo')->value('value');
        $DesSetting = Settings::where('key', 'Description')->value('value');
        $orders= Product::all();

        return view("frontend.pages.gallery",
        compact('aboutus','sliders','slider_img'
        ,'SocialFac','SocialTwi','SocialInsta',
        'SocialYout','Partners','Gallerys','Services'
        ,'Teams','Contactus','Footers','blogs_home',
    'Gallerys22','keywordsSetting','seoSetting','DesSetting'
        ,'Products','orders'));
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
        $Products= Product::all();
        $orders= Product::all();

        $keywordsSetting = Settings::where('key', 'keywords')->value('value');
        $seoSetting = Settings::where('key', 'seo')->value('value');
        $DesSetting = Settings::where('key', 'Description')->value('value');


        return view("frontend.pages.about",compact('aboutus',
        'slider_img','Footers','Contactus','SocialFac','SocialTwi'
        ,'SocialInsta','SocialYout','keywordsSetting'
        ,'seoSetting','DesSetting','Products','orders'));
    }

    public function contact() : View {
        $slider_img  = Slider::where('id',1)->get();
        $Contactus= Contactus::all()->first();
        $SocialFac  = Social::where('name','Facebook')->first();
        $SocialTwi  = Social::where('name','twitter')->first();
        $SocialInsta  = Social::where('name','instagram')->first();
        $SocialYout  = Social::where('name','youtube')->first();
        $Footers= Footer::where('id',1)->get();
        $keywordsSetting = Settings::where('key', 'keywords')->value('value');
        $seoSetting = Settings::where('key', 'seo')->value('value');
        $DesSetting = Settings::where('key', 'Description')->value('value');
        $Products= Product::all();
        $orders= Product::all();

        return view("frontend.pages.contact",compact('slider_img'
        ,'Contactus','SocialFac','SocialTwi'
        ,'SocialInsta','SocialYout','Footers'
        ,'keywordsSetting','seoSetting'
        ,'DesSetting','Products','orders'));
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
        $keywordsSetting = Settings::where('key', 'keywords')->value('value');
        $seoSetting = Settings::where('key', 'seo')->value('value');
        $DesSetting = Settings::where('key', 'Description')->value('value');
        $orders= Product::all();

        return view("frontend.pages.products",compact('Products','slider_img'
        ,'SocialFac','SocialTwi','SocialInsta','SocialYout'
        ,'Footers','Contactus'
        ,'keywordsSetting','seoSetting','DesSetting','orders'));
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
        $keywordsSetting = Settings::where('key', 'keywords')->value('value');
        $seoSetting = Settings::where('key', 'seo')->value('value');
        $DesSetting = Settings::where('key', 'Description')->value('value');
        $Products= Product::all();
        $orders= Product::all();
        return view("frontend.pages.service.index",compact('slider_img',
         'Services','slider_img'
        ,'SocialFac','SocialTwi','SocialInsta'
        ,'SocialYout','Footers','Contactus'
        ,'keywordsSetting','seoSetting'
        ,'DesSetting','Products','orders'));
    }

    public function serviceDetails($id) : View {
        $slider_img  = Slider::where('id',1)->get();
        $Contactus= Contactus::all()->first();
        $Services = Service::findOrFail($id)->simplePaginate(1);
        // $Services = Service::where('id',$id)->simplePaginate(1);
        $Products= Product::all();
        $SocialFac  = Social::where('name','Facebook')->first();
        $SocialTwi  = Social::where('name','twitter')->first();
        $SocialInsta  = Social::where('name','instagram')->first();
        $SocialYout  = Social::where('name','youtube')->first();
        $Footers= Footer::where('id',1)->get();
        return view("frontend.pages.service.details",compact('SocialFac',
        'SocialTwi','SocialInsta'
        ,'SocialYout'
        ,'Services'
        ,'Footers','Contactus','slider_img','Products'));
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
        $keywordsSetting = Settings::where('key', 'keywords')->value('value');
        $seoSetting = Settings::where('key', 'seo')->value('value');
        $DesSetting = Settings::where('key', 'Description')->value('value');
        $Products= Product::all();
        $orders= Product::all();
        return view("frontend.pages.blog.index",compact('blogs','slider_img'
        ,'SocialFac','SocialTwi','SocialInsta','SocialYout'
    ,'Footers','Contactus','keywordsSetting',
    'seoSetting','DesSetting','Products','orders'));

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
        $keywordsSetting = Settings::where('key', 'keywords')->value('value');
        $seoSetting = Settings::where('key', 'seo')->value('value');
        $DesSetting = Settings::where('key', 'Description')->value('value');
        return view("frontend.pages.blog.details",compact('slider_img'
        ,'SocialFac','SocialTwi','SocialInsta',
        'SocialYout','Partners'
        ,'Contactus','Footers','blogs'
        ,'keywordsSetting','seoSetting','DesSetting'));

    }

    public function commerce() : View {
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
        $titles = Settings::all();
        $logos = Logo::where('id',4)->get();
        // foreach($logos as $logo);
        $Products= Product::all();
        $orders= Product::all();

        $keywordsSetting = Settings::where('key', 'keywords')->value('value');
        $seoSetting = Settings::where('key', 'seo')->value('value');
        $DesSetting = Settings::where('key', 'Description')->value('value');
        return view("frontend.pages.e-commerce.e-commerce",
        compact('aboutus','sliders','slider_img'
        ,'SocialFac','SocialTwi','SocialInsta',
        'SocialYout','Partners','Gallerys'
        ,'Teams','Contactus','Footers'
        ,'blogs_home','Services','logos'
        ,'titles','keywordsSetting','seoSetting'
        ,'DesSetting','Products','orders'));
    }

    public function cart() : View {
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
        $titles = Settings::all();
        $logos = Logo::where('id',4)->get();
        // foreach($logos as $logo);
        // $Products= Product::all();
        // $orders= order_items::all();
        // foreach ($Products as $product);

        $orders = order_items::all();
        $productIds = $orders->pluck('product_id')->toArray();

        $Products = Product::whereIn('id', $productIds)->get();
        //foreach ($Products as $product);

        $keywordsSetting = Settings::where('key', 'keywords')->value('value');
        $seoSetting = Settings::where('key', 'seo')->value('value');
        $DesSetting = Settings::where('key', 'Description')->value('value');
        return view("frontend.pages.e-commerce.cart",
        compact('aboutus','sliders','slider_img'
        ,'SocialFac','SocialTwi','SocialInsta',
        'SocialYout','Partners','Gallerys'
        ,'Teams','Contactus','Footers'
        ,'blogs_home','Services','logos'
        ,'titles','keywordsSetting','seoSetting'
        ,'DesSetting','Products','orders'));
    }

    public function delete( $id){
        order_items::findOrFail($id)->delete();

        $notification = array(
            'message_id' => 'Done Deleted',
            'alert-type' => 'info'
        );

    return redirect()->route('show.cart')->with($notification);

        }
}
