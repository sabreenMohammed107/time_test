<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Currency;
use App\Models\Category;
use App\Models\Reviews;
use App\Models\ShopContact;
use DB;
class shopController extends Controller
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
    protected $shop_id;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Shop $object)
    {
        
        $this->object = $object;
        $this->viewName = 'Admin.shopmanager.shop.';
        $this->routeName = 'shop.';
        $this->message = 'The Data has been saved';
        $this->shop_id= $this->object->get('id') ;
    }
    public function adminHome()

    {
        return view('Admin.shopmanager.dashboard');
    
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = $this->object::all();
        $data =$this->object::with('currency')->get();
      
        $currency = Currency::pluck('name', 'id');
        
        return view($this->viewName.'index', compact('data','currency'));
    }
    

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->object::all();

        return view($this->viewName.'index', compact('data'));
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
            'logo' => 'required',
            'main_img'=>'required',
            'en_name'=>'required',
            'ar_name'=>'required',
            'default_curr'=>'required',
            'business_type'=>'required',
            'slogan'=>'required'
		]);

		
        $input = $request->all();

		
        $logo=$request->file('logo');
        $main_img=$request->file('main_img');
        $block1_image=$request->file('block1_image');
        $block2_image=$request->file('block2_image');
        $block3_image=$request->file('block3_image');
        $block4_image=$request->file('block4_image');
        
        $input['logo'] = $this->UplaodImage($logo);
        $input['main_img'] = $this->UplaodImage($main_img);
        $input['block1_image'] = $this->UplaodImage($block1_image);
        $input['block2_image'] = $this->UplaodImage($block2_image);
        $input['block3_image'] = $this->UplaodImage($block3_image);
        $input['block4_image'] = $this->UplaodImage($block4_image);
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currency =Currency::pluck('name', 'id');
        $data = $this->object::with('categories')->findOrFail($id);
        $selected= $data->default_curr;
        $categories=Category::with('categories')->whereNull('parent_category_id')->get();
       // dd($data);
       // $shop_categories=$this->object->categories;
        $shop_categories = $data->categories;
        $imageSliders= $this->object->find($id)->sliders()->orderBy('order','desc');

        $reviews= $this->object->find($id)->riews()->orderBy('review_date','desc')->paginate(2);

         $contacts= $this->object->find($id)->contacts()->orderBy('message_date','desc')->paginate(2);;

      // $reviews =Reviews::with('shop')->orderBy('review_date','desc')->paginate(5);
 
      //dd($reviews) ;
        
        return view($this->viewName.'edit', compact('data','currency','selected','categories','shop_categories','reviews','id','contacts','imageSliders'));
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
            'default_curr'=>'required',
            'business_type'=>'required',
            'slogan'=>'required',
            'total_revenue_annual'=>'required'
            ]);


        
           // $input = $request->all();
            if($request->hasFile('logo'))
            {
                $logo=$request->file('logo');
                $request->logo = $this->UplaodImage($logo);
            }
           // else{$input=$request->except(['logo']); }

            if($request->hasFile('main_img'))
            {
                $main_img=$request->file('main_img');
                $request->main_img = $this->UplaodImage($main_img);
            }
            //else{$input=$request->except(['main_img']); }
            if($request->hasFile('block1_image'))
            {
                $block1_image=$request->file('block1_image');
                $request->block1_image = $this->UplaodImage($block1_image);
            }
           // else{$input=$request->except(['block1_image']); }

            if($request->hasFile('block2_image'))
            {
                $block1_image=$request->file('block2_image');
                $request->block2_image = $this->UplaodImage($block2_image);
            }
            //else{$input=$request->except(['block2_image']); }

            if($request->hasFile('block3_image'))
            {
                $block1_image=$request->file('block3_image');
                $request->block3_image = $this->UplaodImage($block3_image);
            }
            //else{$input=$request->except(['block3_image']); }

            if($request->hasFile('block4_image'))
            {
                $block1_image=$request->file('block3_image');
                $request->block4_image = $this->UplaodImage($block4_image);
            }
           // else{$input=$request->except(['block4_image']); }

            
            
           $credentials = array_filter($request->all());
        
           $shopObj= $this->object::findOrFail($id)->update($credentials);

           /*add slider on shop */
          
   
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
        //
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
    
    public function getCat()
	{
      //  return $cat= \App::call('App\Http\Controllers\shopmanager\categoriesController@index');
          return Category::all();
    }

    public function shop_category(Request $request)
    {
        $input = $request->all();
         $cat_id=$request->input('category_id');
        $shop_id=$request->input('shop_id');
         $category = Category::find( $cat_id);
         $shop = Shop::find($shop_id);
         $hascat = $shop->categories->contains($cat_id);

         if($hascat){   
             
            return redirect()->route($this->routeName.'edit',$shop_id)->with('flash_danger', "Category already assigned");
         }
         else{
         
             $shop->categories()->attach($category);
             return redirect()->route($this->routeName.'edit',$shop_id)->with('flash_success', $this->message);
         }
    }
    public function shop_categoryDestroy(Request $request,$id)
    {
        $cat_id=$id;
        $shop_id=$request->input('shop_id');
        $category = Category::find( $cat_id);
        $shop = Shop::find($shop_id);
        $shop->categories()->detach($cat_id);
        return redirect()->route($this->routeName.'edit',$shop_id)->with('flash_success', $this->message);


    }

    

    function fetch( $id)
    {
       
    
     //$data = Category::select(DB::raw('select category_id from shop_category  '))where('parent_category_id', $id)->get();
    //  DB::table('category')('select category_id from shop_category  ')
   $data =  DB::select(DB::raw('select * from categories where id not in (select category_id from shop_category ) and parent_category_id='.$id ));
    //dd($data);
     
     $output = '<option value="">Select Subcategory</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->id.'">'.$row->en_name.'</option>';
     }
     echo $output;
    }



    function fetchReviews(Request $request)
    {
       // $reviews =Reviews::orderBy('id','desc')->paginate(2);

      //  return view('Admin.shopmanager.shop.reviews', compact('reviews'))->render();

     if($request->ajax())
     {
         $id=$request->shop;
        
        // dd($request);
        $reviews =$this->object->find($id)->reviews()->orderBy('review_date','desc')->paginate(2);
    
      return view('Admin.shopmanager.shop.reviews', compact('reviews','id'))->render();
     }
    }


    function fetchContacts(Request $request)
    {
       // $reviews =Reviews::orderBy('id','desc')->paginate(2);

      //  return view('Admin.shopmanager.shop.reviews', compact('reviews'))->render();

     if($request->ajax())
     {
         $id=$request->shop;
        
        // dd($request);
        $contacts =$this->object->find($id)->contacts()->orderBy('message_date','desc')->paginate(2);
    
      return view('Admin.shopmanager.shop.contacts', compact('contacts','id'))->render();
     }
    }



}
