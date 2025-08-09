@extends('website.layout.authlayout')
@section('content')
 

<div class="bg">
        <div class="container mt-5">
            <div class="d-flex no-gutter clearfix">
                <div class="d-flex flex-wrap align-items-center py-5 col-md-6 col-lg-6 quick-links">
                    <div class="container">
                        <div class="row">
                            <button class="btn btn-lg btn-block btn-links m-3 guidelines_btn" type="button"> Franchisee
                                Application
                                Guidelines</button>
                        </div>
                        <div class="row">
                            <button class="btn btn-lg btn-block btn-links m-3 faq_btn" type="button"> Frequently
                                Asked
                                Questions ( English )</button>
                        </div>
                        <div class="row">
                            <a href="../wp-content/uploads/hh-assets/faq-hindi.pdf" target="_blank" class="btn btn-lg btn-block btn-links m-3">
                                <!--<button class="btn btn-lg btn-block btn-links m-3 faq_btn" type="button">--> Frequently
                                Asked
                                Questions ( Hindi )
                                <!--</button>-->
                            </a>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row align-items-end justify-content-center mt-1">
                            <h6><b>For more queries, please contact</b></h6>
                        </div>
                        <div class="row align-items-end justify-content-center mt-2">
                            <p><b>Call : </b>9517 9517 11</p>
                        </div>
                        <div class="row align-items-end justify-content-center mt-1">
                            <p><b>Email : </b>harhithretail@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="login d-flex align-items-center py-5 pt-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-lg-8 mx-auto">
                                    <div class="text-center">
                                        <h5 class="title mb-2">-- Validate OTP --</h5>
                                        <p class="subtitle">Please enter the OTP to continue</p>
                                    </div>
                                    <hr>
                                <form id="otp-form" class="form-signin" method="post">
                                    @csrf
                                        <div class="form-group">
                                            <div class="d-flex flex-row align-items-center justify-content-center">
                                                <input type="number" class="otp-box error" maxlength="1" id="otp-1" name="otp-1" autocomplete="off" required="" autofocus="" aria-invalid="true">
                                                <input type="number" class="otp-box error" maxlength="1" id="otp-2" name="otp-2" autocomplete="off" required="" aria-invalid="false">
                                                <input type="number" class="otp-box valid" maxlength="1" id="otp-3" name="otp-3" autocomplete="off" required="" aria-invalid="false">
                                                <input type="number" class="otp-box valid" maxlength="1" id="otp-4" name="otp-4" autocomplete="off" required="" aria-invalid="false"><label id="OTP-error" class="error" for="OTP">This field is required.</label>
                                            </div>
                                        </div>
                                       <div class="text-center">
                                        @if(session('otp'))
    <h4 class="text-primary">Current OTP : <strong>{{ session('otp') }}</strong></h4>
@endif
                                        
                                        <div id="responseMsg" class="mt-3"></div>

                                       </div>
                                        <div id="otp-timer" class="text-center"><span class="d-block text-center mt-2 mb-2"><a href="resend-otp.php" disabled="">Click here </a> to Resend OTP </span></div>
                                        <button class="btn btn-lg btn-block btn-signup submit-otp" type="submit"> Submit OTP</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="inner_page_block w-100">
            <!-- footer html start -->
            <footer class="footer">
                <div class="footer_bottom" style="background-color:#000">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="copyright">
                                    <span>Copyright © 2021 हर-हित | Haryana State Government. All
                                        Rights Reserved</span>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-lg-6">
                                <div class="copyright">
                                    <span>
                                        Supports : Firefox 37 + | Google Chrome 6.0 + | Internet
                                        Explorer 9.0 + | Safari 4.0+</span>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center justify-content-end">
                                <div class="copyright">
                                    <span> Last reviewed and updated on: 24-Mar-2021</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer html end -->
        </div>
    </div>
@section('scripts')
<script>
$(document).ready(function() {

    // Optional: simple auto focus next field
    $('.otp-box').on('keyup', function(e) {
        if (this.value.length === 1) {
            $(this).next('.otp-box').focus();
        }
    });

    // jQuery Validate setup
    $('#otp-form').validate({
        rules: {
            'otp-1': { required: true, digits: true, minlength: 1, maxlength: 1 },
            'otp-2': { required: true, digits: true, minlength: 1, maxlength: 1 },
            'otp-3': { required: true, digits: true, minlength: 1, maxlength: 1 },
            'otp-4': { required: true, digits: true, minlength: 1, maxlength: 1 }
        },
        groups: {
            OTP: "otp-1 otp-2 otp-3 otp-4"
        },
        errorPlacement: function(error, element) {
            if (
                element.attr("name") === "otp-1" ||
                element.attr("name") === "otp-2" ||
                element.attr("name") === "otp-3" ||
                element.attr("name") === "otp-4"
            ) {
                error.insertAfter("#otp-4");
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(form) {
            let otp = $('#otp-1').val() + $('#otp-2').val() + $('#otp-3').val() + $('#otp-4').val();

            $.ajax({
                url: "{{ route('verify.otp') }}",
                type: "POST",
                data: {
                    otp: otp,
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function() {
                    $('.submit-otp').prop('disabled', true).text('Verifying...');
                    $("#responseMsg").html(''); // clear old message
                },
                success: function(response) {
                    if (response.status === 'success') {
                        $("#responseMsg").html(
                            `<div class="text-success">${response.message}</div>`
                        );
                        setTimeout(() => {
                            window.location.href = response.redirect_url;
                        }, 1500);
                    } else {
                        $("#responseMsg").html(
                            `<div class="text-danger">${response.message}</div>`
                        );
                    }
                },
                error: function(xhr) {
                    $("#responseMsg").html(
                        `<div class="text-danger">Something went wrong!</div>`
                    );
                },
                complete: function() {
                    $('.submit-otp').prop('disabled', false).text('Submit OTP');
                }
            });

            return false; // Prevent normal form submit
        }
    });

});
</script>
@endsection

  @endsection