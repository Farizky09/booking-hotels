@extends('layouts.master')

@push('style')
    {{-- Tambahkan CSS Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

@section('main')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block-head nk-block-head-sm">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Form Booking</h4>
                                </div>
                            </div>
                        </div><!-- .nk-block-head -->
                        @php
                            $userName = Auth::user()->name; // Nama user
                            $kdUser = Auth::user()->id; // Mengambil 3 huruf pertama dan diubah ke huruf besar

                            // Mendapatkan tanggal
                            $date = \Carbon\Carbon::now()->format('Ymd'); // Format tanggal jadi YYYYMMDD

                            // Mendapatkan nomor increment terakhir
                            $lastPesan = DB::table('bookings') // Ganti 'pesanan' dengan nama tabel yang sesuai
                                ->select('kd_pemesanan')
                                ->where('kd_pemesanan', 'like', "P-$date/$kdUser/%")
                                ->orderBy('kd_pemesanan', 'desc')
                                ->first();

                            if ($lastPesan) {
                                $lastNumber = intval(explode('/', $lastPesan->kd_pemesanan)[2]);
                                $increment = $lastNumber + 1;
                            } else {
                                $increment = 1; // Jika belum ada, mulai dari 1
                            }

                            // Membuat kdPesan baru
                            $kdPesan = "P-$date/$kdUser/" . str_pad($increment, 3, '0', STR_PAD_LEFT);
                        @endphp
                        <div class="nk-block">
                            <div class="card card-bordered p-4">
                                <form action="{{ route('booking.store') }}" method="POST">
                                    @csrf
                                    <div class="row g-4">
                                        <!-- Informasi Pemesanan -->
                                        <div class="col-12">
                                            <h5 class="fw-bold">Informasi Pemesanan</h5>
                                            <div class="row g-3">
                                                <!-- Kode Pemesanan -->
                                                <div class="col-md-6">
                                                    <label for="kd_pemesanan" class="form-label">Kode Pemesanan</label>
                                                    <input type="text" class="form-control" id="kd_pemesanan"
                                                        name="kd_pemesanan" placeholder="Masukkan Kode Pemesanan"
                                                        value="{{ $kdPesan }}" required>
                                                </div>
                                                <!-- Customer -->
                                                <div class="col-md-6">
                                                    <label for="name" class="form-label">Customer</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        value="{{ $userName }}" readonly required>
                                                </div>

                                                <!-- Guest -->
                                                <div class="col-md-6">
                                                    <label for="guest" class="form-label">Guest</label>
                                                    <input type="text" class="form-control" id="guest" name="guest"
                                                        placeholder="Masukkan Nama Guest" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Informasi Kamar -->
                                        <div class="col-12">
                                            <h5 class="fw-bold">Informasi Kamar</h5>
                                            <div class="row g-3">
                                                <!-- Jenis Kamar -->
                                                <div class="col-md-6">
                                                    <label for="kode_kamar" class="form-label">Jenis Kamar</label>
                                                    <select class="form-select" id="kode_kamar" name="id_kamar" required>
                                                        <option value="" selected disabled>Pilih Jenis Kamar</option>
                                                        @foreach ($selectRoom as $item)
                                                            <option value="{{ $item->id_kamar }}"
                                                                data-harga="{{ $item->harga_kamar }}">
                                                                {{ $item->nama_kamar }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Harga Per Malam -->
                                                <div class="col-md-6">
                                                    <label for="harga_perMalam" class="form-label">Harga Per Malam</label>
                                                    <input type="text" class="form-control" id="harga_perMalam_display"
                                                        placeholder="Harga Per Malam" readonly>
                                                    <input type="hidden" id="harga_perMalam" name="harga_perMalam">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jumlah" class="form-label">Jumlah Kamar</label>
                                            <input type="number" class="form-control" id="jumlah" name="jumlah"
                                                placeholder="Masukkan Jumlah Kamar" required>
                                        </div>

                                        <!-- Informasi Tambahan -->
                                        <div class="col-12">
                                            <h5 class="fw-bold">Informasi Tambahan</h5>
                                            <div class="row g-3">
                                                <!-- Jumlah Kamar -->


                                                <!-- Tanggal Check-In -->
                                                <div class="col-md-6">
                                                    <label for="tanggal_checkin" class="form-label">Tanggal Check-In</label>
                                                    <input type="date" class="form-control" id="tanggal_checkin"
                                                        name="tanggal_checkin" required>
                                                </div>

                                                <!-- Tanggal Check-Out -->
                                                <div class="col-md-6">
                                                    <label for="tanggal_checkout" class="form-label">Tanggal
                                                        Check-Out</label>
                                                    <input type="date" class="form-control" id="tanggal_checkout"
                                                        name="tanggal_checkout" required>
                                                </div>



                                                <!-- Metode Pembayaran -->
                                                <div class="col-md-12">
                                                    <label for="metode_pembayaran" class="form-label">Metode
                                                        Pembayaran</label>
                                                    <select class="form-select" id="metode_pembayaran"
                                                        name="metode_pembayaran" required>
                                                        <option value="" selected disabled>Pilih Metode Pembayaran
                                                        </option>
                                                        <option value="Cash">Cash</option>
                                                        <option value="Credit Card">Credit Card</option>
                                                        <option value="Bank Transfer">Bank Transfer</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Total Pembayaran -->
                                        <div class="col-12 text-center mt-4">
                                            <div class="bg-primary text-white p-3 rounded">
                                                <h4 class="mb-1">Total Pembayaran</h4>
                                                <h2 id="total_pembayaran_display">Rp 0</h2>
                                                <input type="hidden" id="total_pembayaran" name="total_pembayaran">
                                            </div>
                                        </div>
                                        <!-- Nominal Bayar -->
                                        <div class="col-12">
                                            <label for="nominal_bayar" class="form-label">Nominal Bayar</label>
                                            <input type="number" class="form-control" id="nominal_bayar"
                                                placeholder="Masukkan Nominal Bayar" required>
                                        </div>

                                        <!-- Kembalian -->
                                        <div class="col-12">
                                            <label for="kembalian" class="form-label">Kembalian</label>
                                            <input type="text" class="form-control" id="kembalian_display"
                                                placeholder="Kembalian" readonly>
                                            <input type="hidden" id="kembalian" name="kembalian">
                                        </div>

                                        <!-- Tombol Aksi -->
                                        <div class="col-12 text-end mt-4">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <a href="{{ route('booking.index') }}" class="btn btn-secondary">Kembali</a>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div><!-- .nk-block -->
                    </div>
                </div>
            </div><!-- .components-preview -->
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const kodeKamar = document.getElementById("kode_kamar");
            const hargaPerMalamDisplay = document.getElementById("harga_perMalam_display");
            const hargaPerMalam = document.getElementById("harga_perMalam");
            const jumlah = document.getElementById("jumlah");
            const tanggalCheckin = document.getElementById("tanggal_checkin");
            const tanggalCheckout = document.getElementById("tanggal_checkout");
            const totalPembayaranDisplay = document.getElementById("total_pembayaran_display");
            const totalPembayaran = document.getElementById("total_pembayaran");
            const nominalBayar = document.getElementById("nominal_bayar");
            const kembalianDisplay = document.getElementById("kembalian_display");
            const kembalian = document.getElementById("kembalian");

            function calculateTotal() {
                const harga = parseInt(hargaPerMalam.value || 0);
                const jumlahKamar = parseInt(jumlah.value || 0);
                const checkin = new Date(tanggalCheckin.value);
                const checkout = new Date(tanggalCheckout.value);

                // Hitung total hari menginap
                const totalHari = (checkout - checkin) / (1000 * 60 * 60 * 24);

                if (totalHari > 0 && harga > 0 && jumlahKamar > 0) {
                    const total = harga * jumlahKamar * totalHari;

                    totalPembayaranDisplay.textContent = `Rp ${total.toLocaleString()}`;
                    totalPembayaran.value = total;
                } else {
                    totalPembayaranDisplay.textContent = "Rp 0";
                    totalPembayaran.value = 0;
                }
                calculateChange();
            }

            function calculateChange() {
                const total = parseInt(totalPembayaran.value || 0);
                const bayar = parseInt(nominalBayar.value.replace(/[^,\d]/g, "") ||
                    0); // Pastikan bayar bersih dari karakter non-angka

                const kembali = bayar - total; // Hitung selisih (bisa negatif)

                // Format nilai kembalian sebagai Rupiah, termasuk nilai negatif
                kembalianDisplay.value = `Rp ${kembali.toLocaleString('id-ID')}`;
                kembalian.value = kembali;
            }


            kodeKamar.addEventListener("change", function() {
                const selectedOption = this.options[this.selectedIndex];
                const harga = selectedOption.getAttribute("data-harga");
                hargaPerMalamDisplay.value = `Rp ${parseInt(harga).toLocaleString()}`;
                hargaPerMalam.value = harga;
                calculateTotal();
            });

            jumlah.addEventListener("input", calculateTotal);
            tanggalCheckin.addEventListener("change", calculateTotal);
            tanggalCheckout.addEventListener("change", calculateTotal);
            nominalBayar.addEventListener("input", calculateChange);
        });
    </script>
@endpush
