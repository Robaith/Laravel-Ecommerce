<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Coupon;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $coupon = Coupon::orderBy('coupon_name')->get();
        return view('admin.coupon.coupon', compact('coupon'));
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
        //validate input data
        $validatedData = $request->validate([
        'coupon_name' => 'required|unique:coupons|max:255',
        'coupon_value' => 'required',
        'coupon_type' => 'required'
    ]);

        //insert the data into database
        $coupon = new Coupon();
        $coupon->coupon_name = $request->coupon_name;
        $coupon->coupon_value = $request->coupon_value;
        $coupon->coupon_type = $request->coupon_type;
        $coupon->save();

        //show success message
        $notification=array(
            'messege'=>'Coupon Added Successfully!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
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
        //delete query
        Coupon::where('id', $id)->delete();

        //show success message
        $notification=array(
            'messege'=>'Coupon Deleted Successfully!',
            'alert-type'=>'success'
        );
        return Redirect()->route('coupons')->with($notification);
    }
}
