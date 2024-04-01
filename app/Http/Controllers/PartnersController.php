<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partners;


class PartnersController extends Controller
{
    public function show_partner(){

        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){

                $Partners= Partners::all();

                return view('dashboard.pages.settings.partners.show_partner',compact('Partners')) ;
               }

            }else{
                return view('dashboard.pages.login');

            }

            }
            public function store_partner(){
                if (Auth()->check()) {
                    if(Auth()->user()->is_admin == 1){
                        return view('dashboard.pages.settings.partners.add_partner');
                    }

                    }else{
                        return view('dashboard.pages.login');

                    }
            }
            public function add_partner(request $request){

                $request->validate([
                    'name'=>'string|min:3|max:50',
                    'link'=>'string|min:3|max:1000',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                    'created_at' =>now()
                ]);


                // $datafile_path='public/images/';
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $saveFolder = 'partners';
                $path = "$saveFolder/$imageName";

                $request->file('image')->storeAs("public/$saveFolder", $imageName);
                partners::insert([
                    'name' => $request->name,
                    'image' => $path,
                    'link' => $request->link,
                    'created_at' =>now()
                    ]);


                    $notification = array(
                        'message_id' => 'Done',
                        'alert-type' => 'success'
                    );


                return redirect()->route('show.partner')->with($notification);
            }
            public function update_partner($id){

                if (Auth()->check()) {
                    if(Auth()->user()->is_admin == 1){

                $Partners = partners::find($id);

                return view('dashboard.pages.settings.partners.update_partner' , compact('Partners'));
                    }

                    }else{
                        return view('dashboard.pages.login');

                    }

            }

            public function edit_partner(request $request , $id){

                if($request->file('image')){


                    $request->validate([
                        'name'=>'string|min:3|max:340',
                        'link'=>'string|min:3|max:340',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                        'updated_at' =>now(),
                    ]);

                    $imageName2 = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $saveFolder2 = 'partners';
                    $path2 = "$saveFolder2/$imageName2";

                    $request->file('image')->storeAs("public/$saveFolder2", $imageName2);

                    $id=$request->id;
                    partners::findOrFail($id)->update([
                        'name'=>$request->name,
                        'link'=>$request->link,
                        'image' =>$path2,
                        'updated_at'=>now()
                    ]);
                    $notification = array(
                        'message_id' => 'Done Updated',
                        'alert-type' => 'info'
                    );


                return redirect()->route('show.partner')->with($notification);

                }
                else{
                    partners::findOrFail($id)->update([
                        'name'=>$request->name,
                        'link'=>$request->link,
                        'updated_at'=>now()
                    ]);
                            $notification = array(
                            'message_id' => 'Done updated',
                            'alert-type' => 'info'
                        );

                return redirect()->route('show.partner')->with($notification);
            }

                }
                public function delete_partners( $id){
                    partners::findOrFail($id)->delete();

                    $notification = array(
                        'message_id' => 'Done Deleted',
                        'alert-type' => 'error'
                    );

                return redirect()->route('show.partner')->with($notification);

                    }
}
