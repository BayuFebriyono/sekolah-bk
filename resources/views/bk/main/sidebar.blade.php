<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder">Konseling</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <p class="text-muted ms-2">Welcome back, {{ Auth::guard('guru')->user()->nama }}</p>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Master Data</span>
        </li>


        <!-- Tata Tertib -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icon fa-solid fa-scale-balanced"></i>
                <div data-i18n="Layouts">Data Tata Tertib</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/bk-tartib/create" class="menu-link">
                        <div data-i18n="Without menu">Tambah Data</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/bk-tartib" class="menu-link">
                        <div data-i18n="Without navbar">List Data Tartib</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Rekaman --}}
        <li class="menu-item">
            <a href="/rekaman-tartib" class="menu-link">
                <i class="menu-icon tf-icon fa-solid fa-clipboard"></i>
                <div data-i18n="Boxicons">Rekaman Tata Tertib</div>
            </a>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Lain Lain</span>
        </li>

        <li class="menu-item">
            <a href="/logout" class="menu-link">
                <i class="menu-icon tf-icon fa-solid fa-arrow-right-from-bracket"></i>
                <div data-i18n="Boxicons">Sign Out</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
