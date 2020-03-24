<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\CartDetail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use Auth;
use DB;
class CartShowController extends Controller
{
    function index($id){
        $objAuth=(Auth::guard('client')->user());

        $cart=[];
        if($objAuth !=null){
            $cart=Cart::where('client_id',$objAuth->id)->first();
             }
            if($cart!=null){
                $countNum = CartDetail::where('cart_id',$cart->id)->count();
            }else{
                $countNum = 0;
            }
     //get view cart table
     if($cart !=null){
        $cartDetails=CartDetail::where('cart_id',$cart->id)->get();
     }else{
        $cartDetails=[];
     }
     
       return view('Customer.cart.index', compact('objAuth','countNum','cartDetails','cart'));
        

   }



   function updatCart(Request $request){
   
    $objAuth=(Auth::guard('client')->user());


    $qnty=$request->input("testqq");
    $qqq=$request->input('testid'); 
    // $qqq=$objAuth->id;  
  
   
    $cartDetail=CartDetail::find($qqq);
  
$cartDetail->update([
    'product_qty'=>$qnty,
           ]);

 $price=$cartDetail->products->price;
 $total=$price*$qnty;  

   $cartDetail->product_qty=$qnty;

$countNum = CartDetail::where('cart_id',$cartDetail->cart->id)->count();

//get view cart table
$cartDetails=CartDetail::where('cart_id',$cartDetail->cart->id)->get();

$cart=Cart::where('client_id',$objAuth->id)->first();
$totall=0;
foreach($cartDetails as $detail){
    $totall+=($detail->products->price-(($detail->products->price*$detail->products->discount_perc)/100)) * $detail->product_qty;
}
// dd($totall);
$cart->update([
    'total_cost'=>$totall,
    'net_value'=>($cart->shipping_value +$totall)
           ]);

//    dd($cartDetails); 
return view('Customer.cart.index', compact('objAuth','countNum','cartDetails','cart'));        
// return view('Customer.cart.cartTable', compact('cartDetails','cart'));

   }


   public function destroy($id)
   {
    $objAuth=(Auth::guard('client')->user());

    $cliendId=$objAuth->id; 
     
     // $id=$request->input('xdelete');  
     $cartDetail=CartDetail::findOrFail($id);


$cartDetail->delete();

$cart=Cart::where('client_id',$cliendId)->first();
$countNum = CartDetail::where('cart_id',$cart->id)->count();

//get view cart table
 $cartDetails=CartDetail::where('cart_id',$cart->id)->get();
        $totall=0;
       foreach($cartDetails as $detail){
           $totall+=($detail->products->price-(($detail->products->price*$detail->products->discount_perc)/100)) * $detail->product_qty;
       }
       // dd($totall);
       $cart->update([
           'total_cost'=>$totall,
           'net_value'=>($cart->shipping_value +$totall)
                  ]);
       
       //    dd($cartDetails); 
       return view('Customer.cart.index', compact('objAuth','countNum','cartDetails','cart'));
   }


   public function confirmOrder(Request $request){
  
    DB::transaction(function () {
   
    $objAuth=(Auth::guard('client')->user());
    $cart=Cart::where('client_id',$objAuth->id)->first();
 $cartDetails=CartDetail::where('cart_id',$cart->id)->with('products')->get();
// get Product


$order = new Order;
$shopIds=array(); 
$productIds=array(); 
foreach($cartDetails as $detail){
   
    $shop_id= $detail->products->shop_id;
   $shopIds[]=$shop_id;
   $productIds[]=$detail->products;
 
}


//ids of shop unique
 $shopIds = array_unique($shopIds);
// dd($shopIds);
//for loop shops id no to insert in order 
$rnd=rand(0,1000);
foreach ($shopIds as $shopId) {
    $order = new Order;
       $orderNo=$rnd;
        $order->order_no =$orderNo;
        $order->client_id =$objAuth->id;
        $order->shop_id =$shopId;
        $order->order_value =0;
        $order->vat_value =0;
        $order->shipping_value =$cart->shipping_value;
        $order->net_value =0;
        $order->order_date =now();
        $order->order_status_id =1;
        $order->deleivery_date =null;
        $order->client_note =$cart->notes;
        $order->shop_note ='';

         $orderID=$order->save();
  
        foreach($cartDetails as $detail){
           
            if($detail->products->shop_id==$shopId){
           
               $orderDetails = new OrderDetails;
              
                $orderDetails->order_id =$order->id;

            $orderDetails->product_id =$detail->products->id;
          
            $orderDetails->product_qty =$detail->product_qty;
          if($detail->products->discount_perc >0){
               $orderDetails->product_cost =round($detail->products->price -($detail->products->discount_perc * $detail->products->price/ 100));
   
                }else{
                      $orderDetails->product_cost =$detail->products->price;
                       }
           

            $orderDetails->total_line_cost =$orderDetails->product_cost * $detail->product_qty;

            $orderDetails->note =' ';
           
            $orderDetailss=$orderDetails->save();

            $order->order_value += $orderDetails->total_line_cost;
  
 

        }else{
      continue;
        }
        $order->net_value =$order->order_value + $order->shipping_value;
        $order->update();
    }
   
  }

  //update cart and cart Details
  CartDetail::truncate();
   $cart->total_cost=0;
   $cart->vat_value=0;
   $cart->net_value=0;
   $cart->notes='';
   $cart->update();

}); 
return back();
   }


}