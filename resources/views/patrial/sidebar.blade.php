<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="" class="text-nowrap logo-img">
                <img src="{{ asset('asset/images/logos/pustipanda.png') }}" width="145" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/dashboard" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">PRESENSE</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('absensi.laporan') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-file-description"></i>
                        </span>
                        <span class="hide-menu">Laporan Absensi</span>
                    </a>
                </li>
                @if(auth()->user()->role_as === 'admin')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.cuti.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-checklist"></i>
                            </span>
                            <span class="hide-menu">Manajemen Cuti</span>
                        </a>
                    </li>
                @endif
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">MASTER - UIN</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/departemens" aria-expanded="false">
                        <span>
                            <i class="ti ti-article"></i>
                        </span>
                        <span class="hide-menu">Departemens</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/jabatans" aria-expanded="false">
                        <span>
                            <i class="ti ti-briefcase"></i> <!-- Icon for Jabatan -->
                        </span>
                        <span class="hide-menu">Jabatan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/users" aria-expanded="false">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Karyawan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/gajis" aria-expanded="false">
                        <span>
                            <i class="ti ti-wallet"></i>
                        </span>
                        <span class="hide-menu">Gaji Karyawan</span>
                    </a>
                </li>
            </ul>
            <p>&nbsp;</p>
            <div class="position-relative mb-7 mt-5 rounded">
                <div class="d-flex">
                    <div class="unlimited-access-img">
                        <!-- <img src="{{ asset('asset/images/backgrounds/rocket.png') }}" alt="" class="img-fluid"> -->
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- Sidebar End -->
