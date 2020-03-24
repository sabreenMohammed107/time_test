<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Client;
use App\Models\RelatedProduct;
use App\Models\FavoritesProducts;
use App\Models\Brand;
use App\Models\Gender;
use App\Models\Shop;
use App\Models\Product;
use DB;
use Log;
use Auth;
use App\Models\CartDetail;
use App\Models\Cart;
class CategoryController extends Controller
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
    public function __construct(Category $object)
    {
     // $this->middleware('auth'); 
     $this->object = $object;
     $this->viewName = 'Customer.category.index';
     $this->shopId=2;
    }


    public function index($id)
    {
        $objAuth=(Auth::guard('client')->user());
        /*get last seen on this client*/
        if($objAuth !=null){
            $lastSeens =Client::find($objAuth->id);
        }else{
            $lastSeens =[];
        }
     

    
        $topRelated=RelatedProduct::join('products','products.id','=','Related_Products.related_product_id')
        ->select('*')
        ->orderBy('total_stars_rate','desc')
        ->get();

        $topRelated=$topRelated->take(5);
      //get vafourite
      if($objAuth !=null){
        $items =Client::find($objAuth->id);
    }else{
        $items =[];
    }
      

         //get sub category
         $category=$id;
        
        $parent=Category::select('parent_category_id')->where('id', $category)->get();
      
            foreach($parent as $pr)
{
    if($pr->parent_category_id !=null){
    $subs=Category::Where('id','=',$pr->parent_category_id)->get();
    }
    else{
        $subs=Category::Where('id','=',$category)->get();  
    }

}


//end
foreach($subs as $ss){
    $subSub=Category::Where('parent_category_id','=',$ss->id)->get();  
    //get Ids of sub categories to use in filter product
   
   
}


$itemsSub=DB::table('categories')
->select('id')
->where('parent_category_id','=',$category)
->pluck('id');


if(sizeof($itemsSub) > 0 ){
     //get list of product where category
   
       
            $products= DB::table('products')->select('products.*')
            ->whereIn('category_id',$itemsSub)
            ->paginate(2);
        
               
}
else{

    $products=DB::table('products')->select('products.*')
    ->where('category_id',$category)
    ->paginate(2);
}
   
//   return($products);
         $brands=Brand::all();
         $genders=Gender::all();
         $shops=Shop::all();
        
         $cart=[];
         if($objAuth !=null){
        $cart=Cart::where('client_id',$objAuth->id)->first();
         }
        if($cart!=null){
            $countNum = CartDetail::where('cart_id',$cart->id)->count();
        }else{
            $countNum = 0;
        }
       
      return view($this->viewName,compact('objAuth','lastSeens','topRelated','items','category','brands','genders','shops','subSub','subs','products','countNum'));
    }

    /**
     * Filters Methodes
     */
/*
**
* Get Products of  with category
**
*/
     
function fetch_productWhere(Request $request)
{
    $objAuth=(Auth::guard('client')->user());
   if($request->ajax())
   {
    $filtters=DB::table('products')
    ->where('active', '=',  1);
    
    if(!empty($request->get("ids"))){
        $filtters->whereIn('category_id',$request->get("ids"));
    }
    if(!empty($request->get("start"))){
        $filtters->where('price','>=',$request->get("start"));
    }
    if(!empty($request->get("end"))){
        $filtters->where('price','<=',$request->get("end"));
    }
    if(!empty($request->get("brands"))){
        $filtters->whereIn('brand_id',$request->get("brands"));
    } 
    if(!empty($request->get("genders"))){
        $filtters->whereIn('gender_id',$request->get("genders"));
    }   
    if(!empty($request->get("offers"))){
        $filtters->whereIn('discount_perc',$request->get("offers"));
    }  
    if(!empty($request->get("shops"))){
        $filtters->whereIn('shop_id',$request->get("shops"));
    }      
    $products   = $filtters->orderBy('created_date','desc');     


if(!empty($request->get("selection")) && $request->get("selection")==0){
    $filtters->orderBy('created_date','desc');
}
if(!empty($request->get("selection")) && $request->get("selection")==1 ){
    $filtters->orderBy('price','desc');
}
if(!empty($request->get("selection")) && $request->get("selection")==2){
    $filtters->orderBy('total_stars_rate','desc');
}


$products   = $filtters->paginate(2);   


return view('Customer.category.productList', compact('objAuth','products'))->render();


   }
}

