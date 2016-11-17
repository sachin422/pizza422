'use strict';

var ax_loaded_page = null;
var ax_loaded_modal = null;



function $axLoadPage(page, remote, append) {

    var can_i_append = typeof append === 'undefined' ? false : true;
    var is_it_remote_call = typeof remote === 'undefined' ? false : true;

    if (ax_loaded_page == page) {
        return;
    }

    var page_url = base_url + '/site/pages/'+ modal_name;

    if (is_it_remote_call) {
        page_url = base_url + '/templates/ax-pages/' + page + '.html';
    }


    $('[ax-page]').actionAjax({
        method: 'get',
        trigger: false,
        raw: true,
        url: page_url,
        container:$(document).find('[ax-page]'),
        messageContainer: null,
        messenger: function (message) {
            if (typeof message !== 'undefined' ) {
                console.log(message);
            }
        },
        success: function () {

        }
    });

}

function $axLoadModal(modal, remote, append) {

    var modal_name = modal;

    var can_i_append = typeof append === 'undefined' ? false : true;
    var is_it_remote_call = (typeof remote === 'undefined' || remote === false) ? false : true;


    if (ax_loaded_modal == modal_name) {
        var modal = '#' + modal_name + '-modal';
        $(modal).modal('show');
        return;
    } else {
        var last_modal = '#' + ax_loaded_modal + '-modal';
        $(last_modal).modal('hide');
        $('.modal-backdrop').hide('fade').remove();
        $('body').removeClass('modal-open').removeAttr('style');
    }

    var modal_url = base_url + '/site/modals/'+ modal_name;

    if (is_it_remote_call === false) {
        modal_url = base_url + '/templates/ax-modals/' + modal_name + '.html';
    }

    $('[ax-modal]').actionAjax({
        method: 'get',
        trigger: false,
        raw: true,
        url: modal_url,
        container:$(document).find('[ax-modal]'),
        messageContainer: null,
        messenger: function (message) {
            if (typeof message !== 'undefined' ) {
                console.log(message);
            }
        },
        success: function () {
            ax_loaded_modal = modal_name;
            var modal = '#' + modal_name + '-modal';
            $(modal).modal('show');
        }
    });

}

function $axForms(form) {

    var formUrl = base_url + $(form).attr('action');

    $(form).actionAjax({
        url: $(form).attr('action'),
        method: $(form).attr('method'),
        trigger: false,
        reset: $(form).data('reset') ? true : false,
        success: function () {

        }
    });

}


function $axCall(object, call_url, call_method, call_data, success) {


    var call_success = typeof success === 'function' ? success : function () {};

    $(object).actionAjax({
        url: call_url,
        method: call_method,
        date: call_data,
        trigger: false,
        success: call_success
    });

}

function $appendAttr( parent ) {

    $(parent).find('.append-attr').each(function () {
        var attr = $(this).data('attr');
        var _with = $(this).data('with');

        $(this).attr(attr, window[_with] + $(this).attr(attr));

    });

}

function $axAlert(text) {
    $("#alert-screen").find('.alert-content > p').html(text);
    $("#alert-screen").show('fade');
    setTimeout(function() {
        $("#alert-screen").hide('fade');
    }, 5000);
}

$(function () {
  	$('#myCarousel').carousel({
  		interval: 7000
	});
  	$('#myCarousel2').carousel({
  		interval: 3000
	});

    /* set ax loader */

    $.actionAjax("options", {
        loader: function(e) {
            switch (e) {
                case "show":
                    $("#ax-ajax-loader-bg").show('fade');
                    $("#ax-ajax-loader").show('fade');
                    break;

                case "hide":
                    $("#ax-ajax-loader-bg").hide('fade');
                    $("#ax-ajax-loader").hide('fade');
                    break;
            }
        }
    });


    $(".ax-load-page").on('click', function (e) {

        e.preventDefault();

        var page = $(this).data('page');
        var append = $(this).data('append') ? true : false;
        var remote = $(this).data('remote') ? true : false;

        $axLoadPage(page, remote, append);

    });

    $(document).on('submit', '.ax-form', function (e) {

        e.preventDefault();

        $axForms(this);

    });

    $(document).on('click', '.ax-call', function (e) {

        e.preventDefault();

        var url = base_url + $(this).data('action');
        var method = $(this).data('method');
        var data = $(this).data();

        $axCall(this, url, method, data);


    });

    $(document).on('click', ".ax-load-modal", function (e) {

        e.preventDefault();

        var modal = $(this).data('modal');
        var append = $(this).data('append') ? true : false;
        var remote = $(this).data('remote') ? true : false;
        $axLoadModal(modal, remote, append);

    });

    $(document).on('focus', '.single-input', function () {

        if ($(this).val().length > 0) {
            $(this).val('');
        }
    });

    $(document).on('keyup', '.single-input', function () {
        var next = $(this).data('next');
        $(next).focus();

    });

    $("#alert-screen").on('click', function () {
        $(this).hide('fade');
    });

    var _h_f_last_move = 0;


    $(document).on('click', '.product-view-style', function() {

        var switch_to = $(this).data('view');

        if (switch_to == 'list') {
            $(".product-list").show();
            $(".product-grid").hide();
        } else{
            $(".product-grid").removeClass('hidden');
            $(".product-list").hide();
            $(".product-grid").show();
        }

    });

});


