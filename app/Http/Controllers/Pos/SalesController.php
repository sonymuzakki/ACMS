<?php

namespace App\Http\Controllers\Pos;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;
use App\Helper\tisas;


class SalesController extends Controller
{
    protected $credential;

    public function __construct()
    {
        $this->credential = ['username' => 'intercom', 'password' => 'intercom123'];
    }

    public function getSales()
    {
        $tisas = new tisas;

        $response = $tisas->generateAccessToken($this->credential);
        $token = $response->data->token;

        // Mendapatkan data penjualan
        $salesData = $tisas->getSales($token, []);

        // Menampilkan data dalam tabel
        return view('backend.master.sales.index_sales', ['sales' => $salesData->data]);
    }

    public function getSpv()
    {
        $tisas = new tisas;

        $response = $tisas->generateAccessToken($this->credential);
        $token = $response->data->token;

        $spvData = $tisas->getSpv($token, []);

        return view('backend.master.supervisor.index_spv', ['spv' => $spvData->data]);
    }
}
