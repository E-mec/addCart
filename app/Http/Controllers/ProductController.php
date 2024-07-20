<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    'product_name' => $product->product_name,
                    'photo' => $product->photo,
                    'price' => $product->price,
                    'quantity' => 1
                ];
            }

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product Added To Cart');
    }

    public function cart() {
        return view('cart');
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product Removed Successfully');
        }
    }
}