/*
**
* Get Pagination of shop with Breand
**
*/
     
function fetch_productBrands(Request $request)
{
    $objAuth=(Auth::guard('client')->user());
   if($request->ajax())
   {
    $filtters=DB::table('products')
    ->where('active', '=',  1);
    
    if(!empty($request->get("ids"))){
        $filtters->whereIn('category_id',$request->get("ids"));
    }
    if(!empty($request->get("start"))){
        $filtters->where('price','>=',$request->get("start"));
    }
    if(!empty($request->get("end"))){
        $filtters->where('price','<=',$request->get("end"));
    }
    if(!empty($request->get("brands"))){
        $filtters->whereIn('brand_id',$request->get("brands"));
    } 
    if(!empty($request->get("genders"))){
        $filtters->whereIn('gender_id',$request->get("genders"));
    }   
    if(!empty($request->get("offers"))){
        $filtters->whereIn('discount_perc',$request->get("offers"));
    }  
    if(!empty($request->get("shops"))){
        $filtters->whereIn('shop_id',$request->get("shops"));
    }      
    $products   = $filtters->orderBy('created_date','desc');     


if(!empty($request->get("selection")) && $request->get("selection")==0){
    $filtters->orderBy('created_date','desc');
}
if(!empty($request->get("selection")) && $request->get("selection")==1 ){
    $filtters->orderBy('price','desc');
}
if(!empty($request->get("selection")) && $request->get("selection")==2){
    $filtters->orderBy('total_stars_rate','desc');
}


$products   = $filtters->paginate(2);   


return view('Customer.category.productList', compact('objAuth','products'))->render();


   }
}
/*
**
* Get Product with Gender
**
*/
     
function fetch_productGenders(Request $request)
{
    $objAuth=(Auth::guard('client')->user());
       
   if($request->ajax())
   {
    $filtters=DB::table('products')
    ->where('active', '=',  1);
    
    if(!empty($request->get("ids"))){
        $filtters->whereIn('category_id',$request->get("ids"));
    }
    if(!empty($request->get("start"))){
        $filtters->where('price','>=',$request->get("start"));
    }
    if(!empty($request->get("end"))){
        $filtters->where('price','<=',$request->get("end"));
    }
    if(!empty($request->get("brands"))){
        $filtters->whereIn('brand_id',$request->get("brands"));
    } 
    if(!empty($request->get("genders"))){
        $filtters->whereIn('gender_id',$request->get("genders"));
    }   
    if(!empty($request->get("offers"))){
        $filtters->whereIn('discount_perc',$request->get("offers"));
    }  
    if(!empty($request->get("shops"))){
        $filtters->whereIn('shop_id',$request->get("shops"));
    }      
    $products   = $filtters->orderBy('created_date','desc');     


if(!empty($request->get("selection")) && $request->get("selection")==0){
    $filtters->orderBy('created_date','desc');
}
if(!empty($request->get("selection")) && $request->get("selection")==1 ){
    $filtters->orderBy('price','desc');
}
if(!empty($request->get("selection")) && $request->get("selection")==2){
    $filtters->orderBy('total_stars_rate','desc');
}


$products   = $filtters->paginate(2);   


return view('Customer.category.productList', compact('objAuth','products'))->render();


   }

}
/*
**
* Get Pagination of shop with Offer
**
*/
function fetch_productOffers(Request $request)
{
    $objAuth=(Auth::guard('client')->user());
    if($request->ajax())
    {
     $filtters=DB::table('products')
     ->where('active', '=',  1);
     
     if(!empty($request->get("ids"))){
         $filtters->whereIn('category_id',$request->get("ids"));
     }
     if(!empty($request->get("start"))){
         $filtters->where('price','>=',$request->get("start"));
     }
     if(!empty($request->get("end"))){
         $filtters->where('price','<=',$request->get("end"));
     }
     if(!empty($request->get("brands"))){
         $filtters->whereIn('brand_id',$request->get("brands"));
     } 
     if(!empty($request->get("genders"))){
         $filtters->whereIn('gender_id',$request->get("genders"));
     }   
     if(!empty($request->get("offers"))){
         $filtters->whereIn('discount_perc',$request->get("offers"));
     }  
     if(!empty($request->get("shops"))){
         $filtters->whereIn('shop_id',$request->get("shops"));
     }      
     $products   = $filtters->orderBy('created_date','desc');     
 
 
 if(!empty($request->get("selection")) && $request->get("selection")==0){
     $filtters->orderBy('created_date','desc');
 }
 if(!empty($request->get("selection")) && $request->get("selection")==1 ){
     $filtters->orderBy('price','desc');
 }
 if(!empty($request->get("selection")) && $request->get("selection")==2){
     $filtters->orderBy('total_stars_rate','desc');
 }
 
 
 $products   = $filtters->paginate(2);   
 
 
 return view('Customer.category.productList', compact('objAuth','products'))->render();
 
 
    }
}
/**
 *   fetch_productPrice
 */

