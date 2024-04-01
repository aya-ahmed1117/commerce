<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    //
    public function index(){
        $sliders = Slider::all();
        return view('frontend.includes.home.slider',compact('sliders')) ;
    }
    public function testimonials() {
        $titleName = "Testimonials";
        $images = Slider::all();

        return view('testimonials', compact('titleName'))->with('images', $images);
    }

}
