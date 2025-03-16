<?php

namespace App\Http\Controllers\Pos;

use App\Models\Merk;
use App\Helper\tisas;
use App\Models\inventory;
use App\Models\JenisMobil;
use App\Exports\StockExport;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Illuminate\Support\Carbon;
use App\Exports\InventoryExport;
use App\Exports\StockBeliExport;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Pembayaran;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log; // Import the Log facade

class MasterController extends Controller
{

    public function logout(Request $request)
    {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // New Barang Controller
    public function index_barang(Request $request)
    {
        $data = Barang::all();
        if ($request->ajax()) {

            // Apply custom filter if provided
            if ($request->customFilter) {
                $data->where(function($query) use ($request) {
                    $query->where('nama', 'like', '%' . $request->customFilter . '%');
                });
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend1.master.barang.index', compact('data'));
    }

    public function store_barang(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Barang::create([
            'nama' => $request->nama,
            'created_by' => Auth::user()->id,
        ]);
        $notification = [
            'message' => 'Inventory Insert Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('index.barang')->with($notification);
    }

    public function update_barang(Request $request, $id)
    {
        $data = Barang::findOrFail($id);
        $data->update([
            'nama' => $request->nama,
            ]);
        return redirect()->route('index.barang');
    }

    public function delete_barang($id)
    {
        Barang::find($id)->delete();
        return redirect()->back();
    }

    // new pembayaran controller
    public function index_pembayaran(Request $request)
    {
        $data = Pembayaran::all();
        if ($request->ajax()) {

            // Apply custom filter if provided
            if ($request->customFilter) {
                $data->where(function($query) use ($request) {
                    $query->where('nama', 'like', '%' . $request->customFilter . '%');
                });
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend1.master.pembayaran.index', compact('data'));
    }

    public function store_pembayaran(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Pembayaran::create([
            'nama' => $request->nama,
            'created_by' => Auth::user()->id,
        ]);
        $notification = [
            'message' => 'Inventory Insert Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('index.pembayaran')->with($notification);
    }

    public function update_pembayaran(Request $request, $id)
    {
        $data = Pembayaran::findOrFail($id);
        $data->update([
            'nama' => $request->nama,
            ]);
        return redirect()->route('index.pembayaran');
    }

    public function delete_pembayaran($id)
    {
        Pembayaran::find($id)->delete();
        return redirect()->back();
    }
}
