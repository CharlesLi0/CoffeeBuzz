<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Http\Models\Manager;
use App\Http\Models\Product;
use App\Http\Models\Order;

class ManagerController extends Controller{
	public function managerLogin(Request $request){
		$input = Input::all();
		$manager = Manager::where('account', $input['account'])->first();
    	if(!$manager){
      	 	return view('login')->with('errorMsg', "Can not find this account");
       	}
        else if($manager->password == $input['password']){
			$request->session()->push('manager', $manager);
			return redirect('/');
   		}
   		else{
			return view('login')->with('errorMsg', "Invalid email or password, please try again");
   		}
	}
	
	public function managerLogout(){
		session(['manager'=>null]);
		\Auth::logout();
		return redirect('/login');
	}

	public function viewHomepage(){
        $popularProducts = Product::orderBy('sold', 'desc')->paginate(5);
        $products = Product::all();
        $sold = 0;
        foreach ($products as $product) {
        	$sold += $product->sold * $product->price;
        }
        $productCount = count($products);
        $orders = Order::all();
        $finished = $orders->where('status', 'Finished')->count();
        $canceld = $orders->where('status', 'Canceld')->count();
        $created = $orders->where('status', 'Created')->count();
		return view('home')->with('popularProducts', $popularProducts)->with('sold', $sold)->with('productCount', $productCount)->with('orderCount', $orders->count())->with('canceld', $canceld)->with('finished', $finished)->with('created', $created);
	}
	
	public function addNewProduct(){
		$input = Input::all();
		$product = Product::where('name', $input['name'])->first();
    	if($product){
      	 	return view('product-new')->with('errorMsg', "Already have this product");
       	}
        $newProduct = new Product;
		$newProduct->name = $input['name'];
		$newProduct->price = $input['price'];
		$newProduct->description = $input['description'];
		$newProduct->sold = 0;
		$newProduct->avaliable = true;
		$newProduct->save();
   		
		return view('product-new')->with('successMsg', "Add Product: " . $input['name'] . " successful");
	}
	
	public function viewProductListPage(){
		$products = Product::all();
        return view('product-list')->with('products', $products);
	}
	
	public function viewProductEditPage($product_id){
		$product = Product::where('id', $product_id)->first();
        return view('product-edit')->with('product', $product);
	}
	
	public function editProduct($product_id){
        $input = Input::all();
		$product = Product::where('id', $product_id)->first()->update(['name' => $input['name'], 'price' => $input['price'],'description' => $input['description'], 'avaliable' => $input['avaliable']]);

        return redirect('/product/list');
	}
	
	public function viewOrderListPage(){
	    $orders = Order::where('status', '!=', 'Finished')->where('status', '!=', 'Not Create')->get();
		return view('order-list')->with('orders',$orders);
	}

	public function finishOrder($orderId){
		$order = Order::where('id', $orderId)->first()->update(['status' => 'Finished']);
	    return redirect('/order/list');
	}

	public function deleteOrder($order_id){
	    $order = Order::where('id', $order_id)->first()->update(['status' => 'Canceld']);
	    return redirect('/order/list');
	}
}