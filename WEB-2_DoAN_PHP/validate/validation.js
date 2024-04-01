$("#formValidation").validate({
    rules:{
        fullname:{
            required: true,
            minlength: 5,
        },
        phone:{
            required: true,
            minlength: 10,
            maxlength: 10,
            numer: true,
        },
        email:{
            required: true,
            email: true
        },
        address:{
            required: true,
        },
        username:{
            required: true,
            minlength: 2,
        },
        password:{
            required: true,
            validatePassword: true,
            minlength: 8,
        },
        confirmpassword:{
            required: true,
            equalTo: "#password",
        }
    },
    messages:{
        fullname:{
            required: "Nhập họ tên",
            minlength: "Họ và tên ít nhất 5 kí tự",
        },
        phone:{
            required: "Nhập số điện thoại",
            minlength: "Số điện thoại không hợp lệ",
            maxlength: "Số điện thoại không hợp lệ",
            number: "Số điện thoại không hợp lệ",
        },
        email:{
            required: "Nhập email",
            email: "Email không hợp lệ",
        },
        address:{
            required: "Nhập địa chỉ",
        },
        username:{
            required: "Nhập tên đăng nhập",
            messages: "Tên đăng nhập phải ít nhất 2 kí tự",
        },
        password:{
            required: "Nhập mật khẩu",
            minlength: "Mật khẩu có ít nhất 8 kí tự",
        },
        confirmpassword:{
            required: "Xác nhận mật khẩu",
            equalTo: "Mật khẩu không chính xác",
        },
      },

    submitHandler: function(form) {
        alert('thành công');
    //   form.submit();
    }
   });

// FULLNAME
$.validator.addMethod("validatePhone",function(value, element) {
return this.optional(element)  || /^[^\s][^0-9-_!@#\$%\^\(\)-\+]{4,}[^\s]$/i.test(value);
}, "Họ và tên không hợp lệ");
// EMAIL
$.validator.addMethod("validatePhone",function(value, element) {
    return this.optional(element) || /^[a-z]+[a-z-_\.0-9]{2,}@[a-z]+[a-z-_\.0-9]{2,}\.[a-z]{2,}$/i.test(value);
}, "Email không hợp lệ");
// ADDRESS
$.validator.addMethod("validatePhone",function(value, element) {
    return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])+$/i.test(value);
}, "Địa chỉ không hợp lệ");
// PHONE
$.validator.addMethod("validatePhone",function(value, element) {
    return this.optional(element) || /^0(1\d{9}|9\d{8})$/i.test(value);
}, "Số điện thoại không hợp lệ");
// PASSWORD
$.validator.addMethod("validatePassword", function (value, element) {
    return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_-])[0-9a-zA-Z!@#$%^&*()_-].{8,16}$/i.test(value);
}, "Password từ 8 ký tự gồm chữ hoa, chữ thường, chữ số, ký tự đặc biệt");
// USERNAME
$.validator.addMethod("validatePhone",function(value, element) {
    return this.optional(element) || /^[MaKH]\d+$/i.test(value);
}, "Định dạng (VD: MaKH1)");

