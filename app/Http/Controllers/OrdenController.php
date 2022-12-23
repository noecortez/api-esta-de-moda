<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class OrdenController extends Controller
{
    public function index()
    {
        $response = Http::withBasicAuth(
            env('WC_CONSUMER_KEY'),
            env('WC_CONSUMER_SECRET')
        )->get(env('WC_STORE_URL') . '/orders');

        return $response->json();
    }

    public function crearOrden(Request $request)
    {
        print_r($request->all());
    }
}
