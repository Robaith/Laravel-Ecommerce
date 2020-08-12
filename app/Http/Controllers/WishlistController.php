<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class WishlistController extends Controller
{
       public function addWishlist($id){

    $userid = Auth::id();
    $check = DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();

    $data = array(
    'user_id' => $userid,
    'product_id' => $id,

    );

              if (Auth::Check()) {
             
             if ($check) {
              return \Response::json(['error' => 'This product is Already on your wishlist !']);   
             }else{
                DB::table('wishlists')->insert($data);
          return \Response::json(['success' => 'Product Added on your wishlist']);
 
             }
             
                 
              }else{
          return \Response::json(['error' => 'At first login into your account']);      

              } 

   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
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
