    @extends('layouts.master')

    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @endpush

    @section('main')
        <x-app-layout>
            {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div> --}}
                </div>
            </div>
            </div>
        </x-app-layout>
    @endsection
    @push('script')
    
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                @if (session('status') === 'profile-updated')
                    Swal.fire({
                        title: 'Berhasil!',
                        text: "Profil Anda berhasil diperbarui.",
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000 // Notifikasi otomatis hilang setelah 2 detik
                    });
                @endif
                @if (session('statusPassword') === 'password-updated')
                    Swal.fire({
                        title: 'Berhasil!',
                        text: "Password Anda berhasil diperbarui.",
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000 // Notifikasi otomatis hilang setelah 2 detik
                    });
                @endif
            });
        </script>
    @endpush
