<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public $product;
    private $cartProducts;

    public function index()
    {
        $this->cartProducts = Cart::getContent();
        return view('front.cart.cart-products', ['cartProducts' => $this->cartProducts]);
    }

    public function adToCart(Request $request, $id)
    {
        $this->product = Product::find($id);
        Cart::add([
            'id'         => $this->product->id,
            'name'       => $this->product->name,
            'price'      => $this->product->selling_price,
            'quantity'   => $request->qty,
            'attributes' => [
                'image'  => $this->product->image
            ]
        ]);

        return redirect('/cart-products');

    }

    public function update(Request $request, $id)
    {
        if ($request->qty < 1)
        {
            return redirect('/cart-products');

        }

        else
        {
            Cart::update($id,[
                'quantity' => [
                    'relative' => false,
                    'value'    => $request->qty
                ]
            ]);
            return redirect('/cart-products');
        }



    }

    public function remove($id)
    {

        Cart::remove($id);
        return redirect('/cart-products');
    }

}
