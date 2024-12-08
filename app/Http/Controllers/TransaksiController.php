<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\MasterKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function indexBooking()
    {
        $booking = DB::table('bookings')
            ->join('master_kamar', 'master_kamar.id_kamar', '=', 'bookings.id_kamar')
            ->join('users', 'users.id', '=', 'bookings.id_user')
            ->select('bookings.*', 'master_kamar.*', 'users.*')
            ->get();

        // return $booking;

        return view('booking.index', compact('booking'));
    }
    public function addBooking()
    {
        $booking = DB::table('bookings')
            ->join('master_kamar', 'master_kamar.id_kamar', '=', 'bookings.id_kamar')
            ->join('users', 'users.id', '=', 'bookings.id_user')
            ->select('bookings.*', 'master_kamar.*', 'users.*')
            ->get();
        $selectRoom = DB::table('master_kamar')->select('id_kamar', 'nama_kamar', 'harga_kamar')->get();
        return view('booking.add-form', compact('booking', 'selectRoom'));
    }
    public function storeBooking(Request $request)
    {
        $status = "onProgress";
        $user = Auth::user()->id;
        $id_kamar = $request->id_kamar;
        $jumlah_kamar = $request->jumlah;
        $sumUnavailable = Booking::where('id_kamar', $id_kamar)
            ->where('status', 'onProgress')
            ->sum('jumlah');
        $allJumlahKamar = MasterKamar::where('id_kamar', $id_kamar)->first();
        // return $allJumlahKamar->stok;
        $getAvailable = $allJumlahKamar->stok - $sumUnavailable;
        // return $getAvailable;

        if ($getAvailable >= $jumlah_kamar) {
            Booking::create([
                'kd_pemesanan' => $request->kd_pemesanan,
                'guest' => $request->guest,
                'id_kamar' => $id_kamar,
                'jumlah' => $jumlah_kamar,
                'tanggal_checkin' => $request->tanggal_checkin,
                'tanggal_checkout' => $request->tanggal_checkout,
                'id_user' => $user,
                'status' => $status,
                'metode_pembayaran' => $request->metode_pembayaran
            ]);
        } else {
            return redirect('/booking')->with('error', 'Jumlah kamar tidak tersedia');
            // dd($sumUnavailable, $allJumlahKamar, $getAvailable);
        }
        // $id = str_increment('id');

        // $kamar = MasterKamar::where('id_kamar', $id_kamar)->first();
        // $stok_berkurang = $kamar->stok - $jumlah_kamar;
        // MasterKamar::where('id_kamar', $id_kamar)->update([
        //     'stok' => $stok_berkurang
        // ]);
        return redirect('/booking');
    }
    public function cancelBooking($id_booking)
    {
        Booking::where('id_booking', $id_booking)->update([
            'status' => 'cancel'
        ]);
        return redirect('/booking');
    }
    public function doneBooking($id_booking)
    {
        Booking::where('id_booking', $id_booking)->update([
            'status' => 'done'
        ]);
        return redirect('/booking');
    }
}
