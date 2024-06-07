<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order_items;
use App\Models\orders;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = order_items::all();
        // $Products= Product::all();
        $Products= Product::all('where id=','product_id');

        // dd($Products);
        return view('dashboard.pages.e-commerce.commerce',
         compact('cartItems','Products'));
    }
    // SELECT `id`, `order_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at` FROM `order_items` WHERE 1

    public function addToCart(Request $request)
    {
        // Validate request data
        // $request->validate([
        //     'order_id' => 'required|exists:Product,id',
        //     'quantity' => 'required|integer|min:1',
        // ]);
        order_items::insert([
            'product_id' => $request->product_id,
            'price' => $request->price,
            'quantity' => $request->quantities,

            'created_at' =>now()
            ]);


         return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

    public function show_cart(){

        $cartItems = order_items::all();
        $Products= Product::all('where id=','product_id');
        return view('frontend.pages.e-commerce.cart',
         compact('cartItems','Products'));


    }
    ///delete front end
    public function delete( $id){
        order_items::findOrFail($id)->delete();
        $notification = array(
            'message_id' => 'Done Deleted',
            'alert-type' => 'info'
        );
        return redirect()->back()->with('success', $notification);
        }
//Check Out
public function check_out(Request $request)
{
    if (Auth()->check()) {
            orders ::insert([
                'order_number' => $request->order,
                'total_amount' => $request->total_amount,
                'name' => Auth::user()->name,
                'status' => 'pending',
                'created_at' =>now()
        ]);
        // order_items->id = orders->order_number
         $orders = orders::all();
        // $orderItem = order_items::findOrFail($orders->id);
       // $orderItem = order_items::where('id', $orders->order_number)->first();

        foreach ($orders as $order) {
            $orderItem = Order_items::where('id', $order->order_number)->first();
            // Do something with $orderItem
        }


        if ($orderItem) {
            $orderItem->update([
                'name' => Auth::user()->name,
                'status' => 'check out',
                'updated_at' => now()
            ]);

            return redirect()->back()->with('success', 'Product added to cart successfully.');
        } else {
            $notification = [
                'message_id' => 'You need to sign in first',
                'alert-type' => 'info'
            ];
            return redirect()->back()->with($notification);
        }
    } else {
        $notification = [
            'message_id' => 'You need to sign in first',
            'alert-type' => 'info'
        ];
        return redirect()->back()->with($notification);
    }
}

public function updateCartCount(Request $request)
{
    // Handle the cart count update logic here
    $count = $request->input('count');
    // Perform the necessary operations to update the cart count

    return response()->json(['cartCount' => $count]);
}
}
