<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactus;


class ContactusController extends Controller
{
    public function show_contact(){

        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){

                $Contacts= Contactus::all();
                return view('dashboard.pages.settings.contact.show_contact',compact('Contacts'));
              }

            }else{
                return view('dashboard.pages.login');
                // return redirect()->route('frontend.homepage');
            }

     }
     public function store_contact(){
        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){
                return view('dashboard.pages.settings.contact.add_contact');
              }

            }else{
                return view('dashboard.pages.login');
                // return redirect()->route('frontend.homepage');
            }
     }
     public function add_contact(request $request){


        $request->validate([
    		'phone'=>'string|min:3|max:250',
    		'email'=>'string|min:3|max:250',
            'address'=>'string|min:3|max:350',
            'map'=>'string|min:3|max:1000',
    		'created_at' =>now()
    	]);

           Contactus::insert([
             'phone' => $request->phone,
             'email' => $request->email,
             'address' => $request->address,
             'map' => $request->map,
             'created_at' =>now()
             ]);

             $notification = array(
                'message_id' => 'Done',
                'alert-type' => 'success'
            );


             return redirect()->route('show.contact')->with($notification);
     }
     public function update_contact($id){

        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){

        $Contacts = Contactus::find($id);

        return view('dashboard.pages.settings.contact.update_contact' , compact('Contacts'));
              }

            }else{
                return view('dashboard.pages.login');
                // return redirect()->route('frontend.homepage');
            }

        }

        public function edit_contact(request $request , $id){


            Contactus::findOrFail($id)->update([
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'map' => $request->map,
                'updated_at'=>now()
              ]);
              $notification = array(
                'message_id' => 'Done updated',
                'alert-type' => 'info'
            );

        return redirect()->route('show.contact')->with($notification);


        }
        public function delete_contact( $id){
            Contactus::findOrFail($id)->delete();

            $notification = array(
                'message_id' => 'Done Deleted',
                'alert-type' => 'error'
            );

        return redirect()->route('show.contact')->with($notification);

            }


}
