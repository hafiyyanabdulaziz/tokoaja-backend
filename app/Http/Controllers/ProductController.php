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

    function put($id, Request $request)
    {
        $product = Product::where('id', $id)->first();
        $product->name = $request->name ? $request->name : $product->name;
        $product->toko = $request->toko ? $request->toko : $product->toko;
        $product->isOpen = $request->isOpen ? $request->isOpen : $product->isOpen;
        $product->description = $request->description ? $request->description : $product->description;

        $product->save();

        if ($product) {
            return response()->json(
                [
                    "message" => "PUT Sukses ID = " . $id
                ]
            );
        }
        return response()->json(
            [
                "message" => "PUT Gagal ID " . $id . " Tidak Ada"
            ],
            400
        );
    }

    function delete($id)
    {
        $product = Product::where('id', $id)->first();

        if ($product) {
            $product->delete();
            return response()->json(
                [
                    "message" => "DELETE Sukses ID = " . $id
                ]
            );
        }
        return response()->json(
            [
                "message" => "DELETE Gagal ID " . $id . " Tidak Ada"
            ],
            400
        );
    }
}
