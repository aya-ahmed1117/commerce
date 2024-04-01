<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function show_teams(){

        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){

                $Teams= Team::all();
                return view('dashboard.pages.settings.teams.show_teams',compact('Teams'));
              }

            }else{
                return view('dashboard.pages.login');
                // return redirect()->route('frontend.homepage');
            }

            }
            public function store_teams(){
                if (Auth()->check()) {
                    if(Auth()->user()->is_admin == 1){
                        return view('dashboard.pages.settings.teams.add_teams');
                    }

                    }else{
                        return view('dashboard.pages.login');
                        // return redirect()->route('frontend.homepage');
                    }
            }
            public function add_teams(request $request){

                $request->validate([
                    'name'=>'string|min:3|max:50',
                    'title'=>'string|min:3|max:400',
                    'address'=>'string|min:3|max:1000',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                    'created_at' =>now()
                ]);


                // $datafile_path='public/images/';
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $saveFolder = 'Teams';
                $path = "$saveFolder/$imageName";

                $request->file('image')->storeAs("public/$saveFolder", $imageName);

                $request->validate(['name' =>'required|string|unique:teams|min:3|max:40',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
                Team::insert([
                    'name' => $request->name,
                    'title' => $request->title,
                    'image' => $path,
                    'address' => $request->address,
                    'created_at' =>now()
                    ]);

                    return redirect()->route('show.team')->with('message','Done Added');
            }
            public function update_teams($id){

                if (Auth()->check()) {
                    if(Auth()->user()->is_admin == 1){

                $Teams = Team::find($id);

                return view('dashboard.pages.settings.teams.update_teams' , compact('Teams'));
                    }

                    }else{
                        return view('dashboard.pages.login');
                        // return redirect()->route('frontend.homepage');
                    }

            }

            public function edit_teams(request $request , $id){

                if($request->file('image')){


                    $request->validate([
                        'name'=>'string|min:3|max:340',
                        'title'=>'string|min:3|max:350',
                        'address'=>'string|min:3|max:1000',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                        'updated_at' =>now(),
                    ]);

                    $imageName2 = time() . '.' . $request->file('image')->getClientOriginalExtension();
                    $saveFolder2 = 'Teams';
                    $path2 = "$saveFolder2/$imageName2";

                    $request->file('image')->storeAs("public/$saveFolder2", $imageName2);

                    $id=$request->id;
                    Team::findOrFail($id)->update([
                        'name'=>$request->name,
                        'title'=>$request->title,
                        'address'=>$request->address,
                        'image' =>$path2,
                        'updated_at'=>now()
                    ]);
                    $notification = array(
                        'message_id' => 'Done Updated',
                        'alert-type' => 'info'
                    );


                return redirect()->route('show.team')->with($notification);


                }
                else{
                    Team::findOrFail($id)->update([
                        'name'=>$request->name,
                        'title'=>$request->title,
                        'address'=>$request->address,
                        'updated_at'=>now()
                    ]);
                            $notification = array(
                            'message_id' => 'Done updated',
                            'alert-type' => 'info'
                        );

                return redirect()->route('show.team')->with($notification);
            }

                }
                public function delete_teams( $id){
                    Team::findOrFail($id)->delete();

                    $notification = array(
                        'message_id' => 'Done Deleted',
                        'alert-type' => 'info'
                    );

                return redirect()->route('show.team')->with($notification);

                    }
        }
