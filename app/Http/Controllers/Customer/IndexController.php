<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Product;
use App\Models\Reviews;
use App\Models\Category;
use App\Models\Cart;

use App\Models\CartDetail;
use Auth;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
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
        
        //get sider shop image
        $shops =Shop::all();
        //get product new 
        $newrProducts=Product::where('new_flag', '=',1)->inRandomOrder(rand(10,100))->get();
        $offersProducts=Product::where('discount_perc', '>',0)->orderBy('discount_perc','desc')->inRandomOrder(rand(10,100))->get();
        $commingProducts=Product::where('upcoming_flag', '>',0)->inRandomOrder(rand(10,100))->get();
        $reviews =Reviews::whereIn('review_type',[0,1])
        ->where('stars_rank','=',5)->inRandomOrder(rand(10,100))->get();

        //for testing category
        $men=Category::where('id','=',5)->first();
        $tShirt=Category::where('id','=',8)->first();
        $short=Category::where('id','=',9)->first();
        //end test
        return view('Customer.home.index', compact('objAuth','countNum','shops','newrProducts','offersProducts','commingProducts','reviews','short','tShirt','men'));
    }

    public function search(Request $request)
    {
        $results = array();
          
          $search = $request->get('term');
          $id=5;
          if ($request->get('selectItem')==0) {

          $products = Product::where('en_name', 'LIKE', '%'. $search. '%')->get();
          foreach($products as $key =>$value){

            $result[]=['id'=>$value->id,'value'=>$value->en_name];
            }
          }

          if ($request->get('selectItem')==1) {
            $categories = Category::where('en_name', 'LIKE', '%'. $search. '%')->get();
            foreach($categories as $key =>$value){
  
              $result[]=['id'=>$value->id,'value'=>$value->en_name];
              }
          }

          if ($request->get('selectItem')==2) {
            $shops = Shop::where('en_name', 'LIKE', '%'. $search. '%')->get();
            foreach($shops as $key =>$value){
  
              $result[]=['id'=>$value->id,'value'=>$value->en_name];
              }
          }

         
          
            
        //   return Response()->json(array('user'=>$result,'post'=>$id));
          return response()->json($result);
            
    } 
}
