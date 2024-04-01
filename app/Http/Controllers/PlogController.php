<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plog;


class PlogController extends Controller
{
    public function show_plog(){

        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){

                $Plogs= Plog::all();
                return view('dashboard.pages.settings.plogs.show_plog',compact('Plogs'));
              }

            }else{
                return view('dashboard.pages.login');
                // return redirect()->route('frontend.homepage');
            }

            }
            public function store_plog(){
                if (Auth()->check()) {
                    if(Auth()->user()->is_admin == 1){
                        return view('dashboard.pages.settings.plogs.add_plog');
                    }

                    }else{
                        return view('dashboard.pages.login');
                        // return redirect()->route('frontend.homepage');
                    }
            }

            public function add_plog(request $request){

                $request->validate([
                    'name'=>'string|min:3|max:250',
                    'title'=>'string|min:3|max:400',
                    'descriptionAR'=>'string|min:3|max:1000',
                    'descriptionEN'=>'string|min:3|max:1000',
                    'descriptionIT'=>'string|min:3|max:1000',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                    'created_at' =>now()
                ]);


                // $datafile_path='public/images/';
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $saveFolder = 'plog';
                $path = "$saveFolder/$imageName";

                $request->file('image')->storeAs("public/$saveFolder", $imageName);

                $request->validate(['name' =>'required|string|unique:plogs|min:3|max:40',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
                Plog::insert([
                    'name' => $request->name,
                    'title' => $request->title,
                    'image' => $path,
                    'descriptionAR' => $request->descriptionAR,
                    'descriptionEN' => $request->descriptionEN,
                    'descriptionIT' => $request->descriptionIT,
                    'created_at' =>now()
                    ]);

                    return redirect()->route('show.plog')->with('message','Done Added');
            }
            public function update_plog($id){

                if (Auth()->check()) {
                    if(Auth()->user()->is_admin == 1){

                $Plogs = Plog::find($id);

                return view('dashboard.pages.settings.plogs.update_plog' , compact('Plogs'));
                    }

                    }else{
                        return view('dashboard.pages.login');
                        // return redirect()->route('frontend.homepage');
                    }

            }

            public function edit_plog(request $request , $id){

                if($request->file('image')){


                    $request->validate([
                        'name'=>'string|min:3|max:340',
                        'title'=>'string|min:3|max:350',
                        'descriptionAR'=>'string|min:3|max:1000',
                        'descriptionEN'=>'string|min:3|max:1000',
                        'descriptionIT'=>'string|min:3|max:1000',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                        'updated_at' =>now(),
                    ]);

                    $imageName2 = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $saveFolder2 = 'plog';
                    $path2 = "$saveFolder2/$imageName2";

                    $request->file('image')->storeAs("public/$saveFolder2", $imageName2);

                    $id=$request->id;
                        Plog::findOrFail($id)->update([
                            'name'=>$request->name,
                            'title'=>$request->title,
                            'descriptionAR' => $request->descriptionAR,
                            'descriptionEN' => $request->descriptionEN,
                            'descriptionIT' => $request->descriptionIT,
                            'image' =>$path2,
                            'updated_at'=>now()
                        ]);
                        $notification = array(
                            'message_id' => 'Done Updated',
                            'alert-type' => 'info'
                        );


                return redirect()->route('show.plog')->with($notification);


                }
                else{
                    Plog::findOrFail($id)->update([
                        'name'=>$request->name,
                        'title'=>$request->title,
                        'descriptionAR' => $request->descriptionAR,
                        'descriptionEN' => $request->descriptionEN,
                        'descriptionIT' => $request->descriptionIT,
                        'updated_at'=>now()
                    ]);
                            $notification = array(
                            'message_id' => 'Done updated',
                            'alert-type' => 'info'
                        );

                return redirect()->route('show.plog')->with($notification);
            }

                }
                public function delete_plog( $id){
                    Plog::findOrFail($id)->delete();

                    $notification = array(
                        'message_id' => 'Done Deleted',
                        'alert-type' => 'info'
                    );

                return redirect()->route('show.plog')->with($notification);

                    }
}
