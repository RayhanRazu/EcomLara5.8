<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    function addproductview(){
        $products =  Product::paginate(3);
        return view('product.view', compact('products'));
    }

    function addproductinsert( Request $request){

        $request->validate([
            'Product_name'=>'required',
            'Product_description'=>'required',
            'Product_price'=>'required|numeric',
            'Product_quantity'=>'required|numeric',
            'Product_alert'=>'required|numeric',
        ]);
        //print_r($request->all());
        Product::insert([
            // structure: 'database name' => $request->insert name from form
            'Product_name' => $request->Product_name,
            'Product_description' => $request->Product_description,
            'Product_price' => $request->Product_price,
            'Product_quantity' => $request->Product_quantity,
            'Product_alert' => $request->Product_alert,
        ]);

        return back()->with('status', 'Product added successfully');
    }

    function deleteproduct($product_id){

        //Product::find($product_id)->delete();       this is same as id is the primary key
        Product::where('id', $product_id)->delete();
        return back()->with('del_status', 'Product Deleted successfully');
        
    }

    function editproduct($product_id){

        $product_info = Product::findOrFail($product_id);
        return view('product.edit', compact('product_info'));
        
    }

    function editproductinsert(Request $request){

        //print_r($request->all());
        Product::find($request->product_id)->update([
            'Product_name' => $request->Product_name,
            'Product_description' => $request->Product_description,
            'Product_price' => $request->Product_price,
            'Product_quantity' => $request->Product_quantity,
            'Product_alert' => $request->Product_alert,
        ]);
        
        return back()->with('status', 'Product updated');
    }
}