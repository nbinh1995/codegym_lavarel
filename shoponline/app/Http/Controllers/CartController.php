<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        if (session('cart')) {
            $cart_data = Session::get('cart');
        } else {
            $cart_data = array();
        }
        $item_id_list = array_column($cart_data, 'product_id');
        if (in_array($request->product_id, $item_id_list)) {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["product_id"] == $_POST["product_id"]) {
                    $cart_data[$keys]["product_amount"] = $cart_data[$keys]["product_amount"] + $request->product_amount;
                    $cart_data[$keys]["product_total"] = $cart_data[$keys]["product_amount"] * $cart_data[$keys]["product_price"];
                }
            }
        } else {
            $item_array = array(
                'product_id'       =>   $request->product_id,
                'product_name'     =>   $request->product_name,
                'product_img'      =>   $request->product_img,
                'product_price'    =>   $request->product_price,
                'product_amount'   =>   $request->product_amount,
                'product_total'   =>   $request->product_amount * $request->product_price
            );
            $cart_data[] = $item_array;
        }
        foreach ($cart_data as $item) {
        }
        Session::put('cart', $cart_data);
        $table = view('partials.table', ['product' => $cart_data])->render();
        return response()->json($table, 200);
    }

    public function updateCart(Request $request)
    {
        $cart_data = Session::get('cart');
        foreach ($cart_data as $keys => $values) {
            if ($cart_data[$keys]['product_id'] == $request->product_id) {
                $cart_data[$keys]['product_amount'] = $request->product_amount;
                $cart_data[$keys]['product_total'] = $cart_data[$keys]['product_amount'] * $cart_data[$keys]['product_price'];
                Session::put('cart', $cart_data);
                $table = view('partials.table', ['product' => $cart_data])->render();
                return response()->json($table, 200);
            }
        }
    }
    public function clearCart()
    {
        Session::flush('cart');
        $table = view('partials.table', ['product' => ''])->render();
        return response()->json($table, 200);
    }

    public function removeCart($id)
    {
        $cart_data = Session::get('cart');
        foreach ($cart_data as $keys => $values) {
            if ($cart_data[$keys]['product_id'] == $id) {
                unset($cart_data[$keys]);
                Session::put('cart', $cart_data);
                $table = view('partials.table', ['product' => $cart_data])->render();
                return response()->json($table, 200);
            }
        }
    }
}
