<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Pustipanda </title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('asset/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('asset/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
     @include('layout.sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      @include('layout.navbar')
      <!--  Header End -->
                
      <!-- Content fluid -->
      <div class="container-fluid">
            <section>
                @yield('content')
            </section>
          </div>
          <!-- / Content fluid -->
       </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('asset/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('asset/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('asset/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('asset/js/app.min.js') }}"></script>
  <script src="{{ asset('asset/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('asset/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('asset/js/dashboard.js') }}"></script>
</body>

</html>