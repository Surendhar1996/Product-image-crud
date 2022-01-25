<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products=Product::get();
        return view("products.index",compact('products'));
    }
    public function create()
    {
        return view("products.create");
    }
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
           'f_name'=>'required',
           'l_name'=>'required',
           'image_1' =>'required|image|mimes:jpg,png|max:5000|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
           'image_2'=>'required|image|mimes:jpg,png|max:5000|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
           'image_3'=>'required|image|mimes:jpg,png|max:5000|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
           'file' => 'required|mimes:doc,docx,pdf|max:10000',
        ]);
         $product= new Product();
         $product->f_name=$request->input('f_name');
         $product->l_name=$request->input('l_name');
         $product->dob=Carbon::parse(request('dob'))->format('Y-m-d');
         if($request->hasFile('image_1'))
         {
             $file=$request->file('image_1');
             $extension=$file->getClientOriginalName();
             $filename=time().'-'.$extension;
             $file->move('uploads/products_1/',$filename);
             $product->image_1=$filename;
         }
         if($request->hasFile('image_2'))
         {
             $file=$request->file('image_2');
             $extension=$file->getClientOriginalName();
             $filename=time().'-'.$extension;
             $file->move('uploads/products_2/',$filename);
             $product->image_2=$filename;
         }
         if($request->hasFile('image_3'))
         {
             $file=$request->file('image_3');
             $extension=$file->getClientOriginalName();
             $filename=time().'-'.$extension;
             $file->move('uploads/products_3/',$filename);
             $product->image_3=$filename;
         }
         if($request->hasFile('file'))
         {
             $file=$request->file('file');
             $extension=$file->getClientOriginalName();
             $filename=time().'-'.$extension;
             $file->move('uploads/file/',$filename);
             $product->file=$filename;
         }
          $product->save();
          return redirect()->route('product.create')->with('success','Product Details added succesfully');
    }
}
