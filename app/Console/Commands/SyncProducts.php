<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\type;

class SyncProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sincroniza los productos de las tiendas';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $response = Http::withBasicAuth(
            env('WC_CONSUMER_KEY'),
            env('WC_CONSUMER_SECRET')
        )->get(env('WC_STORE_URL') . '/products');

        $productosWC = $response->json();

        $productosLocalBodega = DB::select('SELECT * FROM bodega');

        if ( count($productosLocalBodega) !== count($productosWC) ) {
            // Codigo para sincronizar
        }

        /* foreach ($productosWC as $producto) {
            print_r($producto['name']);
        } */

    }
}
