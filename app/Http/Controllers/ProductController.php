<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function show_product(){

        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){

                $Products= Product::all();
                return view('dashboard.pages.settings.product.show_product',compact('Products'));
              }

            }else{
                return view('dashboard.pages.login');
                // return redirect()->route('frontend.homepage');
            }

     }
     public function store_product(){
        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){
                return view('dashboard.pages.settings.product.add_product');
              }

            }else{
                return view('dashboard.pages.login');
                // return redirect()->route('frontend.homepage');
            }
     }
     public function add_product(request $request){

        //$Product = Product::all();

        $request->validate([
    		'name'=>'string|min:3|max:50',
    		'title'=>'string|min:3|max:400',
            'price'=>'string|min:3|max:350',
            'descriptionAR'=>'string|min:3|max:1000',
            'descriptionEN'=>'string|min:3|max:1000',
            'descriptionIT'=>'string|min:3|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
    		'created_at' =>now()
    	]);


          // $datafile_path='public/images/';
          $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
          $saveFolder = 'products';
          $path = "$saveFolder/$imageName";

          $request->file('image')->storeAs("public/$saveFolder", $imageName);

         $request->validate(['name' =>'required|string|unique:users|min:3|max:40',
         'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
           Product::insert([
             'name' => $request->name,
             'title' => $request->title,
             'price' => $request->price,
             'image' => $path,
             'descriptionAR' => $request->descriptionAR,
             'descriptionEN' => $request->descriptionEN,
             'descriptionIT' => $request->descriptionIT,
             'created_at' =>now()
             ]);

             return redirect()->route('show.product')->with('message','Done');
     }
     public function update_product($id){

        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){

        $Products = Product::find($id);

        return view('dashboard.pages.settings.product.update_product' , compact('Products'));
              }

            }else{
                return view('dashboard.pages.login');
                // return redirect()->route('frontend.homepage');
            }

    }

    public function edit_product(request $request , $id){

        if($request->file('image')){


            $request->validate([
                'name'=>'string|min:3|max:340',
                'title'=>'string|min:3|max:350',
                'price'=>'string|min:3|max:350',
                'descriptionAR'=>'string|min:3|max:1000',
                'descriptionEN'=>'string|min:3|max:1000',
                'descriptionIT'=>'string|min:3|max:1000',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                'updated_at' =>now(),
              ]);

              $imageName2 = time() . '.' . $request->file('image')->getClientOriginalExtension();
              $saveFolder2 = 'product';
              $path2 = "$saveFolder2/$imageName2";

              $request->file('image')->storeAs("public/$saveFolder2", $imageName2);

              $id=$request->id;
              Product::findOrFail($id)->update([
                'name'=>$request->name,
                'title'=>$request->title,
                'price'=>$request->price,
                'descriptionAR'=>$request->descriptionAR,
                'descriptionEN'=>$request->descriptionEN,
                'descriptionIT'=>$request->descriptionIT,
                'image' =>$path2,
                'updated_at'=>now()
              ]);
              $notification = array(
                'message_id' => 'تم تعديل الوجبة بنجاح',
                'alert-type' => 'info'
            );


        return redirect()->route('show.product')->with($notification);


    	}
    	else{
            Product::findOrFail($id)->update([
                'name'=>$request->name,
                'title'=>$request->title,
                'price'=>$request->title,
                'descriptionAR'=>$request->descriptionAR,
                'descriptionEN'=>$request->descriptionEN,
                'descriptionIT'=>$request->descriptionIT,
                'updated_at'=>now()
              ]);
                    $notification = array(
                    'message_id' => 'تم تعديل الوجبة بنجاح',
                    'alert-type' => 'info'
                );

        return redirect()->route('show.product')->with($notification);
    }

        }
        public function delete_product( $id){
            Product::findOrFail($id)->delete();

            $notification = array(
                'message_id' => 'تم تعديل الوجبة بنجاح',
                'alert-type' => 'info'
            );

        return redirect()->route('show.product')->with($notification);

            }

}
