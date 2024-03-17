<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Slider;
Use App\Http\Controllers\Input;

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
        //dashboard.pages.settings.users_update
      return view('dashboard.pages.settings.slider_show',compact('sliders'));
    //   return view('dashboard.pages.settings.users_update',compact('sliders'));

    }
    public function slider_store(){


       return view('dashboard.pages.settings.slider_store');


    }
    public function add_slider(request $request){
        $sliders = slider::all();

        $request->validate([
    		'name'=>'string|min:3|max:50',
    		'description'=>'min:3|max:400',
            'imge' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    		//'imge'=>'mimes:png,jpg,jpeg,gif,ico,icon',
    	]);
        // $images = $request->file('imge');
    	//   $image_name = time().'.'.$images->getClientOriginalExtension();
    	//   $images->resize(300, 200)->save('upload/'.$image_name);
    	//   $save_url = 'upload/'.$image_name;

        //   slider::insert([
    	//   	'name'=>$request->name,
    	//   	'description'=>$request->description
    	//   ]);

        // $image_name = time().'.'.$request->file('imge')->getClientOriginalExtension();
        // $request->file('imge')->move(public_path('upload'), $image_name);

        // slider::insert([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'image' => 'upload/'.$image_name,
        // ]);

        if($request->hasFile('image')){
            if (slider::file('image')->isValid()) {
                $file = slider::file('image');
                $destination = 'upload'.'/';
                $ext= $file->getClientOriginalExtension();
                $mainFilename = time();
                $file->move($destination, $mainFilename.".".$ext);
                echo "uploaded successfully";
            }
            slider::insert([
                'name' => $request->name,
                'description' => $request->description,
                'image' => 'upload/'.$file,
            ]);

            }


     return back()->route('show.slider')->with('message','تم إضافة صنف جديد');



        }
}
