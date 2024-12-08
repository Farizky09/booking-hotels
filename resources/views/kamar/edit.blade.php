@extends('layouts.master')

@section('main')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header text-center">
                <h4>Form Add Kamar</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('kamar.update', $kamar->id_kamar) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_kamar" class="form-label">Nama Kamar</label>
                        <input type="text" class="form-control" id="nama_kamar" name="nama_kamar"
                            value="{{ $kamar->nama_kamar }}" placeholder="Masukkan Nama Kamar" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_kamar" class="form-label">Deskripsi Kamar</label>
                        <textarea class="form-control" id="deskripsi_kamar" name="deskripsi_kamar" rows="3"
                            placeholder="Masukkan Deskripsi Kamar" required> {{ $kamar->deskripsi_kamar }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga_kamar" class="form-label">Harga Per Malam</label>
                        <input type="text" class="form-control" id="harga_kamar" name="formatted_harga"
                            value="{{ $kamar->harga_kamar }}" placeholder="Masukkan Harga Per Malam" required>
                        <input type="hidden" id="harga_kamar_unformatted" name="harga_kamar"
                            value="{{ $kamar->harga_kamar }}">
                    </div>
                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">Fasilitas</label>
                        <input type="text" class="form-control" id="fasilitas" name="fasilitas"
                            value="{{ $kamar->fasilitas }}" placeholder="Masukkan Fasilitas (Pisahkan dengan koma)">
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="{{ $kamar->stok }}"
                            placeholder="Masukkan Stok Tersedia" required>
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
            @if (session('update'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: "{{ session('update') }}",
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
@endpush
