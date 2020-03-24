@extends('Admin.adminLayout.main')
@section('title', 'Home')


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
          <h6>shop</h6>
          @if(count($data)==0)
          <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addShop">add Shop </a>
          @endif
        </div>
        <div class="ms-panel-body">
          <div class="table-responsive">
                <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                        <th>img</th>
                          <th>shop_en</th>
                          <th>shop_ar</th>
                          <th>Slogan</th>
                          <th>currency </th>
                          <th>Description</th>
                          <th></th>
                        </thead>
                        <tbody>
                        
                          @foreach($data as $row)
                          <tr>
                            <td><img src="{{ asset('uploads/homeshop')}}/{{ $row->logo }}" width="100"></td>
      
                            <td>{{ $row->en_name }}</td>
                            <td>{{ $row->ar_name }}</td>
                            <td>{{ $row->slogan }}</td>
                          
                            <td>{{ $row->Currency->name}}</td>
                            <td>{!! $row->description !!}</td>

                            
                            <td>
                              <a href="{{ route('shop.edit', $row->id) }}" class="btn d-inline-block btn-info">edit </a>
            
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
@include('Admin.shopmanager.shop.create')