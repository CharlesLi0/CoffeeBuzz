<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\Http\Models\Customer;
use App\Http\Models\Product;
use App\Http\Models\Order;

class CustomerController extends Controller{
	public function customerLogin(Request $request){
		$input = Input::all();

		$customer = Customer::where('email', $input['email'])->first();
    	if(!$customer){
      	 	return view('login')->with('errorMsg', "Can not find this email, please regist first");
       	}
   	 	else if($customer->password == $input['password']){
			$request->session()->push('customer', $customer);
			return redirect('/');
   		}
   		else{
			return view('login')->with('errorMsg', "Invalid email or password, please try again");
   		}
	}

	public function customerLogout(){
		session(['customer'=>null]);
		\Auth::logout();
		return redirect('/login');
	}

	public function customerRegister(){
		$input = Input::all();
		$customer = Customer::where('email', $input['email'])->first();
    	if($customer){
      	 	return view('register')->with('errorMsg', "Email has been used");
       	}

       	if($input['password'] != $input['re-password']) {
       		return view('register')->with('errorMsg', 'Please enter the same password');
       	}

		$newCustomer = new Customer;
		$newCustomer->email = $input['email'];
		$newCustomer->name = $input['name'];	
		$newCustomer->password = $input['password'];
		$newCustomer->address = $input['address'];
		$newCustomer->save();

		return view('register')->with('successMsg', 'Registed successful, please login in.');

	}

	public function viewHomePage(){
		$customer = Customer::where('id',Session::get('customer')[0]->id)->first();
		$history = $customer->orders->count();
	    $orders = Order::where('status', 'Created')->get();
		$product = Product::inRandomOrder()->first();
		return view('home')->with('orders',$orders)->with('product',$product)->with('history', $history);
	}

	public function viewOrderListPage(){
	    $orders = Order::where('status', '!=', 'Finished')->get();
		return view('order-list')->with('orders',$orders);
	}
	
	public function viewNewOrderPage(){
		$products = Product::where('avaliable','1')->get();
		$customer = Customer::where('id',Session::get('customer')[0]->id)->first();
		$unfinishedOrder = $customer->orders->where('status','Not Create')->first();
		if($unfinishedOrder){
			return redirect('/order/' . $unfinishedOrder->id);
		}
		$newOrder = new Order;
		$newOrder->customer_id = $customer->id;
		$newOrder->status = "Not Create";
		$newOrder->created_at = date('Y-m-d H:i:s');
		$newOrder->updated_at = date('Y-m-d H:i:s');
		$newOrder->save();
		
        return redirect('/order/' . $newOrder->id);
	}
	
	
	public function viewOrderDetail($order_id){
	  $order = Order::where('id', $order_id)->first();
	  $products = Product::all();
	  return view('order-detail')->with('products', $products)->with('order',$order);
	}
	
	public function addProduct($order_id, $product_id){
	    $order = Order::where('id', $order_id)->first();
		$order->Products()->attach($product_id);
        return redirect('/order/' . $order->id);
	}
	public function deleteProduct($order_id, $product_id){
	    $order = Order::where('id', $order_id)->first();
        $delete = \DB::table('order_product')->where('order_id', '=', $order_id)->where('product_id', '=', $product_id)->first()->id;
        \DB::table('order_product')->where('id', '=', $delete)->delete();
        return redirect('/order/' . $order->id);
	}

	public function viewCheckOutPage($order_id){
		$order = Order::where('id', $order_id)->first();
		return view('check-out')->with('order',$order);
	}

	public function checkOutOrder($order_id){
	    $order = Order::where('id', $order_id)->first();
	    if(count($order->products) == 0){
	    	return back()->with('errorMsg', 'Please add at least');
	    }
	    foreach ($order->products as $product) {	
	    	$count = Product::where('id', $product->id)->first()->sold + 1;
	    	Product::where('id', $product->id)->first()->update(['sold' => $count]);
	    	print_r($count);
	    }
	    $order->update(['status' => 'Created']);
	    return redirect('/order/list');
	}
	public function cancelOrder($order_id){
	    $order = Order::where('id', $order_id)->first();
	    $order->update(['status' => 'Canceled']);
	    return redirect('/order/list');
	}
}