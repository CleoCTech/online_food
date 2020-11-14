<?php

namespace App\Http\Controllers;

use App\Dish;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    //

    public function insert(Request $request)
    {
        $dish = Dish::where('dish_id', $request->dish_id)->first();

        Cart::add([
            'id'=>$request->dish_id,
            'qty'=>$request->qty,
            'name'=>$dish->dish_name,
            'price'=>$dish->full_price,
            'weight'=>550,
            'options' => [
                'half_price' => $dish->half_price,
                'dish_image' => $dish->dish_image

            ]
        ]);

        // dd('ok');
        return redirect()->route('cart')->with('');
    }

    public function show(Request $request)
    {

        $cartDish =Cart::content();

       // return $cartDish;
        return view('FrontEnd.cart.show', compact('cartDish'));

    }

    public function destroy($id)
    {

        Cart::remove($id);

        return back();

    }
}
