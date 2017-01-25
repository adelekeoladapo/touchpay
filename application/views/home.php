<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TouchPay</title>
        <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="assets/smoke/css/smoke.min.css" rel="stylesheet">
        <link href="assets/bootstrap/css/ui.css" rel="stylesheet">
        
        <!-- Base url -->
        <script>
            var base_url = "<? echo base_url(); ?>";
        </script>
        <!-- End Base url -->
        <!-- jQuery -->
        <script src="<? echo base_url(); ?>assets/bootstrap/js/jquery-2.2.1.min.js"></script>
        <script src="<? echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<? echo base_url(); ?>assets/smoke/js/smoke.min.js"></script>
        <script src="<? echo base_url(); ?>assets/bootstrap/js/script.js"></script>
        <!--/ jQuery -->
    </head>
    <body style="overflow-x: hidden;">
        <!-- nav bar -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    TouchPay
                </a>
              </div>
            </div>
        </nav>
        <!--/ nav bar -->
        
        <!-- content -->
        <div class="row" style="margin-top: 80px">
            <div class="col-md-4 col-md-offset-4 btn-container">
                <button onclick="$('#payment-form-overlay').fadeIn(500)" class="btn btn-primary">Donate!</button>
            </div>
        </div>
        <!--/ content -->
        
        
        
        
        
        
        
        <!-- payment modal -->
        <div class="transparent-overlay" id="payment-form-overlay">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="jd-modal">
                        <!-- select payment type -->
                        <div class="modal-page" id="select-payment-type" style="display: block">
                            <h1 class="h4 m-b-md m-t-none font-normal jd-modal-title">
                                Payment Form
                            </h1>
                            <div class="jd-modal-body" style="text-align: center">
                                Payment Method
                            </div>
                            <div class="jd-modal-footer">
                                <button class="btn jd-modal-btn btn-ok">Bank Transfer</button>
                                <button class="btn jd-modal-btn btn-ok" onclick="show_modal_page('select-location')" >Pay Online</button>
                            </div>
                        </div>
                        <!--/ select payment type -->
                        
                        <!-- select location -->
                        <div class="modal-page" id="select-location">
                            <h1 class="h4 m-b-md m-t-none font-normal jd-modal-title">
                                Payment Form
                            </h1>
                            <div class="jd-modal-body" style="text-align: center">
                                Where are you located?
                                <div style="margin: 15px">
                                    <input type="radio" name="d" onchange="show_payment_form()">Nigeria
                                    <input type="radio" name="d">Outside Nigeria
                                </div>
                                <!-- form -->
                                <form id="payment-form" style="display:none">
                                    <div class="form-group">
                                        <input name="firstname" type="text" class="form-control" placeholder="Firstname" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="lastname" type="text" class="form-control" placeholder="Lastname" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="amount" type="number" class="form-control" id="exampleInputPassword1" placeholder="Amount" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="phone" type="text" class="form-control" id="exampleInputPassword1" placeholder="Phone No" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="purpose" class="form-control" required>
                                            <option value="">Giving for</option>
                                            <option value="Offering">Offering</option>
                                            <option value="Sow seed">Sow seed</option>
                                            <option value="Tithe">Tithe</option>
                                        </select>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                            <div class="jd-modal-footer" id="form-btns" style="display: none">
                                <button class="btn jd-modal-btn btn-ok" onclick="location.reload()">Cancel</button>
                                <button class="btn jd-modal-btn btn-ok" onclick="insertPayment()">Proceed</button>
                            </div>
                        </div>
                        <!--/ select location -->
                        
                        <!-- user details -->
                        <div class="modal-page" id="user-details">
                            <h1 class="h4 m-b-md m-t-none font-normal jd-modal-title">
                                Payment Form
                            </h1>
                            <div class="jd-modal-body" id="info-table" style="text-align: left">
                                
                                <!-- info table -->
                                
                            </div>
                            <div class="jd-modal-footer">
                                <button class="btn jd-modal-btn btn-ok" onclick="location.reload()">Cancel</button>
                                <button class="btn jd-modal-btn btn-ok" onclick="$('#form-pay').submit()" >Pay</button>
                            </div>
                        </div>
                        <!--/ user details -->
                        
                    </div>
                </div>
            </div>
        </div>
        <!--/ payment modal -->
        
        
        
        <!-- Loading overlay -->
        <div class="transparent-overlay" id="loading-overlay">
            <div class="loading-img">
                <img src="<? echo base_url(); ?>assets/images/loading.gif">
            </div>
        </div>
        <!-- Loading overlay -->

    </body>
</html>