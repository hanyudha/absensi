<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pustipanda</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('asset/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('asset/css/styles.min.css') }}" />
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
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('patrial.sidebar')
    <!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      @include('patrial.navbar')
      <!--  Header End -->

      <!-- Content fluid -->
      <div class="container-fluid content">
          <section>
              @yield('content')
          </section>
      </div>
      <!-- / Content fluid -->
    </div>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('asset/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('asset/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('asset/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('asset/js/app.min.js') }}"></script>
  <script src="{{ asset('asset/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('asset/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('asset/js/dashboard.js') }}"></script>
  
  <!-- Script untuk Collapse Sidebar -->
  <script>
      document.getElementById('headerCollapse').addEventListener('click', function() {
          var content = document.querySelector('.content');
          content.classList.toggle('collapsed'); // Toggle class saat sidebar di-collapse
      });
  </script>
  <!-- FullCalendar CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet" />

<!-- FullCalendar JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

</body>

</html>
