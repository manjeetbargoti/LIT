<?php

namespace App\Http\Controllers;

use Session;
use App\Cart;
use App\SocialInitiative;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\InstaCampaigns;

class CartController extends Controller
{
    // Add to Cart functionality
    public function addInitiativeToCart(Request $request, $id=null)
    {
        $addInitiative = SocialInitiative::find($id);

        // dd($addInitiative);

        if(!$addInitiative) {
 
            abort(404);
 
        }

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->add($addInitiative, $addInitiative->id);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->back();

    }

    // Add to Cart functionality
    public function addDgitalServiceToCart(Request $request, $id=null)
    {
        $addInitiative = InstaCampaigns::find($id);

        // dd($addInitiative);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->add($addInitiative, $addInitiative->id);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->back();

    }

    // Remove Product from cart
    public function removeFromCart(Request $request, $id=null)
    {
        $data = $request->id;
        // dd($data);
        if($request->id)
        {
            $cart = session()->get('cart');
            // dd($cart);
            if(isset($cart[$request->id]))
            {
                unset($cart[$request->id]);
                // dd($cart);

                session()->put('cart', $cart);
            }

            return redirect()->back()->with('success', 'Initiative removed successfully');
        }
        // Session::forget('cart');
        // return redirect()->back();
    }

    // Add to Cart (On-ground Initiative)
    public function addToCart($id)
    {
        $addInitiative = SocialInitiative::find($id);

        // dd($addInitiative);

        if(!$addInitiative) {
 
            abort(404);
 
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart)
        {
            $cart = [
                'On'.$id => [
                    'id' => $addInitiative->id,
                    'rid' => 'On'.$addInitiative->id,
                    'type' => 'Onground',
                    'name' => $addInitiative->initiative_name,
                    'budget' => $addInitiative->budget,
                    'duration' => $addInitiative->duration,
                    'beneficiaries' => $addInitiative->beneficiaries,
                    'qty' => 1
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Initiative added to impact box successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart['On'.$id]))
        {
            $cart['On'.$id]['qty']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Initiative added to impact box successfully!');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart['On'.$id] = [
            'id' => $addInitiative->id,
            'rid' => 'On'.$addInitiative->id,
            'type' => 'Onground',
            'name' => $addInitiative->initiative_name,
            'budget' => $addInitiative->budget,
            'duration' => $addInitiative->duration,
            'beneficiaries' => $addInitiative->beneficiaries,
            'qty' => 1
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Initiative added to impact box successfully!');
    }

    // Add to Cart (360 Digital Initiative)
    public function addToCart360($id)
    {
        $addInitiative = InstaCampaigns::find($id);

        // dd($addInitiative);

        if(!$addInitiative) {
 
            abort(404);
 
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart)
        {
            $cart = [
                '3D'.$id => [
                    'id' => $addInitiative->id,
                    'rid' => '3D'.$addInitiative->id,
                    'type' => '360',
                    'name' => $addInitiative->service_name,
                    'budget' => $addInitiative->budget,
                    'duration' => $addInitiative->duration,
                    'beneficiaries' => $addInitiative->beneficiaries,
                    'qty' => 1
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Initiative added to impact box successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart['3D'.$id]))
        {
            $cart['3D'.$id]['qty']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Initiative added to impact box successfully!');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart['3D'.$id] = [
            'id' => $addInitiative->id,
            'rid' => '3D'.$addInitiative->id,
            'type' => '360',
            'name' => $addInitiative->service_name,
            'budget' => $addInitiative->budget,
            'duration' => $addInitiative->duration,
            'beneficiaries' => $addInitiative->beneficiaries,
            'qty' => 1
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Initiative added to impact box successfully!');
    }
}
