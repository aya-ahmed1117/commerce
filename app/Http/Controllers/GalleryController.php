<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function show_gallery(){

        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){

                $Gallerys= Gallery::all();

                return view('dashboard.pages.settings.gallery.show_gallery',compact('Gallerys')) ;
               }

            }else{
                return view('dashboard.pages.login');
                // return redirect()->route('frontend.homepage');
            }

            }
            public function store_gallery(){
                if (Auth()->check()) {
                    if(Auth()->user()->is_admin == 1){
                        return view('dashboard.pages.settings.gallery.add_gallery');
                    }

                    }else{
                        return view('dashboard.pages.login');
                        // return redirect()->route('frontend.homepage');
                    }
            }
            public function add_gallery(request $request){

                $request->validate([
                    'name'=>'string|min:3|max:50',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                    'created_at' =>now()
                ]);


                // $datafile_path='public/images/';
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $saveFolder = 'gallery';
                $path = "$saveFolder/$imageName";

                $request->file('image')->storeAs("public/$saveFolder", $imageName);

                // $request->validate(['name' =>'required|string|unique:gallery|min:3|max:40',
                // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
                Gallery::insert([
                    'name' => $request->name,
                    'image' => $path,
                    'created_at' =>now()
                    ]);


                    $notification = array(
                        'message_id' => 'Done',
                        'alert-type' => 'success'
                    );


                return redirect()->route('show.gallery')->with($notification);
            }
            public function update_gallery($id){

                if (Auth()->check()) {
                    if(Auth()->user()->is_admin == 1){

                $Gallerys = Gallery::find($id);

                return view('dashboard.pages.settings.gallery.update_gallery' , compact('Gallerys'));
                    }

                    }else{
                        return view('dashboard.pages.login');
                        // return redirect()->route('frontend.homepage');
                    }

            }

            public function edit_gallery(request $request , $id){

                if($request->file('image')){


                    $request->validate([
                        'name'=>'string|min:3|max:340',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                        'updated_at' =>now(),
                    ]);

                    $imageName2 = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $saveFolder2 = 'gallery';
                    $path2 = "$saveFolder2/$imageName2";

                    $request->file('image')->storeAs("public/$saveFolder2", $imageName2);

                    $id=$request->id;
                    Gallery::findOrFail($id)->update([
                        'name'=>$request->name,
                        'image' =>$path2,
                        'updated_at'=>now()
                    ]);
                    $notification = array(
                        'message_id' => 'Done Updated',
                        'alert-type' => 'info'
                    );


                return redirect()->route('show.gallery')->with($notification);


                }
                else{
                    Gallery::findOrFail($id)->update([
                        'name'=>$request->name,
                        'updated_at'=>now()
                    ]);
                            $notification = array(
                            'message_id' => 'Done updated',
                            'alert-type' => 'info'
                        );

                return redirect()->route('show.gallery')->with($notification);
            }

                }
                public function delete_gallery( $id){
                    Gallery::findOrFail($id)->delete();

                    $notification = array(
                        'message_id' => 'Done Deleted',
                        'alert-type' => 'error'
                    );

                return redirect()->route('show.gallery')->with($notification);

                    }
}
