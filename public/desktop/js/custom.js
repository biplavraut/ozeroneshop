function addtocart(id, title, price, image) {
    swal("Please Wait! preceding...", {
        buttons: false,
        closeOnEsc: false,
        closeOnClickOutside: false,
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });
    var id = id;
    var title = title;
    var price = price;
    var image = image;
    var color = 'Not Available';
    var storage = 'Not Available';
    $.ajax({
        type: 'POST',
        url: "/cartstore",
        data: { id: id, title: title, price: price, image: image, color: color, storage: storage },
        success: function(data) {
            console.log(data.success);
            swal.close();
            $("#panel-right-cart").load(location.href + " #panel-right-cart"); // Add space between URL and selector.
            $("#cart-count").load(location.href + " #cart-count");
            $("#checkout-reload").load(location.href + " #checkout-reload");
            $('.cart-count').addClass('animate');
            setTimeout(function() {
                $('.cart-count').removeClass('animate');
            }, 1500);
            swal(
                'Added!',
                'Item has been added to cart.',
                'success', {
                    buttons: {
                        cancel: {
                            text: "Continue Shopping",
                            value: null,
                            visible: true,
                            className: "",
                            closeModal: true,
                        },
                        confirm: {
                            text: "View Cart",
                            value: true,
                            visible: true,
                            className: "",
                            closeModal: true
                        },
                    },
                }).then((result) => {
                if (result == true) {
                    window.location.replace("/cart");
                }
            })

        }
    });
};

function addtowishlist(id, price) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });
    var id = id;
    var price = price;
    $.ajax({
        type: 'POST',
        url: "/addwishlist",
        data: { id: id, price: price },
        success: function(data) {
            if (data.message == 'wishlist_added') {
                swal({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Product added to wishlist',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                if (data.message == 'wishlist_exist') {
                    var popup = $('.popup--' + 'exist');
                    popup.css({ display: 'block' }).addClass('active');
                } else {
                    var popup = $('.popup--' + 'error');
                    popup.css({ display: 'block' }).addClass('active');
                }
            }



        }
    });
};

function increaseQuantity(rowId) {
    swal("Please Wait! preceding...", {
        buttons: false,
        closeOnEsc: false,
        closeOnClickOutside: false,
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });
    var rowId = rowId;
    $.ajax({
        type: 'POST',
        url: "/increasequantity",
        data: { rowId: rowId },
        success: function(data) {
            console.log(data.success);
            $("#panel-right-cart").load(location.href + " #panel-right-cart"); // Add space between URL and selector.
            $("#cart-count").load(location.href + " #cart-count");

            $('.cart-count').addClass('animate');
            setTimeout(function() {
                $('.cart-count').removeClass('animate');
            }, 1500);
            // GET PAGE ID
            var cartpageid = $('.body-reload').data("page");
            if (cartpageid == 'shoppingcart') {
                $("#orderSummary").load(location.href + " #orderSummary");
            }
            swal.close();
        }
    });
};

function decreaseQuantity(rowId) {
    swal("Please Wait! preceding...", {
        buttons: false,
        closeOnEsc: false,
        closeOnClickOutside: false,
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });
    var rowId = rowId;
    $.ajax({
        type: 'POST',
        url: "/decreasequantity",
        data: { rowId: rowId },
        success: function(data) {
            console.log(data.success);
            if (data.success == 'Item quantity decreased') {
                $("#panel-right-cart").load(location.href + " #panel-right-cart"); // Add space between URL and selector.
                $("#cart-count").load(location.href + " #cart-count");

                $('.cart-count').addClass('animate');
                setTimeout(function() {
                    $('.cart-count').removeClass('animate');
                }, 1500);
                // GET PAGE ID
                var cartpageid = $('.body-reload').data("page");
                if (cartpageid == 'shoppingcart') {
                    $("#orderSummary").load(location.href + " #orderSummary");
                }
                swal.close();
            } else {
                window.location.replace("/");
            }

        }
    });
};

function removeCartProduct(rowId) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });
    var rowId = rowId;
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        buttons: {
            cancel: true,
            confirm: true,
            confirm: "Confirm",
        },
    }).then((result) => {
        console.log(result);
        if (result == true) {
            $.ajax({
                type: 'POST',
                url: "/removecartproduct",
                data: { rowId: rowId },
                success: function(data) {
                    console.log(data.success);
                    if (data.success == 'Item removed from Cart') {
                        $("#panel-right-cart").load(location.href + " #panel-right-cart"); // Add space between URL and selector.
                        $("#cart-count").load(location.href + " #cart-count");

                        $('.cart-count').addClass('animate');
                        setTimeout(function() {
                            $('.cart-count').removeClass('animate');
                        }, 1500);
                        // GET PAGE ID
                        var cartpageid = $('.body-reload').data("page");
                        if (cartpageid == 'shoppingcart') {
                            $("#orderSummary").load(location.href + " #orderSummary");
                        }
                        swal(
                            'Deleted!',
                            'Cart Item has been removed.',
                            'success'
                        )
                    } else {
                        window.location.replace("/");
                    }
                }
            });
        }
    })
};

function removeCart() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        buttons: {
            cancel: true,
            confirm: true,
            confirm: "Confirm",
        },
    }).then((result) => {
        swal("Please Wait! preceding...", {
            buttons: false,
            closeOnEsc: false,
            closeOnClickOutside: false,
        });
        console.log(result);
        if (result == true) {
            $.ajax({
                type: 'GET',
                url: "/destroycart",
                data: {},
                success: function(data) {
                    console.log(data.success);
                    if (data.success == 'Cart removed') {
                        window.location.replace("/");
                    }
                }
            });
        }
        swal.close();
    })
};

function searching() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });
    var search_query = $("input[type=text][name=search]").val();
    //alert(search_query);
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "/searching",
        data: { search_query: search_query },
        success: function(data) {
            console.log('Done');
            var res = '';
            $.each(data, function(key, value) {
                res +=
                    '<li><a href="/product-detail/' + value.slug + '">' + value.title + '</a></li>';
            });

            $('#search_products').html(res);
        }
    });
};

$(function() {
    $('[data-toggle="popover"]').popover()
})