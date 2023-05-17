<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Stripe;
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

    public function process_payment(Request $request)
    {
        // process payment

        $stripe = Stripe::make(env('STRIPE_SECRET'));
        
        $order_array = [];
        foreach($request->order as $order)
        {
            $order_array[$order['id']]['order_id'] = $order['id'];
            $order_array[$order['id']]['order_quantity'] = $order['quantity']
        }


        $token = $stripe->tokens()->create([
        'card' =>    [
            'number'=> $request-> card_number,
            'exp_month'=> $request-> exp_month,
            'exp_year'=> $request -> exp_year,
            'cvc'=> $request -> card_cvv
        ]]
    );

        if(!$token['id']){
            session()->flush('error' , 'Stripe token generation failed');
            return;
        }

        $customer = $stripe->customers()->create([
            'name' =>  auth()->user()->first_name.' '.auth()->user()->last_name,
            'email' =>  auth()->user()->email,
            'address' => [
                'line1' =>   auth()->user()->address,
                'country'=>  auth()->user()->address
            ],
            'shipping' => [
                'name' =>  auth()->user()->first_name.' '.auth()->user()->last_name,
                'address' => [
                    'line1' =>   auth()->user()->address,
                    'country'=>  auth()->user()->address
                ],
            ],

            'source'=> $token['id']
        ]);

        $charge = $stripe->charges()->create([
            'customer'=> $customer['id'],
            'currency'=> 'USD',
            'amount'  => 1,
            'description' => 'charge for payment'
        ]);

       
        if($charge['status'] == 'succeeded'){
            $customer_id_stripe = $charge['id'];
            $amount_rec = $charge['amount'];
            json_encode($order_array)
        }

  
    }
}