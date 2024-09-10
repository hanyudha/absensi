<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Pages | UIN - Pustipanda</title>
  <link rel="shortcut icon" type="image/png" href="../asset/images/logos/favicon.png" />
  <link rel="stylesheet" href="../asset/css/styles.min.css" />
</head>

<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../asset/images/logos/uin.jpg" width="180" alt="Logo">
                  <!-- <span>Modernize</span> --> <!-- Ini bisa dihapus jika ada elemen teks -->
                </a>

                <p class="text-center">
Please sign-in to your account and start the </p>
                <form id="formAuthentication" action="{{ route('login') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autofocus>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" required>
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                  </div>
                  <button class="btn btn-primary w-100" type="submit">Sign In</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../asset/libs/jquery/dist/jquery.min.js"></script>
  <script src="../asset/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
