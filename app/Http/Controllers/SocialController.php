<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Social;


class SocialController extends Controller
{
    public function show_Social(){

        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){

                $Socials= Social::all();

                return view('dashboard.pages.settings.social.show_social',compact('Socials')) ;
               }

            }else{
                return view('dashboard.pages.login');
                // return redirect()->route('frontend.homepage');
            }

            }
            public function store_Social(){
                if (Auth()->check()) {
                    if(Auth()->user()->is_admin == 1){
                        return view('dashboard.pages.settings.social.add_social');
                    }

                    }else{
                        return view('dashboard.pages.login');
                        // return redirect()->route('frontend.homepage');
                    }
            }
            public function add_Social(request $request){

                $request->validate([
                    'name'=>'string|min:3|max:50',
                    'link'=>'string|min:3|max:1000',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                    'created_at' =>now()
                ]);


                // $datafile_path='public/images/';
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $saveFolder = 'Social';
                $path = "$saveFolder/$imageName";

                $request->file('image')->storeAs("public/$saveFolder", $imageName);

                // $request->validate(['name' =>'required|string|unique:Social|min:3|max:40',
                // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
                Social::insert([
                    'name' => $request->name,
                    'image' => $path,
                    'link' => $request->link,
                    'created_at' =>now()
                    ]);


                    $notification = array(
                        'message_id' => 'Done',
                        'alert-type' => 'success'
                    );


                return redirect()->route('show.social')->with($notification);
            }
            public function update_Social($id){

                if (Auth()->check()) {
                    if(Auth()->user()->is_admin == 1){

                $Socials = Social::find($id);

                return view('dashboard.pages.settings.social.update_social' , compact('Socials'));
                    }

                    }else{
                        return view('dashboard.pages.login');
                        // return redirect()->route('frontend.homepage');
                    }

            }

            public function edit_Social(request $request , $id){

                if($request->file('image')){


                    $request->validate([
                        // 'name'=>'string|min:3|max:340',
                        'link'=>'string|min:3|max:1000',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                        'updated_at' =>now(),
                    ]);

                    $imageName2 = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $saveFolder2 = 'Social';
                    $path2 = "$saveFolder2/$imageName2";

                    $request->file('image')->storeAs("public/$saveFolder2", $imageName2);

                    $id=$request->id;
                    Social::findOrFail($id)->update([
                        // 'name'=>$request->name,
                        'link'=>$request->link,
                        'image' =>$path2,
                        'updated_at'=>now()
                    ]);
                    $notification = array(
                        'message_id' => 'Done Updated',
                        'alert-type' => 'info'
                    );


                return redirect()->route('show.social')->with($notification);


                }
                else{
                    Social::findOrFail($id)->update([
                        // 'name'=>$request->name,
                        'link'=>$request->link,
                        'updated_at'=>now()
                    ]);
                            $notification = array(
                            'message_id' => 'Done updated',
                            'alert-type' => 'info'
                        );

                return redirect()->route('show.social')->with($notification);
            }

                }
                public function delete_Social( $id){
                    Social::findOrFail($id)->delete();

                    $notification = array(
                        'message_id' => 'Done Deleted',
                        'alert-type' => 'error'
                    );

                return redirect()->route('show.social')->with($notification);

                    }

            }
