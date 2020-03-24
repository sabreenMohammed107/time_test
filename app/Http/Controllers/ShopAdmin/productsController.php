<?php

namespace App\Http\Controllers\ShopAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Brand;
use App\Models\Product;
use App\Models\UnitMeasure;
use App\Models\ProductSlider;
use App\Models\Reviews;
use App\Models\RelatedProduct;
use App\Models\ProductFeature;
use App\Models\CategoryFeature;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $shopId;
    
    protected $shop_categories ;
    protected $cat_ids;
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Product $object)
    {
        $this->middleware('auth:shopadmin');

     $this->object = $object;
     $this->viewName = 'Admin.shopmanager.products.';
     $this->routeName = 'products.';
      $this->message = 'The Data has been saved';
     $this->shopId=3;
     
     $this->shop_categories = Shop::findOrFail($this->shopId)->categories;
     $this->cat_ids=$this->shop_categories->Pluck('id');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = $this->object::all();
        
        $products =Product::with('category','brand')
                           ->where('shop_id', '=', $this->shopId)
                           ->where('active', '=', 1)->get();

        $shop_categories = Shop::findOrFail($this->shopId)->categories;
       // $shop_categories = Shop::findOrFail($this->shopId)->categories;
        $brands = Brand::Pluck('name','id');
        $gender = Gender::Pluck('en_name','id');
        $unit_measure=UnitMeasure::Pluck('name','id');
       // dd($gender);
        return view($this->viewName.'index', compact('products','shop_categories','brands','gender','unit_measure'));
    }
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'main_image'=>'required',
            'en_name'=>'required',
            'ar_name'=>'required',
            'code'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
            'unitmeasur_id'=>'required',
            'qty_per_unit'=>'required',
            'qty_in_stock'=>'required|numeric|min:1',
            'en_description'=>'required',
            'ar_description'=>'required'
		]);

		
        $input = $request->all();

		
        $main_img=$request->file('main_image');
        
        $input['main_image'] = $this->UplaodImage($main_img);
        $input['shop_id']= $this->shopId;
       $input['created_date']=now();
        $this->object::create($input);
        	
       
        return redirect()->route($this->routeName.'index')->with('flash_success', $this->message);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
          $product =Product::where('shop_id', '=', $this->shopId)
          ->findOrfail($id);

         $shop_categories = Shop::findOrFail($this->shopId)->categories;
         $cat_id=$shop_categories->Pluck('id');
        
         $brands = Brand::Pluck('name','id');
            $gender = Gender::Pluck('en_name','id');
            $unit_measure=UnitMeasure::Pluck('name','id');
    
        $productSlider=ProductSlider::with('slider')->where('product_id', '=',$id)->get();

        $products  =Product::where('shop_id', $this->shopId)
        ->where('id','<>',$id)
        ->Pluck('en_name','id');
        $relatedproduct = RelatedProduct::with('product')->where('product_id', $id)->get();
        $reviews =Reviews::with('product')->where('product_id', '=',$id)->orderBy('created_at','desc')->paginate(2);
      
        $features=CategoryFeature::with(['category'=> 
                                       function($query)use($cat_id)
                                        {
                                              $query->
                                              whereIn('id', $cat_id);
                                        }
                                    ])->Pluck('feature_text','id');
                                    

       $productFeatures=ProductFeature::with(['feature'=> 
                                       function($query)use($cat_id)
                                        {
        $query->
        whereIn('category_id', $cat_id);}])
        ->where('product_id',$id)->get();
       // $relatedproduct=RelatedProduct::with('related')->where('product_id', '=',$id)->get();
        //dd($productFeatures);
        return view($this->viewName.'edit', compact('product','shop_categories','brands','gender','unit_measure','productSlider','products','relatedproduct','reviews','id','productFeatures','features'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            
            
            'en_name'=>'required',
            'ar_name'=>'required',
            'code'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
            'unitmeasur_id'=>'required',
            'qty_per_unit'=>'required',
            'qty_in_stock'=>'required|numeric|min:1',
            'en_description'=>'required',
            'ar_description'=>'required'
		]);

		
        $input = $request->all();

		
        if($request->hasFile('main_image'))
        {
            $main_image=$request->file('main_image');
            $request->main_image = $this->UplaodImage($main_img);
        }  

        $request->shop_id= $this->shopId;

        $credentials = array_filter($request->all());
        
        $this->object::findOrFail($id)->update($credentials);

        return redirect()->route($this->routeName.'index')->with('flash_success', $this->message);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $this->object::findOrFail($id)->delete();
        
        return redirect()->route($this->routeName.'index')->with('flash_success', $this->message);
    }

    public function UplaodImage($file_request)
	{
		//  This is Image Info..
		$file = $file_request;
		$name = $file->getClientOriginalName();
		$ext  = $file->getClientOriginalExtension();
		$size = $file->getSize();
		


		// Rename The Image ..
		$imageName = 'img_'.$name.$size.'_'.time().'.'.$ext;
		$uploadPath = public_path('uploads/homeshop');
		
		// Move The image..
		$file->move($uploadPath, $imageName);
       
		return $imageName;
    }



    /* Products Tabs*/


    /* -----  Edit slider---- */

    public function edit_slider($id)

    {

        
        $productslider =  ProductSlider::find($id);
   // dd($slider);
     
     
    return view('Admin.shopmanager.products.editslider', compact('productslider'));



    }
    public function productSliderUpdate(Request $request,$id)
    {
      
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $request->image = $this->UplaodImage($image);
        }  
        $credentials = array_filter($request->all());
        
        ProductSlider::findOrFail($id)->update($credentials);
        
        
             return redirect()->back()->with('flash_success', $this->message);
         
    }

    public function productSliderStore(Request $request,$product_id)
    {
        $request->validate([
            
            'image'=>'required',
            'order'=>'required',
            
		]);
        $input = $request->all();
        
            $image=$request->file('image');

            $input['image'] = $this->UplaodImage($image);
         $input['product_id']=$product_id;
        
         $slider = ProductSlider::create($input);
        
        return redirect()->back()->with('flash_success', $this->message);
         
    }


    public function productSliderDestroy($id)
    {
       
        ProductSlider::findOrFail($id)->delete();
        
        return redirect()->back()->with('flash_success', $this->message);
    }

    public function relatedProductsStore(Request $request,$id)
    {
        
        $input = $request->all();
       $input['product_id']=$id;
       
       if($request->get('active') == null){
        $input['active']=0;
    }
      
        \App\Models\RelatedProduct::create($input);
          
            return redirect()->back()->with('flash_success', $this->message);
       

    }
    public function relatedProductsDestroy($id)
    {
          

           \App\Models\RelatedProduct::findOrFail($id)->delete();
          
            return redirect()->back()->with('flash_success', $this->message);
       

    }

    function fetchReviews(Request $request)
    {
       // $reviews =Reviews::orderBy('id','desc')->paginate(2);

      //  return view('Admin.shopmanager.shop.reviews', compact('reviews'))->render();

     if($request->ajax())
     {
         $id=$request->product;
        
        // dd($request);
        $reviews =Reviews::with('product')->where('product_id', '=',$id)->orderBy('created_at','desc')->paginate(2);
    
      return view('Admin.shopmanager.products.reviews', compact('reviews','id'))->render();
     }
    }

    public function productFeatureStore (Request $request,$id)
    {
        $request->validate([
            
            'feature_id'=>'required',
            'value'=>'required',
            
		]);
        $input = $request->all();
       $input['product_id']=$id;
       
       if($request->get('active') == null){
        $input['active']=0;
    }
      
      ProductFeature::create($input);
          
    return redirect()->back()->with('flash_success', $this->message);
       
    }

    public function productFeatureDestroy($id)
    {
          

        ProductFeature::findOrFail($id)->delete();
          
            return redirect()->back()->with('flash_success', $this->message);
       

    }

    public function edit_feature($id)

    {
        
        $features=CategoryFeature::with(['category'=> 
                                       function($query)
                                        {
                                              $query->
                                              whereIn('id', $this->cat_ids);
                                        }
                                    ])->Pluck('feature_text','id');

        $profeature =  ProductFeature::find($id);
   // dd($slider);
     
     
    return view('Admin.shopmanager.products.editfeature', compact('profeature','features'));



    }
    public function productFeatureUpdate(Request $request,$id)
    {
        $request->validate([
            
            'feature_id'=>'required',
            'value'=>'required',
            
		]);
        
        $input = $request->all();
        
        if($request->get('active') == null){
           
            $input['active']=0;
        }
      // dd($input['active']);
        ProductFeature::findOrFail($id)->update($input);
        
        
             return redirect()->back()->with('flash_success', $this->message);
         
    }

}
