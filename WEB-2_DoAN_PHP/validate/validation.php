<?php
    if(!empty($_POST)){
        $errors = []; // Mảng lưu trữ lỗi
        // Lấy dữ liệu được nhập vào
        $fullname = filter_input(INPUT_POST,'fullname',FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST,'phone',FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST,'address',FILTER_SANITIZE_SPECIAL_CHARS);
        $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
        $confirmpassword = filter_input(INPUT_POST,'confirmpassword',FILTER_SANITIZE_SPECIAL_CHARS);
        
        // Validate fullname
        if(empty(trim($fullname))){
            $errors['fullname']['required'] = 'Nhập họ và tên';
        } else {
            if(!preg_match('~^[^\s][^0-9-_!@#\$%\^\(\)-\+]{4,}[^\s]$~',$fullname)){
                $errors['fullname']['is_fullname'] = 'Họ và tên không hợp lệ';
            } else if(strlen($fullname) < 8) {
                $errors['fullname']['min_length'] = 'Họ và tên phải dài hơn 8 kí tự';
            }
        }

        // Validate phone
        if(empty(trim($phone))){
            $errors['phone']['required'] = 'Nhập số điện thoại';
        } else {
            if(!preg_match('~^0(1\d{9}|9\d{8})$~',$phone) && strlen($phone) != 10)
                $errors['phone']['is_phone'] = 'Số điện thoại không hợp lệ';
        }

        // Validate email
        if(empty(trim($email))){
            $errors['email']['required'] = 'Nhập email';
        } else {
            if(!preg_match('~^[a-z]+[a-z-_\.0-9]{2,}@[a-z]+[a-z-_\.0-9]{2,}\.[a-z]{2,}$~',$email))
                $errors['email']['is_email'] = 'Email không hợp lệ ';
        }

        // Validate address
        if(empty(trim($address))){
            $errors['address']['required'] = 'Nhập địa chỉ';
        } else {
            if(!preg_match('~^[a-zA-Z0-9\s\,]+$~',$address))
                $errors['address']['is_address'] = 'Địa chỉ không hợp lệ ';
        }

        // Validate username
        if(empty(trim($username))){
            $errors['username']['required'] = 'Nhập tên đăng nhập';
        } else {
            if(!preg_match('~^[a-z-_][a-z-_0-9]$~',$username)){
                $errors['username']['is_username'] = 'Tên đăng nhập không hợp lệ';
            }else if(strlen($username) < 8) {
                $errors['username']['min_length'] = 'Tên đăng nhập ít nhất 5 kí tự';
            }
        }

        // Validate password
        if(empty(trim($password))){
            $errors['passwordd']['required'] = 'Nhập mật khẩu';
        } else {
            if(!preg_match('~^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z])(?=.*[!@#\$%\^\*\(\)-\+]).{8,}$~',$password)){
                $errors['password']['is_password'] = 'Mật khẩu tối thiểu 8 kí tự (chữ thường, chữ in, chữ số, kí tự đặc biệt)';
            }
        }

        // Validate confirmpassword
        if(empty(trim($confirmpassword))){
            $errors['confirmpasswordd']['required'] = 'Xác nhận lại mật khẩu';
        } else {
            if(strcmp($confirmpassword,$password) != 0){
                $errors['confirmpassword']['is_confirmpassword'] = 'Mật khẩu không chính xác';
            }
        }


        echo '<pre>';
        print_r($errors);
        echo '</pre>';
        echo 'Đăng kí thành công';
    }
?>