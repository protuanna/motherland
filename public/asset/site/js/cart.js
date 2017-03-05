/**
 * Created by PC0353 on 3/5/2017.
 */
$(document).ready(function () {
    $('#quantity').on('keydown', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})
var cart = {
    conf:{
        ajax_sending : false
    },
    addCart:function (id,num) {
        if (cart.conf.ajax_sending == false) {
            $.ajax({
                url: '/cart/add',
                data: {
                    product_id: id,
                    product_num: num,
                },
                dataType: 'json',
                type: 'POST',
                beforeSend: function () {
                    cart.conf.ajax_sending == true;
                },
                error: function () {
                    cart.conf.ajax_sending == false;
                    bootbox.alert('Lỗi hệ thống');
                },
                success: function (res) {
                    cart.conf.ajax_sending == false;
                    if (res.success == 1) {
                        window.location.href = res.url;
                    }else {
                        bootbox.alert(res.mess);
                    }
                }
            });
        }
    }
}
