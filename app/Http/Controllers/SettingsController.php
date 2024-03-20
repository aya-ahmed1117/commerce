<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    //'dashboard.pages.tables'


    public function shows()
    {
        $users = user::all();
      return view('dashboard.pages.tables',compact('users'));
    }
    //store
    public function store(request $request){
        $request->validate(['name' =>'required|string|unique:users|min:3|max:40',]);
        user::insert([
        'name' => $request->name,
        'is_admin' => $request->is_admin,
        'email' => $request->email,
        'password' => $request->password,
        'created_at' =>now()
      ]);

    return back()->with('message','تم إضافة صنف جديد');

    }
 //get data to edit
    public function update(request $request){
        // $users = user::all();

        $request->validate([
          'name'=>'required|string|unique:users|min:3|max:40',
        ]);
        $id=$request->id;
        user::findOrFail($id)->update([
          'name'=>$request->name,
          'email'=>$request->email
        ]);
        return view('dashboard.pages.tables')->with('message','تم تعديل الصنف');
      }
      //delete
      public function delete(request $request,$id){

        User::find($id)->delete();
        return redirect()->route('shows')->with('message','Done Deleted');

      }

      public function show_slider(){
        $sliders = slider::all();
        $imageUrl = Storage::url($sliders->image);

      return view('dashboard.pages.settings.slider_show',compact('sliders','imageUrl'));


    }
    public function slider_store(){


       return view('dashboard.pages.settings.slider_store');


    }
    public function add_slider(request $request){
        $sliders = slider::all();

        $request->validate([
    		'name'=>'string|min:3|max:50',
    		'description'=>'min:3|max:400',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    		'created_at' =>now()
    	]);
    //   $input = $request->all();
    //     if($request->hasFile['image']){
    //       $datafile_path='public/images/products';
    //       $image = $request->file('image');
    //       $image_name=$image->getClientOriginalExtension();
    //       $path=$request->file('image')->storeAs($datafile_path,$image_name);

    //       //$input['image'] = $image_name;
    //       slider::create($input);
    //       slider::insert([
    //        'name' => $request->name,
    //        'description' => $request->description,
    //        'image' => $path
    //    ]);
    //     }

        // $datafile_path='public/images/products';
        // $image = $request->file('image');
        // $image_name=$image->getClientOriginalExtension();
        // $path=$request->file('image')->storeAs($datafile_path,$image_name);



       // $datafile_path='public/images/';
        $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('image',$imageName);
        slider::insert([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path
               ]);


        return redirect()->route('show.slider')->with('message','Done');

        }
        public function delete_slider(request $request ,$id){
            //$slider=
             Slider::find($id)->delete();
            //$imageUrl = Storage::url($slider->image);
            return redirect()->route('show.slider')->with('message','Done Deleted');

        }
}
