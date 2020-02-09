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
        Session::forget('cart');
        return redirect()->back();
    }
}
