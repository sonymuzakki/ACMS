<?php

namespace App\Http\Controllers\Pos;

use App\Models\Aktifitas;
use App\Models\inventory;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;


class PengajuanController extends Controller

{
    public function index(Request $request)
    {
        $data = Pengajuan::with('aktifitas','aktifitas.inventory')->latest()->get();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                })
                // ->toJson();
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.pengajuan.pengajuan_credit',compact('data'));
    }

    public function AddPengajuan()
    {
        $data = Pengajuan::all();

        $aktifitas = Aktifitas::select('aktifitas.*', 'inventory.nopol')
                    ->join('inventory', 'aktifitas.inventory_id', '=', 'inventory.id')
                    ->where('inventory.status', '<>', 2)
                    ->where('aktifitas.jenis_pembelian', 'Credit')
                    ->get();

        // dd($aktifitas->all());
        return view('backend.pengajuan.add_pengajuan_credit', compact('data', 'aktifitas'));
    }

    public function getNoSPKByInventory($id)
    {
        $aktifitas = Aktifitas::where('id', $id)->get();
        $noSPKOptions = $aktifitas->pluck('no_spk')->unique()->toArray();

        return response()->json($noSPKOptions);
    }

    public function store(Request $request)
    {
        // Validate input form
        $requestData = $request->validate([
            'no_spk' => 'nullable|max:50',
            'aktifitas_id' => 'required',
            'harga_mobil' => 'required',
            'leasing' => 'required',
            'dp' => 'required',
            'dp_persen' => 'nullable',
            'angsuran' => 'required',
            'tenor' => 'required',
            'status' => 'nullable',
        ],
        // Validation warning messages
        [
            'aktifitas_id.required' => 'No Polisi tidak boleh kosong',
            'harga_mobil.required' => 'Harga Mobil tidak boleh kosong.',
            'dp.required' => 'Dp tidak boleh kosong.',
            'angsuran.required' => 'Angsuran tidak boleh kosong.',
            'tenor.in' => 'Tenor tidak boleh kosong.',
        ]);

        // Remove dots (.) from input values
        $requestData['harga_mobil'] = str_replace('.', '', $requestData['harga_mobil']);
        $requestData['dp'] = str_replace('.', '', $requestData['dp']);
        $requestData['dp_persen'] = str_replace('', '', $requestData['dp_persen']);
        $requestData['angsuran'] = str_replace('.', '', $requestData['angsuran']);

        // Convert values to integer
        $requestData['harga_mobil'] = (int) $requestData['harga_mobil'];
        $requestData['dp'] = (int) $requestData['dp'];
        $requestData['dp_persen'] = (float) $requestData['dp_persen'];
        $requestData['angsuran'] = (int) $requestData['angsuran'];

        // dd($requestData);

        // Save the data
        $data = new Pengajuan();
        $data->fill($requestData);

        // dd($data);

        // Clean up no_spk before saving
        $no_spk = $request->input('no_spk');
        $no_spk = str_replace(',', '', $no_spk);
        $data->no_spk = $no_spk;

        $data->save();

        return redirect()->route('pengajuan.index');
    }

    // public function EditPengajuan($id)
    // {
    //     $data = Pengajuan::find($id);
    //     // $aktifitas = Aktifitas::where('jenis_pembelian', 'Credit')->with('Inventory')->get();
    //     $aktifitas = Aktifitas::select('aktifitas.*', 'inventory.nopol')
    //                 ->join('inventory', 'aktifitas.inventory_id', '=', 'inventory.id')
    //                 ->where('inventory.status', '<>', 2)
    //                 ->where('aktifitas.jenis_pembelian', 'Credit')
    //                 ->get();
    //     return view('backend.pengajuan.edit_pengajuan_credit', compact('data', 'aktifitas'));
    // }
    public function EditPengajuan($id)
    {
        $data = Pengajuan::find($id);
        $aktifitas = Aktifitas::select('aktifitas.*', 'inventory.nopol')
                    ->join('inventory', 'aktifitas.inventory_id', '=', 'inventory.id')
                    ->where('inventory.status', '<>', 2)
                    ->where('aktifitas.jenis_pembelian', 'Credit')
                    ->get();
        return view('backend.pengajuan.edit_pengajuan_credit', compact('data', 'aktifitas'));
    }

    // public function UpdatePengajuan(Request $request, $id)
    // {
    //     // Temukan data pengajuan berdasarkan ID
    //     $data = Pengajuan::findOrFail($id);

    //     // Validasi input
    //     $request->validate([
    //         'no_spk' => 'nullable|max:50',
    //         'aktifitas_id' => 'nullable',
    //         'Leasing' => 'nullable|in:MTF,TAF,ACC,ADIRA,BCA FINANCE,BFI SHARIA, OTO MULTIARTHA , BRI FINANCE, CLIPAN FINANCE',
    //         'harga_mobil' => 'nullable',
    //         'dp' => 'nullable',
    //         'dp_persen' => 'nullable',
    //         'angsuran' => 'nullable',
    //         'tenor' => 'nullable',
    //     ]);

    //     // Proses nilai input untuk dp, dp_persen, dan angsuran
    //     $harga_mobil = str_replace('.', '', $request->input('harga_mobil')); // Mengganti koma dengan titik untuk desimal
    //     $dp = str_replace('.', '', $request->input('dp'));
    //     $dp_persen = str_replace('', '.', str_replace('.', '', $request->input('dp_persen')));
    //     $angsuran = str_replace('.', '', $request->input('angsuran'));

    //     // Konversi nilai ke tipe data yang sesuai
    //     $harga_mobil = is_null($harga_mobil) ? null : (int) $harga_mobil;
    //     $dp = is_null($dp) ? null : (int) $dp;
    //     $dp_persen = is_null($dp_persen) ? null : (float) $dp_persen;
    //     $angsuran = is_null($angsuran) ? null : (int) $angsuran;

    //     // Update data pengajuan dengan data baru yang sudah diproses
    //     // $data->update([
    //     //     'no_spk' => $request->input('no_spk'),
    //     //     'leasing' => $request->input('leasing'),
    //     //     'harga_mobil' => $harga_mobil,
    //     //     'dp' => $dp,
    //     //     'dp_persen' => $dp_persen,
    //     //     'angsuran' => $angsuran,
    //     //     'tenor' => $request->input('tenor'),
    //     //     'status' => $request->input('status'),
    //     // ]);

    //      // Update data pengajuan dengan data baru yang sudah diproses
    //      $data->update([
    //         'no_spk' => $request->input('no_spk'),
    //         'leasing' => $request->input('leasing'),
    //         'harga_mobil' => $harga_mobil,
    //         'dp' => $dp,
    //         'dp_persen' => $dp_persen,
    //         'angsuran' => $angsuran,
    //         'tenor' => $request->input('tenor'),
    //         'status' => $request->input('status'),
    //     ]);

    //     // Cek jika status pengajuan diubah menjadi 2 (reject)
    //     if ($request->input('status') == 2) {
    //         // Temukan entri di tabel Aktifitas berdasarkan aktifitas_id
    //         $aktifitas = Aktifitas::find($request->input('no_spk'));

    //         // Cek jika entri aktifitas ditemukan dan memiliki inventory_id
    //         if ($aktifitas && $aktifitas->inventory_id) {
    //             // Perbarui status pada tabel inventory menjadi available (0)
    //             $inventory = Inventory::find($aktifitas->inventory_id);
    //             if ($inventory) {
    //                 $inventory->status = 0;
    //                 $inventory->save();
    //             }
    //         }
    //     }

    //     // Redirect ke halaman yang sesuai atau tampilkan pesan berhasil
    //     return redirect()->route('pengajuan.index')->with('success', 'Data berhasil diupdate.');
    // }



public function UpdatePengajuan(Request $request, $id)
{
    // Temukan data pengajuan berdasarkan ID
    $data = Pengajuan::findOrFail($id);

    // Validasi input
    $request->validate([
        'no_spk' => 'nullable|max:50',
        'aktifitas_id' => 'nullable',
        'Leasing' => 'nullable|in:MTF,TAF,ACC,ADIRA,BCA FINANCE,BFI SHARIA, OTO MULTIARTHA , BRI FINANCE, CLIPAN FINANCE',
        'harga_mobil' => 'nullable',
        'dp' => 'nullable',
        'dp_persen' => 'nullable',
        'angsuran' => 'nullable',
        'tenor' => 'nullable',
    ]);

    // Proses nilai input untuk dp, dp_persen, dan angsuran
    $harga_mobil = str_replace('.', '', $request->input('harga_mobil'));
    $dp = str_replace('.', '', $request->input('dp'));
    $dp_persen = str_replace('', '.', str_replace('.', '', $request->input('dp_persen')));
    $angsuran = str_replace('.', '', $request->input('angsuran'));

    // Konversi nilai ke tipe data yang sesuai
    $harga_mobil = is_null($harga_mobil) ? null : (int) $harga_mobil;
    $dp = is_null($dp) ? null : (int) $dp;
    $dp_persen = is_null($dp_persen) ? null : (float) $dp_persen;
    $angsuran = is_null($angsuran) ? null : (int) $angsuran;

    // dd($request->all());
    // Update data pengajuan dengan data baru yang sudah diproses
    $data->update([
        'no_spk' => $request->input('no_spk'),
        'leasing' => $request->input('leasing'),
        'harga_mobil' => $harga_mobil,
        'dp' => $dp,
        'dp_persen' => $dp_persen,
        'angsuran' => $angsuran,
        'tenor' => $request->input('tenor'),
        'status' => $request->input('status'),
    ]);

    // Log nilai untuk debugging
    Log::info('Pengajuan Updated: ', [
        'id' => $id,
        'status' => $request->input('status'),
        'aktifitas_id' => $request->input('aktifitas_id')
    ]);

    // Cek jika status pengajuan diubah menjadi 2 (reject)
    if ($request->input('status') == 2) {
        // Temukan entri di tabel Aktifitas berdasarkan aktifitas_id
        $aktifitas = Aktifitas::find($request->input('aktifitas_id'));

        // Cek jika entri aktifitas ditemukan dan memiliki inventory_id
        if ($aktifitas && $aktifitas->inventory_id) {
            // Perbarui status pada tabel inventory menjadi available (0)
            $inventory = Inventory::find($aktifitas->inventory_id);
            if ($inventory) {
                $inventory->status = 0;
                $inventory->save();
            }
        }
    }
    // Redirect ke halaman yang sesuai atau tampilkan pesan berhasil
    return redirect()->route('pengajuan.index')->with('success', 'Data berhasil diupdate.');
}

}
