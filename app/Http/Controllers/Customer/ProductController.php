<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSlider;
use App\Models\Reviews;
use App\Models\RelatedProduct;
use App\Models\Client;
use App\Models\CartDetail;
use App\Models\Cart;
use App\Models\ProductFeature;
use App\Models\FavoritesProducts;
use App\Models\ClientProduct;
use Log;
use DB;
use Auth;
class ProductController extends Controller
{
    protected $object;
    protected $viewName;
    protected $prdId;
    protected $shopId;
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Product $object)
    {
     // $this->middleware('auth'); 
     $this->object = $object;
     $this->viewName = 'Customer.product.index';
     $this->shopId=2;
    }


    public function index(Request $request)
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

       //Get Product Id
       
        $Productid=$request->input('productId');
        $productData =Product::findOrFail($Productid);
        $productSlider=ProductSlider::with('slider')->where('product_id', '=',$Productid)->get();
       
        $reviews =Reviews::with('product')->where('product_id', '=',$Productid)->orderBy('id','desc')->paginate(3);
         $relatedProduct=RelatedProduct::with('mainProduct')->where('product_id', '=',$Productid)->get();
         

         $likedProduct=Product::where('category_id', '=', $productData->category_id)
         ->where('id', '!=', $Productid)->get();
         $productFeatures=ProductFeature::with('product')->where('product_id', '=',$Productid)
                ->get();
         //get Category feature
         
        //  return($productFeatures);
        //Get Favourite Product
        if($objAuth !=null){
            $Favourites=DB::table('favorites_products')
            ->select('product_id')
            ->where('client_id','=',$objAuth->id)
            ->pluck('product_id');
        }else{
            $Favourites=[];
        }
       
        //get no of items on cart



/*----------------------saving data as last seen-----------------*/
//check if login as client  last seen
if($objAuth !=null){
    $data=[
        'client_id'=>$objAuth->id,
        'product_id'=>$Productid,
      
    ];

  
    $productLastSeen=ClientProduct::where('product_id',$Productid)
    ->where('client_id',$objAuth->id)
    ->count();
    if($productLastSeen==0){
  $result=ClientProduct::create($data);
    }

}


        return view($this->viewName, compact('objAuth','countNum','productData','productSlider','reviews','relatedProduct','likedProduct','productFeatures','Favourites','countNum'));

    }
/*
**addProductReview
*/
    public function addProductReview(Request $request){


        $objAuth=(Auth::guard('client')->user());
        $reviews =[];
        if($objAuth !=null){
          $clientId=$objAuth->id;
         
        
       
       $data=[
             'name'=>$request->input('name'),
             'review_text'=>$request->input('reviewMsg'),
             'email' =>$request->input('email'),
             'stars_rank'=>$request->input('rating'),
             'client_id'=>$clientId,
             'product_id'=>$request->input('productId'),
             'review_date'=>now(),
             'review_type'=>0,
             'active'=>1, 
         ];
          
         $result=Reviews::create($data);
     
                  $Productid=$request->input('productId');
//update product rate

$updateProduct=Product::where('id',$Productid)->first();
$updateProduct->update([
  'total_stars_rate'=>$request->input('rating'),
  ]);
          $reviews =Reviews::with('product')->where('product_id', '=',$Productid)->orderBy('id','desc')->paginate(3);
      
        }
            return view('Customer.product.reviewProduct', compact('reviews'))->render();

     }

     function fetch_data(Request $request)
                {
                 
                 if($request->ajax())
                 {
                    
                    $Productid=$request->input('productId');
                    // dd($Productid);
                    $reviews =Reviews::with('product')->where('product_id', '=',$Productid)->orderBy('id','desc')->paginate(3);

                    return view('Customer.product.reviewProduct', compact('reviews'))->render();
                 }
                }

                public function addfavourite(Request $request){

                  
                    $objAuth=(Auth::guard('client')->user());
               
                    if($objAuth !=null){
                      $clientId=$objAuth->id;
                    
                    $data=[
                        'client_id'=>$clientId,
                        'product_id'=>$request->get("item_id"),
                    ];
              
                  $result=FavoritesProducts::create($data);

                  $productId=$request->get("item_id");
                  $productData =Product::findOrFail($productId);
                  $Favourites=DB::table('favorites_products')
                     ->select('product_id')
                    ->where('client_id','=',$clientId)
                   ->pluck('product_id');
                  Log::info('data inserted');
                }
                 return view('Customer.product.favourite', compact('productData','Favourites'))->render();  
                    
                }

                public function deletefavourite(Request $request){

                  
                    $objAuth=(Auth::guard('client')->user());
               
                    if($objAuth !=null){
                      $clientId=$objAuth->id;
                
                    
                    $data=[
                        'client_id'=>$clientId,
                        'product_id'=>$request->get("item_id"),
                    ];
                    $productId=$request->get("item_id");
            
                $client = Client::findOrFail($clientId); 

               $client->favoriteProduct()->detach($productId); // delete meny to meny
               $productId=$request->get("item_id");
               $productData =Product::findOrFail($productId);
               $Favourites=DB::table('favorites_products')
                 ->select('product_id')
                 ->where('client_id','=',$clientId)
                 ->pluck('product_id');
                  Log::info('data deleted');
                }
                  return view('Customer.product.favourite', compact('productData','Favourites'))->render();  
                   
                    
                }
           

}
