@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">

        <div class="col-6 offset-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{url('add/product/view')}}">Product List</a></li>
                <li class="breadcrumb-item active" aria-current="page">edit product form</li>
            </ol>
        </nav>
            <div class="card">
                <div class="card-header bg-success">
                    Edit product From
                    
                </div>
                <div class="card-body">
                    
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
            
                    <form action="{{url('edit/product/insert')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Product Name</label>
                          <!-- keeping the product id here for catching later but kept it hidden in form -->
                          <input type="hidden" name="product_id" value="{{$product_info->id}}">

                          <input type="text" class="form-control" placeholder="Enter product name" name="Product_name" value="{{$product_info->Product_name}}">
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea class="form-control" rows="3" placeholder="Describe your Product" name="Product_description" >{{$product_info->Product_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="text" class="form-control" placeholder="Enter product price" name="Product_price" value="{{$product_info->Product_price}}">
                        </div>
                        <div class="form-group">
                            <label>Product Quantity</label>
                            <input type="text" class="form-control" placeholder="Enter product quantity" name="Product_quantity" value="{{$product_info->Product_quantity}}">
                        </div> 
                        <div class="form-group">
                            <label>Alert Quantity</label>
                            <input type="text" class="form-control" placeholder="Enter product Alert Quantity" name="Product_alert" value="{{$product_info->Product_alert}}">
                            
                        </div> 
                        <div class="form-group">
                        <button type="submit" class="btn  btn-info form-control">Update</button>
                        </div>
                        
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection