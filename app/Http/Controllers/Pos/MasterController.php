<?php

namespace App\Http\Controllers\Pos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\MasterBrand;
use App\Models\MasterSupplier;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
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

    // New Supplier Controller
    public function index_supplier(Request $request)
    {
        $data = MasterSupplier::all();
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
        return view('backend1.master.supplier.index', compact('data'));
    }

    public function store_supplier(Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
            'no_hp' => 'nullable|',
            'vendor' => 'nullable|',
        ]);

        MasterSupplier::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'vendor' => $request->vendor,
            'created_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'Inventory Insert Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('index.supplier')->with($notification);
    }

    public function update_supplier(Request $request, $id)
    {
        $data = MasterSupplier::findOrFail($id);
        $data->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'vendor' => $request->vendor,
            'updated_by' => Auth::user()->id,
            ]);
        return redirect()->route('index.supplier');
    }

    public function delete_supplier($id)
    {
        MasterSupplier::find($id)->delete();
        return redirect()->back();
    }

    // New Brand Controller
    public function index_brand(Request $request)
    {
        $data = MasterBrand::all();
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
        return view('backend1.master.brand.index', compact('data'));
    }

    public function store_brand(Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
        ]);

        MasterBrand::create([
            'nama' => $request->nama,
            'created_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'Inventory Insert Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('index.brand')->with($notification);
    }

    public function update_brand(Request $request, $id)
    {
        $data = MasterBrand::findOrFail($id);
        $data->update([
            'nama' => $request->nama,
            'updated_by' => Auth::user()->id,
            ]);
        return redirect()->route('index.brand');
    }

    public function delete_brand($id)
    {
        MasterBrand::find($id)->delete();
        return redirect()->back();
    }
}
