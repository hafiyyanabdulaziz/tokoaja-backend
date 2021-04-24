<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    function get()
    {
        return response()->json(
            [
                "message" => "GET Sukses"
            ]
        );
    }

    function post()
    {
        return response()->json(
            [
                "message" => "POST Sukses"
            ]
        );
    }
}