public function fetch_productPrice(Request $request)
{ 
    $objAuth=(Auth::guard('client')->user());
    if($request->ajax())
    {
     $filtters=DB::table('products')
     ->where('active', '=',  1);
     
     if(!empty($request->get("ids"))){
         $filtters->whereIn('category_id',$request->get("ids"));
     }
     if(!empty($request->get("start"))){
         $filtters->where('price','>=',$request->get("start"));
     }
     if(!empty($request->get("end"))){
         $filtters->where('price','<=',$request->get("end"));
     }
     if(!empty($request->get("brands"))){
         $filtters->whereIn('brand_id',$request->get("brands"));
     } 
     if(!empty($request->get("genders"))){
         $filtters->whereIn('gender_id',$request->get("genders"));
     }   
     if(!empty($request->get("offers"))){
         $filtters->whereIn('discount_perc',$request->get("offers"));
     }  
     if(!empty($request->get("shops"))){
         $filtters->whereIn('shop_id',$request->get("shops"));
     }      
     $products   = $filtters->orderBy('created_date','desc');     
 
 
 if(!empty($request->get("selection")) && $request->get("selection")==0){
     $filtters->orderBy('created_date','desc');
 }
 if(!empty($request->get("selection")) && $request->get("selection")==1 ){
     $filtters->orderBy('price','desc');
 }
 if(!empty($request->get("selection")) && $request->get("selection")==2){
     $filtters->orderBy('total_stars_rate','desc');
 }
 
 
 $products   = $filtters->paginate(2);   
 
 
 return view('Customer.category.productList', compact('objAuth','products'))->render();
 
 
    }
}
/**
 *   fetch_productPrice
 */

