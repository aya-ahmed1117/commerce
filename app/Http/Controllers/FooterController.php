<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function show_footer(){

        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){

                $Footers= Footer::all();

                return view('dashboard.pages.settings.footer.show_footer',compact('Footers')) ;
               }

            }else{
                return view('dashboard.pages.login');
                // return redirect()->route('frontend.homepage');
            }

            }
            public function store_footer(){
                if (Auth()->check()) {
                    if(Auth()->user()->is_admin == 1){
                        return view('dashboard.pages.settings.footer.add_footer');
                    }

                    }else{
                        return view('dashboard.pages.login');
                        // return redirect()->route('frontend.homepage');
                    }
            }
            public function add_footer(request $request){

                $request->validate([
                    'name'=>'string|min:3|max:50',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                    'created_at' =>now()
                ]);


                // $datafile_path='public/images/';
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $saveFolder = 'footer';
                $path = "$saveFolder/$imageName";

                $request->file('image')->storeAs("public/$saveFolder", $imageName);

                footer::insert([
                    'name' => $request->name,
                    'image' => $path,
                    'created_at' =>now()
                    ]);


                    $notification = array(
                        'message_id' => 'Done',
                        'alert-type' => 'success'
                    );


                return redirect()->route('show.footer')->with($notification);
            }
            public function update_footer($id){

                if (Auth()->check()) {
                    if(Auth()->user()->is_admin == 1){

                $Footers = footer::find($id);

                return view('dashboard.pages.settings.footer.update_footer' , compact('Footers'));
                    }

                    }else{
                        return view('dashboard.pages.login');

                    }

            }

            public function edit_footer(request $request , $id){

                if($request->file('image')){


                    $request->validate([
                        'name'=>'string|min:3|max:340',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                        'updated_at' =>now(),
                    ]);

                    $imageName2 = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $saveFolder2 = 'footer';
                    $path2 = "$saveFolder2/$imageName2";

                    $request->file('image')->storeAs("public/$saveFolder2", $imageName2);

                    $id=$request->id;
                    footer::findOrFail($id)->update([
                        'name'=>$request->name,
                        'image' =>$path2,
                        'updated_at'=>now()
                    ]);
                    $notification = array(
                        'message_id' => 'Done Updated',
                        'alert-type' => 'info'
                    );


                return redirect()->route('show.footer')->with($notification);


                }
                else{
                    footer::findOrFail($id)->update([
                        'name'=>$request->name,
                        'updated_at'=>now()
                    ]);
                            $notification = array(
                            'message_id' => 'Done updated',
                            'alert-type' => 'info'
                        );

                return redirect()->route('show.footer')->with($notification);
            }

                }
                public function delete_footer( $id){
                    footer::findOrFail($id)->delete();

                    $notification = array(
                        'message_id' => 'Done Deleted',
                        'alert-type' => 'error'
                    );

                return redirect()->route('show.footer')->with($notification);

                    }

}
