<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $product = DB::table('products')->get();
        return view('all_products', compact('product'));
    }


    public function create()
    {
    }

    public function Store(Request $request)
    {


        $validatedData = $request->validate([
            'product_name' => 'required|unique:products|max:55',
        ]);


        $data = $request->except('_token');

        $product = new Product();
        $product->product_name = $data['product_name'];
        $product->cat_id = $data['cat_id'];
        $product->color_id = $data['color_id'];
        $product->size_id = $data['size_id'];
        $product->price = $data['price'];
        $product->save();

        $notification = array(
            'messege' => 'product Insert Done',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