public function fetch_productShop(Request $request)
{ 
    $objAuth=(Auth::guard('client')->user());
    if($request->ajax())
    {
     $filtters=DB::table('products')
     ->where('active', '=',  1);
     
     if(!empty($request->get("ids"))){
         $filtters->whereIn('category_id',$request->get("ids"));
     }
     if(!empty($request->get("start"))){
         $filtters->where('price','>=',$request->get("start"));
     }
     if(!empty($request->get("end"))){
         $filtters->where('price','<=',$request->get("end"));
     }
     if(!empty($request->get("brands"))){
         $filtters->whereIn('brand_id',$request->get("brands"));
     } 
     if(!empty($request->get("genders"))){
         $filtters->whereIn('gender_id',$request->get("genders"));
     }   
     if(!empty($request->get("offers"))){
         $filtters->whereIn('discount_perc',$request->get("offers"));
     }  
     if(!empty($request->get("shops"))){
         $filtters->whereIn('shop_id',$request->get("shops"));
     }      
     $products   = $filtters->orderBy('created_date','desc');     
 
 
 if(!empty($request->get("selection")) && $request->get("selection")==0){
     $filtters->orderBy('created_date','desc');
 }
 if(!empty($request->get("selection")) && $request->get("selection")==1 ){
     $filtters->orderBy('price','desc');
 }
 if(!empty($request->get("selection")) && $request->get("selection")==2){
     $filtters->orderBy('total_stars_rate','desc');
 }
 
 
 $products   = $filtters->paginate(2);   
 
 
 return view('Customer.category.productList', compact('objAuth','products'))->render();
 
 
    }
}
/*
select to Sort
*/
function selectSort(Request $request)
{
    $objAuth=(Auth::guard('client')->user());
    if($request->ajax())
    {
     $filtters=DB::table('products')
     ->where('active', '=',  1);
     
     if(!empty($request->get("ids"))){
         $filtters->whereIn('category_id',$request->get("ids"));
         if(!empty($request->get("selection")) && $request->get("selection")==0){
            $filtters->orderBy('created_date','desc');
        }
        if(!empty($request->get("selection")) && $request->get("selection")==1 ){
            $filtters->orderBy('price','desc');
        }
        if(!empty($request->get("selection")) && $request->get("selection")==2){
            $filtters->orderBy('total_stars_rate','desc');
        }
     }
     if(!empty($request->get("start"))){
         $filtters->where('price','>=',$request->get("start"));
         if(!empty($request->get("selection")) && $request->get("selection")==0){
            $filtters->orderBy('created_date','desc');
        }
        if(!empty($request->get("selection")) && $request->get("selection")==1 ){
            $filtters->orderBy('price','desc');
        }
        if(!empty($request->get("selection")) && $request->get("selection")==2){
            $filtters->orderBy('total_stars_rate','desc');
        }
     }
     if(!empty($request->get("end"))){
         $filtters->where('price','<=',$request->get("end"));
         if(!empty($request->get("selection")) && $request->get("selection")==0){
            $filtters->orderBy('created_date','desc');
        }
        if(!empty($request->get("selection")) && $request->get("selection")==1 ){
            $filtters->orderBy('price','desc');
        }
        if(!empty($request->get("selection")) && $request->get("selection")==2){
            $filtters->orderBy('total_stars_rate','desc');
        }
     }
     if(!empty($request->get("brands"))){
         $filtters->whereIn('brand_id',$request->get("brands"));
         if(!empty($request->get("selection")) && $request->get("selection")==0){
            $filtters->orderBy('created_date','desc');
        }
        if(!empty($request->get("selection")) && $request->get("selection")==1 ){
            $filtters->orderBy('price','desc');
        }
        if(!empty($request->get("selection")) && $request->get("selection")==2){
            $filtters->orderBy('total_stars_rate','desc');
        }
     } 
     if(!empty($request->get("genders"))){
         $filtters->whereIn('gender_id',$request->get("genders"));
         if(!empty($request->get("selection")) && $request->get("selection")==0){
            $filtters->orderBy('created_date','desc');
        }
        if(!empty($request->get("selection")) && $request->get("selection")==1 ){
            $filtters->orderBy('price','desc');
        }
        if(!empty($request->get("selection")) && $request->get("selection")==2){
            $filtters->orderBy('total_stars_rate','desc');
        }
     }   
     if(!empty($request->get("offers"))){
         $filtters->whereIn('discount_perc',$request->get("offers"));
         if(!empty($request->get("selection")) && $request->get("selection")==0){
            $filtters->orderBy('created_date','desc');
        }
        if(!empty($request->get("selection")) && $request->get("selection")==1 ){
            $filtters->orderBy('price','desc');
        }
        if(!empty($request->get("selection")) && $request->get("selection")==2){
            $filtters->orderBy('total_stars_rate','desc');
        }
     }  
     if(!empty($request->get("shops"))){
         $filtters->whereIn('shop_id',$request->get("shops"));
         if(!empty($request->get("selection")) && $request->get("selection")==0){
            $filtters->orderBy('created_date','desc');
        }
        if(!empty($request->get("selection")) && $request->get("selection")==1 ){
            $filtters->orderBy('price','desc');
        }
        if(!empty($request->get("selection")) && $request->get("selection")==2){
            $filtters->orderBy('total_stars_rate','desc');
        }
     }      
     $products   = $filtters->orderBy('created_date','desc');     
 
 
 
 
 
 $products   = $filtters->paginate(2);   
 
//  return($request->get("selection"));
  return view('Customer.category.productList', compact('objAuth','products'))->render();
 
 
    }
}
     //end all filters Methodes
    
}
