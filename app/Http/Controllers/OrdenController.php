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
        /* $result = DB::connection('mysql')->insert(
            'INSERT INTO ventas (total, metodo, cambio, fecha, cliente, hora) VALUES (?,?,?,?,?,?)',
            [
                $request->total,
                $request->metodo,
                $request->cambio,
                $request->fecha,
                $request->cliente,
                $request->hora
            ]
        );

        if (!$result) {
            return response()->json('Registro no insertado', 400);
        } */

        return response()->json($request->total);
    }
}
