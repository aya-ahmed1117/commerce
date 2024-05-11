<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class JsonController extends Controller
{

    // In the JsonController

public function index()
{
    // $jsonData = [
    //     'name' => 'John Doe',
    //     'email' => 'john@example.com',
    //     'age' => 30
    // ];
    $jsonData = json_decode(file_get_contents(public_path('products.json')), true);

    return view('dashboard.pages.e-commerce.commerce', ['jsonData' => $jsonData]);


    // return view('dashboard.pages.e-commerce.commerce', ['jsonData' => json_encode($jsonData)]);
}
// public function fetchProducts()
//     {
//         $products = Product::all();
//         return response()->json($products);

//     }


}
