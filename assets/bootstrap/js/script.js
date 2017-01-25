
function show_modal_page(page_id){
    $('.jd-modal .modal-page').slideUp(500);
    $('.jd-modal #'+page_id).slideDown(500);
}

function show_payment_form(){
    $('#payment-form').slideDown(500);
    $('#form-btns').slideDown(500);
}

function hide_form_modal(modal_id, obj = false){
    $('#'+modal_id).hide();
    obj = null;
}

function show_loading_overlay(){
    $('#loading-overlay').css("display", "block");
}

function hide_loading_overlay(){
    $('#loading-overlay').css("display", "none");
}

function insertPayment(){
    if($('#payment-form').smkValidate()){
        //hide_form_modal('payment-form-overlay');
        show_loading_overlay();
        var form_data = $('#payment-form').serialize();
        $.ajax({
            type: "POST",
            url: base_url+"api/insert-payment",
            data: form_data,
            success:function(result, status, xhr){ 
                var data = JSON.parse(result);
                var text = '<div class="jd-modal-body" style="text-align: left"> <table class="table table-striped table-bordered"><tr><td>Name:</td><td>'+data.firstname+" "+data.lastname+'</td></tr><tr><td>Phone:</td><td>'+data.phone+'</td></tr><tr><td>Email:</td><td>'+data.email+'</td></tr><tr><td>Amount:</td><td>NGN'+data.amount+'</td></tr><tr><td>Purpose:</td><td>'+data.purpose+'</td></tr></table></div>';
                
                var form = '<form id="form-pay" method="post" action="https://sandbox.interswitchng.com/collections/w/pay"><input name="product_id" type="hidden" value="'+data.payment_id+'" /><input name="pay_item_id" type="hidden" value="'+data.pay_item_id+'" /><input name="amount" type="hidden" value="'+data.amount+'" /><input name="currency" type="hidden" value="NGN" /><input name="site_redirect_url" type="hidden" value="http://localhost/touchpay/"/><input name="txn_ref" type="hidden" value="'+data.txn_ref+'" /><input name="cust_id" type="hidden" value="'+data.firstname+'"/><input name="site_name" type="hidden" value=" TouchPay"/><input name="cust_name" type="hidden" value="'+data.firstname+" "+data.lastname+'" /><input name="hash" type="hidden" value="'+data.hash+'" /></input></form>';
                
                $('#info-table').html(text+form);
                
                show_modal_page('user-details');
                hide_loading_overlay();
            },
            complete: function(){
            },
            timeout: 50000,
            error: function(){
                alert("An error occurred. Try again");
            }
        });
    }
    return false;
}