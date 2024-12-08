<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\MasterKamar;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function indexMasterKamar()
    {
        $kamars = MasterKamar::all();
        return view('kamar.index', compact('kamars'));
    }
    public function addMasterKamar()
    {
        return view('kamar.add');
    }
    public function storeMasterKamar(Request $request)
    {
        MasterKamar::create([
            'nama_kamar' => $request->nama_kamar,
            'deskripsi_kamar' => $request->deskripsi_kamar,
            'harga_kamar' => $request->harga_kamar,
            'fasilitas' => $request->fasilitas,
            'stok' => $request->stok
        ]);
        return redirect('/kamar');
    }
    public function editMasterKamar($id_kamar)
    {
        $kamar = MasterKamar::where('id_kamar', $id_kamar)->first();
        return view('kamar.edit', compact('kamar'));
    }
    public function updateMasterKamar($id_kamar, Request $request)
    {
        $kamar = MasterKamar::where('id_kamar', $id_kamar)->first();
        // return $kamar;
        if (!$kamar) {
            return redirect('/kamar');
        }
        $kamar->where('id_kamar', $id_kamar)->update([
            'nama_kamar' => $request->nama_kamar,
            'deskripsi_kamar' => $request->deskripsi_kamar,
            'harga_kamar' => $request->harga_kamar,
            'fasilitas' => $request->fasilitas,
            'stok' => $request->stok
        ]);
        return redirect('/kamar');
    }
    public function deleteMasterKamar($id_kamar)
    {
        $kamar = MasterKamar::where('id_kamar', $id_kamar)->delete();
        // $kamar->delete();
        return redirect('/kamar');
    }

    public function Dashboard()
    {
        $kamar = MasterKamar::where('stok', '>=', 0)
            // ->select('master_kamar.*')
            ->get();
        // return $kamar;
        foreach ($kamar as $item) {
            $item->booking = Booking::where('status', 'onProgress')
                ->where('id_kamar', $item->id_kamar)
                ->sum('jumlah');
            $item->sisa = $item->stok - $item->booking;
        }
        // return $booking;



        return view('dashboard', compact('kamar'));

        // $tersedia = MasterKamar::where('stok', '>', $sisa)->count();
    }
}
