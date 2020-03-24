@extends('Admin.adminLayout.main')
@section('title', 'Orders')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href=""><i class="material-icons"></i> home </a></li>
    </ol>
  </nav>

@endsection

@section('content')

<div class="row">

<div class="col-md-12">
 


    <div class="ms-panel">
        <div class="ms-panel-header d-flex justify-content-between">
          <h6>Shop Orders</h6>
        </div>
        <div class="ms-panel-body">
          <div class="table-responsive">
                <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                        <th>Order Date</th>
                          <th>Client</th>
                          <th>Order Net Value</th>
                          <th>Order Status</th>
                          
                          <th></th>
                        </thead>
                        <tbody>
                        
                          @foreach($orders as $order)
                          <tr>
                            <td>{{ $order->order_date }}</td>
                            <td>{{ $order->customer->name }}</td>
                            <td>{{ $order->net_value }}</td>
                            <td>{{ $order->status->status }}</td>
                          
                            
                            <td>
                              <a href="{{ route('orders.show', $order->id) }}"  class="btn btn-info d-inline-block">Show Details </a>

                            
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
          </div>
        </div>
      </div>
    
     
  

</div>

</div>
@endsection
