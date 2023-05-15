<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get user cart
       $user_cart = Cart::where('user_id', auth()->user()->id)->sum('quantity');

       
       if($user_cart){
        return ['message'=> 'Cart updated','items'=>$user_cart];
       }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // get product data
       $product = Product::where('id',$request->get('product_id'))->first();
     
       // check if product found in cart
       $product_found_in_cart = Cart::where('product_id' , $request->get('product_id') )->where('user_id', auth()->user()->id)->pluck('id');


  

        if($product_found_in_cart->isEmpty()){
            $cart = Cart::create([
                'product_id' => $product->id,
                'quantity'   => 1,
                'price'      => $product->sale_price,
                'user_id'    => auth()->user()->id,
                'image'      => $product->image_name,
                'name'       => $product->name
            ]);
        }
        else {
            $cart = Cart::where('product_id' , $request->get('product_id'))->increment('quantity');
        }

        // get user cart
       $user_cart = Cart::where('user_id', auth()->user()->id)->sum('quantity');
    
        if($cart){
         return ['message'=> 'Cart Updated','items'=>$user_cart];
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
         // get user cart
         $user_cart = Cart::where('user_id', auth()->user()->id)->get();

        return view('pages.checkout', compact('user_cart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
