$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#add-to-cart').click(function() {
        var parentElement = $(this).parent().parent().parent();
        var id_sp = $(this).data('product-id');
        var data = {
            id_sp: parentElement.find('h2#idsp').attr('data-idsp'),
            hinh_sp : parentElement.find('img#hinhsp_'+ id_sp).attr('data-hinhsp'),
            ten_sp : parentElement.find('a#tensp_'+ id_sp).text(),
            gia : parentElement.find('ins#giasp_'+ id_sp).attr('data-price'),
            soluong: 1,
            // submit: 'add'
        }
        console.log(data);
        $.ajax({
            url: "{{route('/add-cart-ajax')}}",
            type: 'post',
            data: data,
            success: function(data) {
                // $("#cartinfo").html(data);
                alert(data);
            },
        })
    })
})