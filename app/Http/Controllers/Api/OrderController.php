<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OrderController extends Controller
{
    public function TodayOrder()
    {
    	$data=date('d/m/Y');
    	$order=DB::table('orders')
    	      ->join('customers','orders.customer_id','customers.id')
    	      ->where('orders.order_date',$data)
    	      ->select('customers.name','orders.*')
    	      ->orderBy('orders.id','DESC')->get();
    	return response()->json($order);
    }

    public function OrderDetails($id)
    {
    	$orders=DB::table('orders')
    	        ->join('customers','orders.customer_id','customers.id')
    	        ->where('orders.id',$id)
    	        ->select('customers.name','customers.phone','customers.address','orders.*')
    	        ->first();
    	  return response()->json($orders);               
    }

    public function OrderDetailsAll($id)
    {
    	$details=DB::table('order_details')
    	          ->join('products','order_details.product_id','products.id')
    	          ->where('order_details.order_id',$id)
    	          ->select('products.product_name','products.product_code','products.image','order_details.*')
    	          ->get();
    	  return response()->json($details); 
    }

    public function SearchOrderDate(Request $request){
    	$orderdate=$request->date;
    	return response()->json($orderdate);
    }

    public function SearchMonth(request $request){
    	$month=$request->month;
    	return response()->json($month);
    }
}
