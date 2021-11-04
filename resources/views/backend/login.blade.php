<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Stellar Admin</title>
    <base href="{{('')}}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="public/admin_asset/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="public/admin_asset/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="public/admin_asset/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="public/admin_asset/css/style.css" <!-- End layout styles -->
    <link rel="shortcut icon" href="public/admin_asset/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <h4>Admin</h4>
                <h6 class="font-weight-light">Đăng nhập</h6>
                <h6 class="font-weight-light" style="text-align: center; color:red" >
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      @foreach ($errors->all() as $err)
                        <li>{{$err}}</li>
                      @endforeach
                    </div>
                  @endif
                  @if (session('message_admin_login')==true)
                    <div class="alert alert-danger">
                      {{session('message_admin_login')}}
                    </div>
                  @endif
                </h6>
              <form class="pt-3" action="{{URL('/admin/dashboard')}}" method="POST">
                    @csrf
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" name="matkhau" class="form-control form-control-lg" id="exampleInputPassword" placeholder="Mật khẩu">
                  </div>
                  <div class="mt-3">
                    <input type="submit" name="submit" class="form-control form-control-lg" id="exampleInputSubmit" value="Đăng Nhập">
                  </div>
                  {{-- <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input" value="remember"> Nhớ đăng nhập </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div> --}}
                  {{-- <div class="mb-2">
                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="icon-social-facebook mr-2"></i>Connect using facebook </button>
                  </div> --}}
                  {{-- <div class="text-center mt-4 font-weight-light">  <a href="register.html" class="text-primary">Create</a> --}}
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="public/admin_asset/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="public/admin_asset/js/off-canvas.js"></script>
    <script src="public/admin_asset/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>