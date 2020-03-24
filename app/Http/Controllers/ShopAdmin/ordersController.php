<?php

namespace App\Http\Controllers\ShopAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderDetails;
use App\Models\Shipping_Contacts;

class ordersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $shopId;

    public function __construct(Order $object)
    {
        $this->middleware('auth:shopadmin');
        

     // $this->middleware('auth'); 
     $this->object = $object;
     $this->viewName = 'Admin.shopmanager.orders.';
     $this->routeName = 'orders.';
      $this->message = 'The Data has been saved';
     $this->shopId=1;
    }
    
    public function index()
    {
        $orders = $this->object::with('OrderDetails','customer','status')
                           ->where('shop_id', '=', $this->shopId)
                           
                           ->orderby('order_date', 'Desc')->get();

       
       
        return view($this->viewName.'index', compact('orders'));
   
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->viewName.'index', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $order = $this->object::with('OrderDetails','customer','status')
                 ->where('shop_id', '=', $this->shopId)
                         
                ->orderby('order_date', 'Desc')
                ->findOrFail($id);
       $order_no=$order->order_no;
      $customer= $order->customer::with('country','city')->first();
       $customer_id=$customer->id;

       $shiping=Shipping_Contacts::with('country','city')
       ->where('client_id',$customer_id)
       ->where('default','1')->first();
       
       $order_items = OrderDetails::with(['order' => function($query)use($order_no) {
                    $query->
                    where('shop_id', $this->shopId)
                    ->where('order_no', $order_no);
                },'product'=> function($query) {
                    $query->
                    where('shop_id', $this->shopId);
                   
                }])->get();

    
    

        $status=OrderStatus::all();
                         
       return view($this->viewName.'showorder', compact('order','status','order_items','customer','shiping'));                  
                           

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
        $credentials = array_filter($request->all());
        
        $this->object::findOrFail($id)->update($credentials);

        return redirect()->route($this->routeName.'show',$id)->with('flash_success', $this->message);

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
}
