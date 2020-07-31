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
            $cart_data = session('cart');
        } else {
            $cart_data = array();
            $cart_data['item'] = array();
        }
        $cart_item = $cart_data['item'];
        $item_id_list = array_column($cart_item, 'product_id');
        if (in_array($request->product_id, $item_id_list)) {
            foreach ($cart_item as $keys => $values) {
                if ($cart_item[$keys]["product_id"] == $request->product_id) {
                    $cart_item[$keys]["product_amount"] = $cart_item[$keys]["product_amount"] + $request->product_amount;
                    $cart_item[$keys]["product_total"] = $cart_item[$keys]["product_amount"] * $cart_item[$keys]["product_price"];
                }
            }
        } else {
            $item_array = array(
                'product_id'       =>   $request->product_id,
                'product_name'     =>   $request->product_name,
                'product_img'      =>   $request->product_img,
                'product_price'    =>   $request->product_price,
                'product_amount'   =>   $request->product_amount,
                'product_total'    =>   $request->product_amount * $request->product_price
            );
            $cart_item[] = $item_array;
        }
        $cart_total = 0;
        $cart_count = 0;
        foreach ($cart_item as $item) {
            $cart_total += $item['product_total'];
            $cart_count += $item['product_amount'];
        }
        $cart_data['item'] =  $cart_item;
        $cart_data['count'] =  $cart_count;
        $cart_data['total'] =  $cart_total;
        Session::put('cart', $cart_data);
        $table = view('partials.table', ['product' => $cart_data])->render();
        $hover = view('partials.hover_cart')->render();
        return response()->json(['hover' => $hover, 'count' => $cart_count], 200);
    }

    public function updateCart(Request $request)
    {
        $cart_data = Session::get('cart');
        $cart_item = $cart_data['item'];
        $cart_count = 0;
        $cart_total = 0;
        foreach ($cart_item as $keys => $values) {
            if ($cart_item[$keys]['product_id'] == $request->product_id) {
                $cart_item[$keys]['product_amount'] = $request->product_amount;
                $cart_item[$keys]['product_total'] = $cart_item[$keys]['product_amount'] * $cart_item[$keys]['product_price'];
            }
        }
        foreach ($cart_item as $item) {
            $cart_total += $item['product_total'];
            $cart_count += $item['product_amount'];
        }
        $cart_data['item'] =  $cart_item;
        $cart_data['count'] =  $cart_count;
        $cart_data['total'] =  $cart_total;
        Session::put('cart', $cart_data);
        $table = view('partials.table', ['product' => $cart_data])->render();
        $hover = view('partials.hover_cart')->render();
        return response()->json(['table' => $table, 'hover' => $hover, 'count' => $cart_count], 200);
    }
    public function clearCart()
    {
        Session::flush('cart');
        $table = view('partials.table', ['product' => ''])->render();
        $hover = view('partials.hover_cart')->render();
        return response()->json(['table' => $table, 'hover' => $hover, 'count' => '0'], 200);
    }

    public function removeCart($id)
    {
        $cart_data = Session::get('cart');
        $cart_item = $cart_data['item'];
        $cart_count = 0;
        $cart_total = 0;
        foreach ($cart_item as $keys => $values) {
            if ($cart_item[$keys]['product_id'] == $id) {
                unset($cart_item[$keys]);
            } else {
                $cart_total += $values['product_total'];
                $cart_count += $values['product_amount'];
            }
        }
        $cart_data['item'] =  $cart_item;
        $cart_data['count'] =  $cart_count;
        $cart_data['total'] =  $cart_total;
        if ($cart_data['count'] === 0) {
            Session::flush('cart');
            $table = view('partials.table', ['product' => ''])->render();
            $hover = view('partials.hover_cart')->render();
        } else {
            Session::put('cart', $cart_data);
            $table = view('partials.table', ['product' => $cart_data])->render();
            $hover = view('partials.hover_cart')->render();
        }
        return response()->json(['table' => $table, 'hover' => $hover, 'count' => $cart_count], 200);
    }
}
