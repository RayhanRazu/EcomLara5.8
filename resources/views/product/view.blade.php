@extends('layouts.app')


@section('content')


<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-success">
                    List of Added Products
                </div>
                <div class="card-body">
                    @if(session('del_status'))
                    <div class="alert alert-danger">
                        {{session('del_status')}}
                    </div>
                    @endif
                    <table class="table table-bordered ">
                        <thead>
                          <tr>
                            <th>Sl. No.</th>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Alert Quantity</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $prod)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$prod->Product_name}}</td>
                            <td>{{$prod->Product_description}}</td>
                            <td>{{$prod->Product_price}}</td>
                            <td>{{$prod->Product_quantity}}</td>
                            <td>{{$prod->Product_alert}}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{url('delete/product')}}/{{$prod->id}}" class="btn  btn-danger">Delete</a>

                                    <div style="padding: 4px; background-color: rgb(219, 167, 167);"></div>
                                    
                                    <a href="{{url('edit/product')}}/{{$prod->id}}" class="btn btn-info">Update</a>
                                </div>
                                
                            </td>
                        </tr>
                        @empty
                        <tr class="text-center text-info font-weight-bold text-uppercase">
                            <td colspan="6">
                                No data availabe
                            </td>
                        </tr>
                        @endforelse
                          
                        </tbody>
                      </table>

                      <!-- for pagination -->
                      {{$products->links()}}
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-header bg-success">
                    Add Product From
                </div>

                <div class="card-body">
                    
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if($errors->all())
                    <div class="alert alert-danger">
                    @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                    @endforeach
                    </div>
                    @endif
                    <form action="{{url('add/product/insert')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Product Name</label>
                          <input type="text" class="form-control" placeholder="Enter product name" name="Product_name" value="{{old('Product_name')}}">
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea class="form-control" rows="3" placeholder="Describe your Product" name="Product_description">{{old('Product_description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="text" class="form-control" placeholder="Enter product price" name="Product_price" value="{{old('Product_price')}}">
                        </div>
                        <div class="form-group">
                            <label>Product Quantity</label>
                            <input type="text" class="form-control" placeholder="Enter product quantity" name="Product_quantity" value="{{old('Product_quantity')}}">
                        </div> 
                        <div class="form-group">
                            <label>Alert Quantity</label>
                            <input type="text" class="form-control" placeholder="Enter product Alert Quantity" name="Product_alert" value="{{old('Product_alert')}}">
                        </div> 
                        
                        <button type="submit" class="btn btn-info">Add Product</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection