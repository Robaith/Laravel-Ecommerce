<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProductController extends Controller
{
    public function ShowDetails($id){
    	$product = DB::table('products')
    			->join('categories','products.category_id','categories.id')
    			->join('subcategories','products.subcategory_id','subcategories.id')
    			->join('brands','products.brand_id','brands.id')
    			->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')
    			->where('products.id',$id)
    			->first();

    	$color = $product->product_color;
    	$product_color = explode(',', $color);
    	
    	$size = $product->product_size;
    	$product_size = explode(',', $size);

    	$similar_product = DB::table('products')->join('categories','products.category_id','categories.id')->where('products.category_id',$product->category_id)->get();

    	return view('pages.product_details',compact('product','product_color','product_size','similar_product'));
    }


}
