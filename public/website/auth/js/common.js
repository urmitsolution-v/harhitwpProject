let timerOn = true;

function timer(remaining) {
    "use strict";
    var m = Math.floor(remaining / 60);
    var s = remaining % 60;

    m = m < 10 ? '0' + m : m;
    s = s < 10 ? '0' + s : s;
    document.getElementById('timer').innerHTML = '<label>OTP Will Expire in : </label> <span class="text-danger">' + m + ':' + s + '</span>';
    remaining -= 1;

    if (remaining >= 0 && timerOn) {
        setTimeout(function () {
            timer(remaining);
        }, 1000);
        return;
    }

    if (!timerOn) {
        return;
    }
    document.getElementById('otp-timer').innerHTML = '<span class="d-block text-center mt-2 mb-2"><a href="resend-otp.php" disabled>Click here </a> to Resend OTP </span>';
    timerOn = false;
}
$(function () {
    $(".eligibility_btn").click(function () {
        $('#eligibilityModal').modal('show');
    });

    $(".guidelines_btn").click(function () {
        $('#guidelinesModal').modal('show');
    });

    $(".faq_btn").click(function () {
        //$('#faqModal').modal('show');
        window.open('faqs.php', '_blank').focus();
    });

    //$('[data-toggle="tooltip"]').tooltip();

    $(".remove-sharp").on("keydown keyup", function (event) {
        $(this).val($(this).val().replace(/[\&#@!?+()$~%":*?<>^{}]/g, ''));
    });

    $("input[name='mobile-no']").on('input', function (e) {
        $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });

    $('.otp-box').keydown(function (e) {
        $('.cust-err').hide();
	$(this).val($(this).val().replace(/[^0-9]/g, ''));
        var charCode = (e.which) ? e.which : e.keyCode;
        /*if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 96 || charCode > 105)) {
            return false;
        }*/

        i = $(this).attr('name').split('-')[1];
        if (charCode == 8 || charCode == 46) {
            $('#otp-' + i).val('');
            if (i == 1) {
                return false;
            } else {
                $('#otp-' + (i - 1)).focus();
                return false;
            }
        } else {
            //$(this).val($(this).val().replace(/[^0-9]/g, ''));
            if ($(this).val().length >= 1) {
                if (i != 4) {
                    $(this).next("input").focus();
                } else {
                    return false;
                }
            } else {
                $(this).focus();
            }
        }
    });

    $("#district").change(function () {
        $("#tehsil").empty();
        $.ajax({
            type: 'POST',
            url: 'getTehsils.php',
            data: {
                id: $(this).val()
            },
            success: function (html) {
                data = JSON.parse(html);
                $("#tehsil").append($("<option></option>").val('').html('Choose...'));
                $.each(data, function (key, value) {
                    $("#tehsil").append($("<option></option>").val(value.id).html(value.name));
                });
            }
        });
    });

    window.addEventListener("beforeunload", function (e) {
        if (e.target.activeElement.classList.contains("redirectable") && flag == 1) {
            var confirmationMessage = 'If you leave before saving, your changes will be lost.';

            (e || window.event).returnValue = confirmationMessage; //Gecko + IE
            document.cookie = 'PHPSESSID' + '=; Path=/';
            return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.

        } else {
            return true;
        }
    });
});
