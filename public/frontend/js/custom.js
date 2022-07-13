$(document).ready(function() {

    loadcart();
    loadwish();

    $('.addtocartbtn').click(function(e) {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var prod_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'prod_id': prod_id,
                'prod_qty': prod_qty,
            },
            success: function(response){
                swal(response.status);
                loadcart();
            }
        });

    });


    $('.addtowishlist').click(function(e) {
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'prod_id': prod_id,
            },
            success: function(response){
                swal(response.status);
                loadwish();
            }
        });

    });


    $('.inc-btn').click(function(e) {
        e.preventDefault();

        var inc_val = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_val, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $('.dec-btn').click(function(e) {
        e.preventDefault();

        var dec_val = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_val, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    function loadcart()
    {
        $.ajax({
            method : "GET",
            url : "/load-cart-data",
            success: function(response)
            {
                $(".cart-count").html('');
                $(".cart-count").html(response.count);
                //console.log();

            }
        });
    }



    function loadwish()
    {
        $.ajax({
            method : "GET",
            url : "/load-wishlist-data",
            success: function(response)
            {
                $(".wish-count").html('');
                $(".wish-count").html(response.count);
                //console.log();

            }
        });
    }


    $('.delete-cart').click(function(e) {
        e.preventDefault();

        var prod_id =$(this).closest('.product_data').find('.prod_id').val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/delete-cart",
            data: {
                'prod_id': prod_id,
            },
            success: function(response){
                window.location.reload();
                swal("",response.status);
            }


    });

});

$('.delete-wishlist').click(function(e) {
    e.preventDefault();

    var prod_id =$(this).closest('.product_data').find('.prod_id').val();


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: "POST",
        url: "/delete-wishlist",
        data: {
            'prod_id': prod_id,
        },
        success: function(response){
            window.location.reload();
            swal("",response.status);
        }


});

});


$('changeqty').click(function(e)
{
     e.preventDefault();

     var prod_id = $(this).closest('.product_data').find('.prod_id').val();
     var qty = $(this).closest('.product_data').find('.qty-input').val();

     data = {
         'prod_id' : prod_id,
         'prod_qty' : qty,
     }

     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: "POST",
        url: "/update-cart",
        data: data,
        success: function(response)
        {
            window.location.reload();
            alert(response);
        }


    });


});

});
