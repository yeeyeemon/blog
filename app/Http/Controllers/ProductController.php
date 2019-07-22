<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    // public function __construct(){
    //     return $this->middleware('auth');
    // }
    public function index(Request $request){
        $request->session()->forget('products');
        $products = Product::all();
        return view('products.index',compact('products',$products));
    }
    public function createStep1(Request $request){
        return view('products.create_step1');
    }
    public function returnStep1(Request $request){
        $product = $request->session()->get('product');
        return view('products.return_step1',compact('product'));
    }

    public function postCreateStep1(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:products',
            'amount' => 'required|numeric',
            'company' => 'required',
            'available' => 'required',
            'description' => 'required',
        ]);

        if(empty($request->session()->get('product'))){
            $product = new Product();
            $product->fill($validatedData);
            $request->session()->put('product', $product);
        }else{
            $product = $request->session()->get('product');
            $product->fill($validatedData);
            $request->session()->put('product', $product);
        }
        

        return redirect('/products/create-step2');

    }
    public function createStep2(Request $request)
    {
        $product = $request->session()->get('product');
        return view('products.create_step2',compact('product', $product));
    }

    public function postCreateStep2(Request $request)
    {
        $product = $request->session()->get('product');
        if(!isset($product->productImg)) {
            $request->validate([
                'productimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $fileName = "productImage-" . time() . '.' . request()->productimg->getClientOriginalExtension();

            $request->productimg->storeAs('productimg', $fileName);

            $product = $request->session()->get('product');

            $product->productImg = $fileName;
            $request->session()->put('product', $product);
        }
        return redirect('/products/create-step3');

    }

    /**
     * Show the Product Review page
     *
     * @return \Illuminate\Http\Response
     */
    public function removeImage(Request $request)
    {
        $product = $request->session()->get('product');
        $product->productImg = null;
        return view('products.create_step2',compact('product', $product));
    }

    /**
     * Show the Product Review page
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep3(Request $request)
    {
        $product = $request->session()->get('product');
        return view('products.create_step3',compact('product',$product));
    }

    /**
     * Store product
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $product=new Product();
        $product = $request->session()->get('product');
        $product->save();
        return redirect('/products');
    }

}
