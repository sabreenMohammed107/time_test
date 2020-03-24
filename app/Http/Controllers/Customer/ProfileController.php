<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\OrderDetails;
use App\Models\FavoritesProducts;
use Auth;
use DB;
class ProfileController extends Controller
{
    public function index($id)
    {
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


        if($objAuth !=null){
            $acount=Client::where('id','=',$objAuth->id)->first();
        }else{
            $acount =[];
        }
     
        if($objAuth !=null){
         $favourites=Client::find($objAuth->id);
        
    }else{
        $favourites =[];
    }

    if($favourites !=null){
         $favoriteProducts = $favourites->favoriteProduct()->paginate(3);
    }else{
        $favoriteProducts =[];
    }
    if($objAuth !=null){
$clientOreders=Order::where('client_id','=',$objAuth->id)->paginate(3);
    }else{
        $clientOreders=[];   
    }
    //get last seen Products on client
    if($objAuth !=null){
        $clientٍSeen=Client::find($objAuth->id);
    }else{
        $clientٍSeen =[];
    }
        return view('Customer.profile.index', compact('objAuth','countNum','acount','favoriteProducts','clientOreders','clientٍSeen'));
    }

    
    public function changePass($id)
    {
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
if($objAuth !=null){
        $acount=Client::where('id','=',$objAuth->id)->first();
}else{
    $acount=[];  
}

        return view ('Customer.profile.changePass', compact('objAuth','countNum','acount',));
    }

    public function updateAccount(Request $request){

        $objAuth=(Auth::guard('client')->user());
        if($objAuth !=null){
            $cart=[];
            if($objAuth !=null){

               $cart=Cart::where('client_id',$objAuth->id)->first();
                 }
                    if($cart!=null){
               $countNum = CartDetail::where('cart_id',$cart->id)->count();
           }else{
               $countNum = 0;
           }

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
           'phone' => 'required',
           'postal' => 'required',
           'gender' => 'required',
           
        ]);
     
     $data=[
            'name'=>$request->input('name'),
          'email' =>$request->input('email'),
            'mobile1' =>$request->input('phone'),
            'postal_code'=>$request->input('postal'),
            'company'=>$request->input('company'),
            'gender'=>$request->input('gender'),
            'job_title'=>$request->input('job'),                   
        ];
        $acount=Client::where('id','=',$objAuth->id)->first();
 
         $acount->update($data);
      
    }
        return view('Customer.profile.account', compact('acount','objAuth','countNum'))->render();
    }

    /**
             * Make pagination on favourites and return with ajax
             */
              
            
            function fetch_data(Request $request)
            {
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

             if($request->ajax())
             {
                $favourites=Client::find(2);
                $favoriteProducts = $favourites->favoriteProduct()->paginate(3);            
              return view('Customer.profile.favourite', compact('objAuth','countNum','favoriteProducts'))->render();
             }
            }
            /**
             * Make pagination on orders and return with ajax
             */
              
            
            function fetch_orderData(Request $request)
            {
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

             
             if($request->ajax())
             {
         
                $clientOreders=Order::where('client_id','=',2)->paginate(3);         
              return view('Customer.profile.orders', compact('objAuth','countNum','clientOreders'))->render();
             }
            }
             /**
             * get order details
             */
              
            
            function orderDetails($id)
            {
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

              
                
                $order=Order::where('id', $id)->firstOrFail();
               
                $orderDetails=OrderDetails::where('order_id',$order->id)->get();
              //get last seen Products on client
    if($objAuth !=null){
        $clientٍSeen=Client::find($objAuth->id);
    }else{
        $clientٍSeen =[];
    }
                return view('Customer.profile.details', compact('objAuth','countNum','orderDetails','order','clientٍSeen'));
            }

            
public function deleteFromFavourite(Request $request){
   
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
     
    if($objAuth !=null){
      $clientId=$objAuth->id;

    
    $data=[
        'client_id'=>$clientId,
        'product_id'=>$request->get("item_id"),
    ];
    $productId=$request->get("item_id");

$client = Client::findOrFail($clientId); 

$client->favoriteProduct()->detach($productId); // delete meny to meny
// $productId=$request->get("item_id");
// $productData =Product::findOrFail($productId);
// $favoriteProducts=DB::table('favorites_products')
//  ->select('product_id')
//  ->where('client_id','=',$clientId)
//  ->pluck('product_id');
//   $favoriteProducts=$favoriteProducts->favoriteProduct()->paginate(3);
//   Log::info('data deleted');
  $favourites=Client::find($clientId);
  $favoriteProducts = $favourites->favoriteProduct()->paginate(3);       
}
  return view('Customer.profile.favourite', compact('objAuth','countNum','favoriteProducts'))->render();  
   
 

}
            

}
