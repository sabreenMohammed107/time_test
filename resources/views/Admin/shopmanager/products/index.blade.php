@extends('Admin.adminLayout.main')
@section('title', 'Products')


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
          <h6>Shop Products</h6>
          <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addProduct">add Product </a>
        </div>
        <div class="ms-panel-body">
          <div class="table-responsive">
                <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                        <th>image</th>
                          <th>code</th>
                          <th>Product En Name</th>
                          <th>Product Ar Name</th>
                          <th>Category </th>
                          <th>Brand</th>
                          <th>Description</th>
                          <th></th>
                        </thead>
                        <tbody>
                        
                          @foreach($products as $product)
                          <tr>
                            <td><img src="{{ asset('uploads/homeshop')}}/{{ $product->main_image }}" width="100"></td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->en_name }}</td>
                            <td>{{ $product->ar_name }}</td>
                            <td>{{ $product->category->en_name }}</td>
                          
                            <td>{{ $product->brand->name}}</td>
                            <td>{!! $product->en_description !!}</td>

                            
                            <td>
                              <a href="{{ route('products.edit', $product->id) }}" class="btn d-inline-block btn-info">edit </a>
                              <a href="#" onclick="deleteproduct('this Product', '{{$product->id}}')" class="btn d-inline-block btn-danger">delete </a>

                              <form id="deletepro_{{$product->id}}" action="{{ route('products.destroy', $product->id) }}"  method="post" style="display: none;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" value=""></button>
                              </form>
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
@include('Admin.shopmanager.products.create')