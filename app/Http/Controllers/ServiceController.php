<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;


class ServiceController extends Controller
{
    public function show_service(){

        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){
                $Services = Service::all();
                return view('dashboard.pages.settings.service.show_service',compact('Services'));
              }

            }else{
                return view('dashboard.pages.login');
                // return redirect()->route('frontend.homepage');
            }


    }


    public function  store_service(){
        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){
                return view('dashboard.pages.settings.service.add_service');
              }

            }else{
                return view('dashboard.pages.login');
                // return redirect()->route('frontend.homepage');
            }

    }

    public function  add_service(request $request){
        $request->validate([
            'name'=>'string|min:3|max:150',
            'title'=>'string|min:3|max:150',
            'descriptionEN'=>'string|min:3|max:400',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'created_at' =>now(),
        ]);


          $imageName1 = time() . '.' . $request->file('image')->getClientOriginalExtension();
          $saveFolder1 = 'service';
          $path1 = "$saveFolder1/$imageName1";

         $request->file('image')->storeAs("public/$saveFolder1", $imageName1);

          Service::insert([
              'name' => $request->name,
              'title' => $request->title,
              'descriptionEN' => $request->descriptionEN,
              'image' => $path1,
              'created_at' =>now()
          ]);

          $notification = array(
            'message_id' => 'Done',
            'alert-type' => 'success'
        );



        return redirect()->route('show.service')->with($notification);

    }

    public function update_service($id){

        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){

        $Services = Service::find($id);

        return view('dashboard.pages.settings.service.update_service' , compact('Services'));
              }

            }else{
                return view('dashboard.pages.login');
                // return redirect()->route('frontend.homepage');
            }

    }

    public function edit_service(request $request , $id){

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
              $saveFolder2 = 'service';
              $path2 = "$saveFolder2/$imageName2";

              $request->file('image')->storeAs("public/$saveFolder2", $imageName2);

              $id=$request->id;
              Service::findOrFail($id)->update([
                'name'=>$request->name,
                'title'=>$request->title,
                'descriptionEN'=>$request->descriptionEN,
                'image' =>$path2,
                'updated_at'=>now()
              ]);
              $notification = array(
                'message_id' => 'Done updated',
                'alert-type' => 'info'
            );


        return redirect()->route('show.service')->with($notification);


    	}
    	else{
            Service::findOrFail($id)->update([
                'name'=>$request->name,
                'title'=>$request->title,
                'descriptionEN'=>$request->descriptionEN,
                'updated_at'=>now(),
              ]);
                    $notification = array(
                    'message_id' => 'Done updated',
                    'alert-type' => 'info'
                );

        return redirect()->route('show.service')->with($notification);
    }




}
public function delete_service( $id){
    service::findOrFail($id)->delete();
    //meal::find($id)->delete();

    $notification = array(
        'message_id' => 'Done Deleted',
        'alert-type' => 'error'
    );
return redirect()->route('show.service')->with($notification);

    }

}
