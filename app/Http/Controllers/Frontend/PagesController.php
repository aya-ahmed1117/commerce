<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function index() : View {
        return view("frontend.pages.index");
    }

    public function about() : View {
        return view("frontend.pages.about");
    }

    public function contact() : View {
        return view("frontend.pages.contact");
    }

    public function products() : View {
        return view("frontend.pages.products");
    }

    public function services() : View {
        return view("frontend.pages.service.index");
    }

    public function serviceDetails() : View {
        return view("frontend.pages.service.details");
    }

    public function blogs() : View {
        return view("frontend.pages.blog.index");
    }

    public function blogDetails() : View {
        return view("frontend.pages.blog.details");
    }
}
