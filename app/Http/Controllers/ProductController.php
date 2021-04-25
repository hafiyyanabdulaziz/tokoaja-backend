<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function get()
    {
        $data = Product::all();
        return response()->json(
            [
                "message" => "GET Sukses",
                "data" => $data
            ]
        );
    }

    function getByID($id)
    {
        $data = Product::where('id', $id)->get();
        return response()->json(
            [
                "message" => "GET Sukses",
                "data" => $data
            ]
        );
    }

    function post(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->toko = $request->toko;
        $product->isOpen = $request->isOpen;
        $product->description = $request->description;

        $product->save();

        return response()->json(
            [
                "message" => "POST Sukses",
                "data" => $product
            ]
        );
    }
}
