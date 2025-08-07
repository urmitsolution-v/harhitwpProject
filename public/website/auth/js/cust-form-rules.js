$(function () {
    $.validator.addMethod("letters", function (value, element) {
        return this.optional(element) || /^[a-z\s]+$/i.test(value);
    });

    $.validator.addMethod("specialChar", function (value, element) {
        return this.optional(element) || /([0-9a-zA-Z\s])$/.test(value);
    }, "Please enter Alphanumeric.");

    $.validator.addMethod("ind_mobile", function (value, element) {
        if (/^[6-9][0-9]{9}$/.test(value)) {
            return true;
        } else {
            return false;
        };
    }, "Invalid phone number");

    $.validator.addMethod("family_card_id_checker", function (value, element) {
        if (value) {
            // 2 JDQ 5098
            if (/^\d{1}[A-Z]{3}\d{4}$/.test(value)) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }, "Invalid Family Card ID");

    $.validator.addMethod("emailRegex", function (value, element) {
        if (value) {
            if (/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }, "Please enter a valid email address.");

    $.validator.addMethod('cust_filesize', function (value, element, arg) {
        var isOptional = this.optional(element);
        var minsize = 1024;

        if (isOptional) {
            return isOptional;
        }
        if (element.files[0].type != 'application/pdf') {
            arg = minsize * 1024 * 2;
            max_msg = '2 Mb';
        } else {
            arg = minsize * 200;
            max_msg = '200 Kb';
        }
        if (element.files[0]) {
            if ((element.files[0].size > minsize) && (element.files[0].size <= arg)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }, function (element) {
        return 'File Size between 1 Kb to ' + max_msg
    });
});
