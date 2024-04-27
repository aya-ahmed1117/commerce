<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;


class BlogController extends Controller
{
    public function show_blog(){

        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){

                $blogs= blog::all();
                return view('dashboard.pages.settings.blogs.show_blog',compact('blogs'));
              }

            }else{
                return view('dashboard.pages.login');
                // return redirect()->route('frontend.homepage');
            }

            }
            public function store_blog(){
                if (Auth()->check()) {
                    if(Auth()->user()->is_admin == 1){
                        return view('dashboard.pages.settings.blogs.add_blog');
                    }

                    }else{
                        return view('dashboard.pages.login');
                        // return redirect()->route('frontend.homepage');
                    }
            }

            public function add_blog(request $request){

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
                $saveFolder = 'blog';
                $path = "$saveFolder/$imageName";

                $request->file('image')->storeAs("public/$saveFolder", $imageName);

                $request->validate(['name' =>'required|string|unique:blogs|min:3|max:40',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
                blog::insert([
                    'name' => $request->name,
                    'title' => $request->title,
                    'image' => $path,
                    'descriptionAR' => $request->descriptionAR,
                    'descriptionEN' => $request->descriptionEN,
                    'descriptionIT' => $request->descriptionIT,
                    'created_at' =>now()
                    ]);

                    return redirect()->route('show.blog')->with('message','Done Added');
            }
            public function update_blog($id){

                if (Auth()->check()) {
                    if(Auth()->user()->is_admin == 1){

                $blogs = blog::find($id);

                return view('dashboard.pages.settings.blogs.update_blog' , compact('blogs'));
                    }

                    }else{
                        return view('dashboard.pages.login');
                        // return redirect()->route('frontend.homepage');
                    }

            }

            public function edit_blog(request $request , $id){

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
                    $saveFolder2 = 'blog';
                    $path2 = "$saveFolder2/$imageName2";

                    $request->file('image')->storeAs("public/$saveFolder2", $imageName2);

                    $id=$request->id;
                        blog::findOrFail($id)->update([
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


                return redirect()->route('show.blog')->with($notification);


                }
                else{
                    blog::findOrFail($id)->update([
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

                return redirect()->route('show.blog')->with($notification);
            }

                }
                public function delete_blog( $id){
                    blog::findOrFail($id)->delete();

                    $notification = array(
                        'message_id' => 'Done Deleted',
                        'alert-type' => 'info'
                    );

                return redirect()->route('show.blog')->with($notification);

                    }
}
