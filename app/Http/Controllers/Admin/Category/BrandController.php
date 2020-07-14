<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Brand;

class BrandController extends Controller
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
        $brand = Brand::orderBy('brand_name')->get();
        return view('admin.category.brand', compact('brand'));
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
        'brand_name' => 'required|unique:brands|max:55'
    ]);
        //insert the data into database
        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $image = $request->file('brand_logo');

        //if there is image
        if ($image) {
            //set the image URL :
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/brand/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $brand->brand_logo = $image_url;
            $brand->save();
            
            //show success message
            $notification=array(
                'messege'=>'Brand Added Successfully!',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
        //if there is no image
        else{
            $brand->save();
            
            //show success message
            $notification=array(
                'messege'=>'Brand name Added Successfully!',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }

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
        $brand = Brand::where('id', $id)->first();
        return view('admin.category.edit_brand', compact('brand'));
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
        //retrieve the old logo
        $old_logo = $request->old_logo;

        //update the data into database
        $brand = Brand::where('id', $id)->first();
        $brand->brand_name = $request->brand_name;
        $image = $request->file('brand_logo');

        //if there is new image
        if ($image) {
            //delete the old logo:
            unlink($old_logo);

            //set the new image URL :
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/brand/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $brand->brand_logo = $image_url;
            $brand->save();
            
            //show success message
            $notification=array(
                'messege'=>'Brand updated Successfully!',
                'alert-type'=>'success'
            );
            return Redirect()->route('brands')->with($notification);
        }
        //if there is no image
        else{
            $brand->save();
            
            //show success message
            $notification=array(
                'messege'=>'Brand name updated Successfully!',
                'alert-type'=>'success'
            );
            return Redirect()->route('brands')->with($notification);
        }
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
        $brand = Brand::where('id', $id)->first();
        $image = $brand->brand_logo;
        unlink($image);
        $brand->delete();

        //show success message
        $notification=array(
            'messege'=>'Brand Deleted Successfully!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
