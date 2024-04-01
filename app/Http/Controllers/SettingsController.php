<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Slider;
use
App\Models\about;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    //'dashboard.pages.tables'


    public function shows()
    {

        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){
            // return view('dashboard.pages.home');
            $users = user::all();
                return view('dashboard.pages.tables',compact('users'));
              }

            }else{
                return view('dashboard.pages.login');
            }


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

        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){
                $sliders = slider::all();

                return view('dashboard.pages.settings.slider_show',compact('sliders'));
              }

            }else{
                return view('dashboard.pages.login');
                // return redirect()->route('frontend.homepage');
            }




    }
    public function slider_store(){

        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){
                return view('dashboard.pages.settings.slider_store');
              }

            }else{
                return view('dashboard.pages.login');
                // return redirect()->route('frontend.homepage');
            }

    }
    public function add_slider(request $request){

        $request->validate([
    		'name'=>'string|min:3|max:50',
    		'description'=>'min:3|max:400',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    		'created_at' =>now()
    	]);


          // $datafile_path='public/images/';
          $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
          $saveFolder = 'image';
          $path = "$saveFolder/$imageName";

          $request->file('image')->storeAs("public/$saveFolder", $imageName);

          slider::insert([
              'name' => $request->name,
              'description' => $request->description,
              'image' => $path
          ]);

        return redirect()->route('show.slider')->with('message','Done');

        }
        public function delete_slider(request $request ,$id){
        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){

            Slider::find($id)->delete();
            return redirect()->route('show.slider')->with('message','Done Deleted');
              }

            }else{
                return view('dashboard.pages.login');
                // return redirect()->route('frontend.homepage');
            }

        }

        public function show_about(){

            if (Auth()->check()) {
                if(Auth()->user()->is_admin == 1){
                    $aboutus = about::all();
                    return view('dashboard.pages.settings.about.show_about',compact('aboutus'));
                  }

                }else{
                    return view('dashboard.pages.login');
                    // return redirect()->route('frontend.homepage');
                }

        }


        public function  store_about(){
            if (Auth()->check()) {
                if(Auth()->user()->is_admin == 1){
                    return view('dashboard.pages.settings.about.add_about');
                  }

                }else{
                    return view('dashboard.pages.login');
                    // return redirect()->route('frontend.homepage');
                }

        }

        public function  add_about(request $request){
            $request->validate([
                'name'=>'string|min:3|max:350',
                'title'=>'string|min:3|max:350',
                'descriptionEN'=>'string|min:3|max:400',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                'created_at' =>now(),
            ]);

              $imageName1 = time() . '.' . $request->file('image')->getClientOriginalExtension();
              $saveFolder1 = 'About';
              $path1 = "$saveFolder1/$imageName1";

              $request->file('image')->storeAs("public/$saveFolder1", $imageName1);

              About::insert([
                  'name' => $request->name,
                  'title' => $request->title,
                  'descriptionEN' => $request->descriptionEN,
                  'image' => $path1,
                  'created_at' =>now()
              ]);

            return redirect()->route('show.about')->with('message','Done');

        }

        public function updated_about($id){

            if (Auth()->check()) {
                if(Auth()->user()->is_admin == 1){

            $aboutus = About::find($id);
            // $cats2 = category::latest()->get();
            return view('dashboard.pages.settings.about.update_about' , compact('aboutus'));
                  }

                }else{
                    return view('dashboard.pages.login');
                    // return redirect()->route('frontend.homepage');
                }

        }

        public function edit_about(request $request , $id){

            $aboutus = About::all();
            //return view('dashboard.pages.settings.about.updat_about',compact('aboutus'));

            $old_image = $request->old_image;
    	if($request->file('image')){
    		// unlink($old_image);//remove pld file
    		//add new image
    		$sora = $request->file('image');

            $request->validate([
                'name'=>'string|min:3|max:340',
                'title'=>'string|min:3|max:350',
                'descriptionEN'=>'string|min:3|max:1000',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                'updated_at' =>now(),
              ]);

              $imageName2 = time() . '.' . $request->file('image')->getClientOriginalExtension();
              $saveFolder2 = 'About';
              $path2 = "$saveFolder2/$imageName2";

              $request->file('image')->storeAs("public/$saveFolder2", $imageName2);

              $id=$request->id;
              About::findOrFail($id)->update([
                'name'=>$request->name,
                'title'=>$request->title,
                'descriptionEN'=>$request->descriptionEN,
                'image' =>$path2,
                'updated_at'=>now()
              ]);
              $notification = array(
                'message_id' => 'تم تعديل الوجبة بنجاح',
                'alert-type' => 'info'
            );


        return redirect()->route('show.about')->with($notification);


    	}
    	else{
            about::findOrFail($id)->update([
                'name'=>$request->name,
                'title'=>$request->title,
                'descriptionEN'=>$request->descriptionEN,
                'updated_at'=>now()
              ]);
                    $notification = array(
                    'message_id' => 'تم تعديل الوجبة بنجاح',
                    'alert-type' => 'info'
                );

        return redirect()->route('show.about')->with($notification);
    }

    }
    public function delete_about($id){
        //About::findOrFail($id)->delete();
        About::find($id)->delete();

        $notification = array(
            'message_id' => 'تم تعديل الوجبة بنجاح',
            'alert-type' => 'info'
        );

return redirect()->route('show.about')->with($notification);
    }

}
