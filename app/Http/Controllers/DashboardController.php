<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $mobil = inventory::count();
        $mobilSold = inventory::whereIn('status', [2])->count();
        $mobilAvailable = inventory::whereIn('status', [0, 1])->count();

        return view('master1.dashboard', compact('mobil', 'mobilSold', 'mobilAvailable'));
    }
}
