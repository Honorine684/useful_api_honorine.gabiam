<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShortenController extends Controller
{
    public function shorten(Request $request)
    {
        $request->validate([
            'original_url' => 'required|string|max:255',
            'custom_code'=>'required|string|max:255'
        ]);
        return response()->json([
            "id"=>1,
            "original_url"=>"https//example.com",
            "code"=>"abc123",
            "clicks"=>0,
            

        ],201);
    }
}
