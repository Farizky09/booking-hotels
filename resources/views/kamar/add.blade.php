@extends('layouts.master')

@section('main')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header text-center">
                <h4>Form Add Kamar</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('kamar.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_kamar" class="form-label">Nama Kamar</label>
                        <input type="text" class="form-control" id="nama_kamar" name="nama_kamar"
                            placeholder="Masukkan Nama Kamar" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_kamar" class="form-label">Deskripsi Kamar</label>
                        <textarea class="form-control" id="deskripsi_kamar" name="deskripsi_kamar" rows="3"
                            placeholder="Masukkan Deskripsi Kamar" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga_kamar" class="form-label">Harga Per Malam</label>
                        <input type="text" class="form-control" id="harga_kamar" name="harga_kamar"
                            placeholder="Masukkan Harga Per Malam" required>
                        {{-- <input type="number" id="harga_kamar_unformatted" name="harga_kamar"> --}}
                    </div>
                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">Fasilitas</label>
                        <input type="text" class="form-control" id="fasilitas" name="fasilitas"
                            placeholder="Masukkan Fasilitas (Pisahkan dengan koma)">
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok"
                            placeholder="Masukkan Stok Tersedia" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto_kamar" class="form-label">Foto Kamar</label>
                        <input type="file" class="form-control" id="foto_kamar" name="foto_kamar"
                            placeholder="Masukkan foto_kamar Tersedia" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kamar.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @elseif (session('error'))
                Swal.fire({
                    title: 'Gagal!',
                    text: "{{ session('error') }}",
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
    {{-- <script>
        const hargaInput = document.getElementById('harga_kamar');
        const hargaInputHidden = document.getElementById('harga_kamar_unformatted');

        // Fungsi untuk format ke Rupiah
        function formatRupiah(value) {
            let numberString = value.replace(/[^,\d]/g, ''); // Hanya angka
            let split = numberString.split(',');
            let sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return 'Rp ' + (split[1] !== undefined ? rupiah + ',' + split[1] : rupiah);
        }

        // Event Listener untuk Input
        hargaInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^,\d]/g, ''); // Hapus karakter non-angka
            if (!value) {
                hargaInputHidden.value = '';
                return (e.target.value = '');
            }

            // Format dan set ke input tampilan
            hargaInput.value = formatRupiah(value);

            // Set nilai asli ke input hidden
            hargaInputHidden.value = value;
        });

        // Optional: Menangani saat input kehilangan fokus
        hargaInput.addEventListener('blur', function(e) {
            if (e.target.value) {
                // Jika ada nilai, format ulang untuk memastikan tidak ada koma di akhir
                let value = e.target.value.replace(/[^,\d]/g, '');
                hargaInput.value = formatRupiah(value);
            }
        });
    </script> --}}
@endpush