function changeQuantity(change_to, object){
    
    var quanty = 1;
    var quantity_updated = 1;

    var where = $(object).data('target');

    var is_cart_btn = $(object).data('cart') ? $(object).data('cart') : false;

    quanty = parseInt($(where).text());

    if(change_to=='decrement' && quanty > 1 ){

        quantity_updated = quanty-1;
        $(where).text(quantity_updated);
        if (is_cart_btn) {
            $(is_cart_btn).data('qty', quantity_updated);

        }


    }
    else if(change_to=='increment' && quanty < 10){

            quantity_updated = quanty+1;
            $(where).text(quantity_updated);
        if (is_cart_btn) {
            $(is_cart_btn).data('qty', quantity_updated);

        }

    }



}


function addToCart(object) {
    var product_qty = 1;
    var product_id = $(object).data('product');
    var cart_flow = $(object).data('flow');

    $(object).actionAjax({
        url: base_url + '/site/cart/add',
        method: 'get',
        data: {product: product_id, qty: product_qty, flow: cart_flow},
        container: null,
        messenger: function () {},
        trigger: false,
        success: function (o) {

            if (o.success == true) {

                var product_item_qty = (o.product_quantity > 0) ? o.product_quantity : 0;
                $(".product_item_qty_" + product_id).text(product_item_qty);

                if (o.product_quantity <= 0) {
                    updateCartPrice(o.cart_sub_total);
                    $("#cart-product-" + product_id).hide('fade').remove();
                    $axAlert('Product removed from cart.');
                    $(".cart-total-products").text(o.productCount);
                    if (o.cartIsEmpty) {
                        makeCartEmpty();
                    }

                    return;
                }

                var $cartProduct = o.body;

                if ($("#mini-cart").hasClass('empty-cart')) {
                    $("#mini-cart").html($cartProduct);
                    $("#mini-cart").addClass('scroller').removeClass('empty-cart');
                }

                if ($("#cart-product-" + product_id).length > 0) {
                    $("#cart-product-" + product_id).replaceWith($cartProduct);
                } else {

                    $("#mini-cart").append($cartProduct);
                }

                $("#mini-cart").find("#cart-product-" + product_id).show('fade');

                $(".cart-total-products").text(o.productCount);

                $(".cart_item_qty_" + product_id).text();

                $('.scroll-pane').jScrollPane();

                updateCartPrice(o.cart_sub_total);
                if (cart_flow == 'increment') {
                    $axAlert('Product successfully added to cart.');
                } else {
                    $axAlert('Product quantity updated.');
                }

            }

        }
    });

}

function updateCartPrice(sub_total) {
    $("#cart-sub-total").html('<i class="rupee-sign"></i> ' + sub_total);
}

function removeFromCart(object) {

    var product_id = $(object).data('product');
    var target = $(object).data('target');

    $(object).actionAjax({
        url: base_url + '/site/cart/remove',
        data: {product: product_id},
        method: 'get',
        trigger: false,
        container: null,
        success: function (o) {

            if (o.success == true) {
                $(".product_item_qty_" + product_id).text(0);
                $(target).hide('fade');
                $(target).remove();
                $axAlert('Product removed from cart.');
            }

            if (o.cartIsEmpty) {
                makeCartEmpty();
            }

            $(".cart-total-products").text(o.productCount);
            $("#cart-sub-total").html('<i class="rupee-sign"></i> ' + o.cart_sub_total);

            $('.scroll-pane').jScrollPane();

        }
    });

}

function makeCartEmpty() {
    var dom = '<img src="' + base_url + '/assets/images/bucket.png" alt="empty-bucket">';
    dom += '<p class="add-stuff">Add some stuff!</p>';
    dom += '<p>Currently you have no items <br> in your cart.</p>';
    dom += '</div>';
    $("#mini-cart").addClass('empty-cart').removeClass('scroller');
    $("#mini-cart").html(dom);
}

function updateChangeLocationsSource() {
    $("#location").autocomplete({
        source: base_url + '/get-locations',
        select: function (event, ui) {
            $("#location_id").val(ui.item.location_id);

            $("#location_form").actionAjax({
                url: base_url + '/choose-location',
                trigger:false,
               messenger: function () {},
               messageContainer: "#location",
                loader: function (e) {
                    if (e == "show") {
                        $("#location").addClass('mini-ajax-loader');
                    }
                    if (e == "hide") {
                        $("#location").removeClass('mini-ajax-loader');
                    }
                },
                success : function (o) {

                    if (o.success == true) {
                        $("#location").prop('readonly', true);
                        window.location.href = base_url;
                    } else {
                        $axAlert(o.alert);
                    }
                }
            });

        }
    });
}






