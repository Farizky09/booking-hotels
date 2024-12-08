<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="25" viewBox="0 0 25 42" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <!-- SVG logo definition -->
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">Sneat</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    @php
        $level = Auth::user()->role;
    @endphp
    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate">Dashboard</div>
            </a>
        </li>
        <!-- Transaksi -->
        <li class="menu-item">
            <a href="{{ route('booking.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div class="text-truncate">Transaksi</div>
            </a>
        </li>

        <!-- Kamar (Hanya tampil jika $level == 1) -->
        @if ($level == 1)
            <li class="menu-item">
                <a href="{{ route('kamar.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-bed"></i>
                    <div class="text-truncate">Kamar</div>
                </a>
            </li>
        @endif
    </ul>

    <!-- Tombol Logout -->
    <div class="menu-footer">
        <li class="menu-item">
            <form action="{{ route('logout') }}" method="POST" class="menu-link">
                @csrf
                <button type="submit" class="btn btn-link text-danger w-100 text-start">
                    <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
                </button>
            </form>
        </li>
    </div>

</aside>
