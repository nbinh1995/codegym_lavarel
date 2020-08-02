<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = Product::all();

            return view('partials.tbody_product', compact('products'))->render();
        } catch (\Throwable $th) {

            return response()->json("lỗi");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $name = $request->file('img');

            $product = new Product();
            $product->category_id = $request->category_id;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->desc = $request->desc;
            if ($request->file('img')) {
                $imagePath = $request->file('img');
                $path = $imagePath->store('uploads', 'public');
                $product->img = '/storage/' . $path;
            }
            $product->save();

            // $data = $this->index();
            return response()->json(['data' => $product, 'code' => 200], 200);
        } catch (\Throwable $th) {

            return response()->json("lỗi");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        try {
            $edit = view('partials.form_edit', ['item_edit' => $product])->render();

            return response()->json(['data' => $edit, 'code' => 200], 200);
        } catch (\Throwable $th) {

            return response()->json("lỗi");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        try {
            $product->category_id = $request->category_id;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->desc = $request->desc;
            if ($request->file('img')) {
                $imagePath = $request->file('img');
                $path = $imagePath->store('uploads', 'public');
                $product->img = '/storage/' . $path;
            }
            $product->update();
            $data = view('partials.row_product', compact('product'))->render();
            return response()->json(['data' => $data, 'code' => 200], 200);
        } catch (\Throwable $th) {
            return response()->json("lỗi");
        }
        // $product->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            unlink(public_path($product->img));
            $product->delete();
            return response()->json([
                'code' => 200
            ], 200);
        } catch (\Throwable $th) {
            return response()->json("lỗi");
        }
    }

    public function showProduct()
    {
        try {
            $products = Product::paginate(6);

            return view('home', compact('products'));
        } catch (\Throwable $th) {

            return response()->json("lỗi");
        }
    }
    public function showSingle(Product $product)
    {
        return view('site.single', compact('product'));
    }

    public function showCheckout()
    {
        if (session('cart')) {
            $product = session('cart');
        } else $product = '';
        return view('site.cart', ['product' => $product]);
    }

    function validateData()
    {
        return request()->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'desc' => 'required',
            'img' => 'required|mimes:jpeg,bmp,png,gif,svg,webp'
        ]);
    }
}
