<!--  Header Start -->
<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>

        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                
                <!-- Icon Bell untuk Notifikasi -->
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="notificationDropdown" data-bs-toggle="dropdown">
                        <i class="ti ti-bell-ringing"></i>

                        <!-- Menampilkan jumlah notifikasi yang belum dibaca -->
                        @if(auth()->user()->unreadNotifications->count() > 0)
                            <span class="badge bg-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
                        @endif
                    </a>
                   <!-- Dropdown Notifikasi -->
<div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="notificationDropdown">
    <h6 class="dropdown-header">Notifikasi</h6>
    @foreach(auth()->user()->unreadNotifications as $notification)
        <!-- Mengarahkan notifikasi ke halaman admin cuti dan menandai sebagai dibaca -->
        <a class="dropdown-item" href="{{ route('admin.notifications.markAsRead', $notification->id) }}">
            {{ $notification->data['user_name'] ?? 'Nama tidak tersedia' }} mengajukan cuti.
        </a>
    @endforeach
    <div class="dropdown-footer text-center py-2">
        <a href="{{ route('admin.markAllRead') }}" class="text-primary">Tandai semua sebagai dibaca</a>
    </div>
</div>

                </li>

                <!-- Profil Pengguna -->
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      <img src="{{ asset('asset/images/profile/user-1.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                      <div class="message-body">
                          <a href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();" 
                             class="btn btn-outline-primary mx-3 mt-2 d-block">
                             {{ __('Logout') }} 
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                          </form>
                      </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- CSS -->
<style>
    /* Pastikan konten tidak tertutupi sidebar */
    .content {
        margin-left: 250px; /* Sesuaikan dengan lebar sidebar */
        padding: 20px;
        transition: margin-left 0.3s ease;
    }

    /* Jika sidebar di-collapse */
    .content.collapsed {
        margin-left: 0;
    }

    /* Responsive adjustments */
    @media (max-width: 991.98px) {
        .content {
            margin-left: 0; /* Pada layar kecil, sidebar tidak aktif atau hidden */
        }
    }
</style>
