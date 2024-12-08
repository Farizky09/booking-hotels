@extends('layouts.master')
@push('style')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
@endpush
@section('main')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block-head nk-block-head-sm">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Data kamar</h4>
                                </div>
                                <div class="nk-block-head-content">
                                    <a href="{{ route('kamar.add') }}"
                                        class="btn btn-primary d-none d-md-inline-flex float-right"><em
                                            class="icon ni ni-plus"></em><span>Tambah</span></a>
                                </div>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block">
                            <div class="card card-bordered card-preview p-5">
                                <div class="card-inner">
                                    <table id="dataTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Kamar</th>
                                                <th>Deskripsi</th>
                                                <th>Harga</th>
                                                <th>Fasilitas</th>
                                                <th>Stok</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($kamars as $item)
                                                <tr>
                                                    <td>{{ $item->id_kamar }}</td>
                                                    <td>{{ $item->nama_kamar }}</td>
                                                    <td>{{ $item->deskripsi_kamar }}</td>
                                                    <td>{{ 'Rp ' . number_format($item->harga_kamar, 0, ',', '.') }}</td>
                                                    <td>{{ $item->fasilitas }}</td>
                                                    <td>{{ $item->stok }}</td>
                                                    <td>

                                                        <a href="{{ route('kamar.edit', $item->id_kamar) }}"
                                                            class="bx bx-edit"></a>

                                                        <a href="{{ route('kamar.destroy', $item->id_kamar) }}"
                                                            class="bx bx-trash"></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- .card-preview -->
                        </div> <!-- nk-block -->
                    </div>
                </div>
            </div><!-- .components-preview -->
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}

    {{-- <script>
        document.getElementById('save-sales-btn').addEventListener('click', function(event) {
            event.preventDefault();

            Swal.bindClickHandler();

            Swal.mixin({
                toast: true
            }).bindClickHandler("alert-confirm");
            Swal.fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
                customClass: {
                    actions: 'my-actions',
                    cancelButton: 'order-1 right-gap',
                    confirmButton: 'order-2',
                    denyButton: 'order-3',
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Saved!', '', 'success')
                    document.getElementById('customer-form').submit(); // submit the form
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            });
        });
    </script> --}}

    {{-- <script>
        document.getElementById('save-customer-btn').addEventListener('click', function(event) {
            event.preventDefault();

            Swal.mixin({
                toast: true
            }).fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
                customClass: {
                    actions: 'y-actions',
                    cancelButton: 'order-1 right-gap',
                    confirmButton: 'order-2',
                    denyButton: 'order-3',
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Saved!', '', 'uccess')
                    document.getElementById('customer-form').submit(); // submit the form
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            }).catch((error) => {
                console.error('Error submitting form:', error);
            });
        });
    </script> --}}
@endpush
