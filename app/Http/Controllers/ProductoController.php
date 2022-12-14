<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductoController extends Controller
{
    public function index()
    {
        $response = Http::withBasicAuth(
            env('WC_CONSUMER_KEY'),
            env('WC_CONSUMER_SECRET')
        )->get(env('WC_STORE_URL') . '/products');

        return $response->json();

        // $productos = app('db')->connection('mysql2')->select('SELECT * FROM wp_wc_product_meta_lookup');
        // return response()->json($productos);
    }
}
