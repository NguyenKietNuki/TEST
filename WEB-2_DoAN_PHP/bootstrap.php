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
            if(!preg_match('/0\d{9}/',$phone) && strlen($phone) != 10)
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="container d-flex">
            <div class="left">
                <div class="row_left">
                    <div class="left_top">
                        <img src="uploads/logo_header.png" alt="Logo top" width="100%">
                    </div>
                    <div class="left_bot">
                        <img src="uploads/logo_footer.png" alt="Logo top" width="100%">
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="row_right">
                    <form action="" class=" bg-light p-3 my-3">
                        <input type="text" class="form-control" name="fullname" placeholder="Họ tên">
                        <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <input type="text" class="form-control" name="address" placeholder="Địa chỉ">
                        <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập">
                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                        <input type="password" class="form-control" name="confirmpassword" placeholder="Xác nhận mật khẩu">
                        <button type="submit" class="btn btn--primary sign-submit" name="signup">Đăng kí</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>