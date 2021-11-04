<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Stellar Admin</title>
    <base href="{{asset('')}}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="public/admin_asset/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="public/admin_asset/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="public/admin_asset/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="public/admin_asset/vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="public/admin_asset/vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="public/admin_asset/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="public/admin_asset/images/favicon.png" />
  </head>
  <body>
    <?php
      
    ?>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include('backend.layout.header')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('backend.layout.menu')
        <!-- partial -->
        @yield ('content')
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="public/admin_asset/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="public/admin_asset/vendors/chart.js/Chart.min.js"></script>
    <script src="public/admin_asset/vendors/moment/moment.min.js"></script>
    <script src="public/admin_asset/vendors/daterangepicker/daterangepicker.js"></script>
    <script src="public/admin_asset/vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="public/admin_asset/js/off-canvas.js"></script>
    <script src="public/admin_asset/js/misc.js"></script>
    <!-- endi
    <!-- Custom js page -->
    <script src="public/admin_asset/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    {{-- jQuery --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script type="text/javascript" src="public/admin_asset/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="public/admin_asset/js/jquery-3.5.1.min.js"></script>
    <script>
      function deleteProductItem(id){
        if(confirm("bạn có chắc muốn xóa ?")){
            window.location.href = 'admin/product/delete/' +id;
            return true;
          };
      }
      function deleteNsxItem(id){
        if(confirm("bạn có chắc muốn xóa ?")){
            window.location.href = 'admin/nsx/delete/' +id;
            return true;
          };
      }
      function deleteSlideItem(id){
        if(confirm("bạn có chắc muốn xóa ?")){
            window.location.href = 'admin/slide/delete/' +id;
            return true;
          };
      }
      function deleteOrderItem(id){
        if(confirm("bạn có chắc muốn xóa ?")){
            window.location.href = 'admin/order/delete/' +id;
            return true;
          };
      }
    </script>
  </body>
</html>