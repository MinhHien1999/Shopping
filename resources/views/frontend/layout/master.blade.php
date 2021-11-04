<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Minh Hiền Shop</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <base href="{{asset('')}}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="public/asset/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/asset/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="public/asset/css/owl.carousel.css">
    <link rel="stylesheet" href="public/asset/css/style.css">
    <link rel="stylesheet" href="public/asset/css/responsive.css">
    <!-- sweetalert CSS -->
    <link rel="stylesheet" href="public/asset/css/sweetalert.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
	@include('frontend.layout.header')
    
	@include('frontend.layout.menu')

	@include('frontend.layout.slider')

	@yield('content')


    
    @include('frontend.layout.footer')
    
    <!-- Latest jQuery form server -->
    <script type="text/javascript" src="public/asset/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="public/asset/js/jquery-3.5.1.min.js"></script>
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="public/asset/js/owl.carousel.min.js"></script>
    <script src="public/asset/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="public/asset/js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="public/asset/js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="public/asset/js/bxslider.min.js"></script>
    <script type="text/javascript" src="public/asset/js/script.slider.js"></script>
    
    <!-- sweetalert Script -->
    <script src="public/asset/js/sweetalert.min.js"></script>

    <!-- Cart -->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function AddToCart(id){
            var parentElement = $(id).parent().parent().parent();
            var id_sp = $(id).data('product-id');
            var data = {
                id_sp : parentElement.find('h2#idsp').attr('data-idsp'),
                hinh_sp : parentElement.find('img#hinhsp_'+ id_sp).attr('data-hinhsp'),
                ten_sp : parentElement.find('a#tensp_'+ id_sp).text(),
                gia_sp : parentElement.find('ins#giasp_'+ id_sp).attr('data-price'),
                soluong_sp : 1,
            }
            $.ajax({
                url: '{{route('add-cart-ajax')}}',
                type: 'post',
                data: data,
                success: function(data) {
                    swal({
                            title: "Đã thêm sản phẩm vào giỏ hàng",
                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                            showCancelButton: true,
                            cancelButtonText: "Xem tiếp",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Đi đến giỏ hàng",
                            closeOnConfirm: false
                            },
                            function() {
                            window.location.href = "{{url('/cart')}}";
                        }
                        );
                },
            })
        }
        function DeleteToCart(){
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            var id = [];
            if(confirm("bạn có chắc muốn xóa ?")){
                $('.product_checkbox:checked').each(function(){
                id.push($(this).val());
            });
            // console.log(id);
            if(id.length > 0)
                {
                    $.ajax({
                        url: '{{route('delete-cart-ajax')}}',
                        method: 'post',
                        data: {id:id},
                        success:function(data){
                            // console.log("data: ", data)
                            // chỗ này em phải for qua data thằng mà server trả về
                            var arr = data[0]
                            if(data[1] > 0) {
                                $.each(arr, function (index, value) {
                                    // console.log(value);
                                    $('#item-'+value).remove();
                                })
                            } else {
                                window.location.replace('/project/');
                            }
                            // alert(data);
                            alert('Xóa Thành Công');
                            window.location.reload(false); 
                        }
                    });
                }
                else{
                    alert('Xóa Thất Bại! Bạn Chưa Chọn Sản Phẩm Cần Xóa');
                }
                    
            }
        }
        function AddToCartProduct(id){
            var parentElement = $(id).parent().parent().parent().parent();
            var id_sp = $(id).data('product-id');
            var data = {
                id_sp : parentElement.find('h2#idsp').attr('data-idsp'),
                hinh_sp : parentElement.find('img#hinhsp_'+ id_sp).attr('data-hinhsp'),
                ten_sp : parentElement.find('a#tensp_'+ id_sp).text(),
                gia_sp : parentElement.find('ins#giasp_'+ id_sp).attr('data-price'),
                soluong_sp : 1,
                // submit: 'add'
            }
            // console.log(data);
            $.ajax({
                url: '{{route('add-cart-ajax')}}',
                type: 'post',
                data: data,
                success: function(data) {
                    // console.log(data)
                    swal({
                            title: "Đã thêm sản phẩm vào giỏ hàng",
                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                            showCancelButton: true,
                            cancelButtonText: "Xem tiếp",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Đi đến giỏ hàng",
                            closeOnConfirm: false
                            },
                            function() {
                            window.location.href = "{{url('/cart')}}";
                        }
                        );
                },
            })
        }
    </script>
    <script src="public/asset/js/checkbox-all.js"></script>
    <script type="text/javascript">
    </script>
  </body>
</html>