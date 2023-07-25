<?php
    include("../../Model/admin.php");
    include("../../functions/myfunctions.php");
    //phân giải các field name từ form trong form thành cách biến
    extract($_REQUEST);
    
    // kiểm tra điều kiện đăng ký account admin
    if(isset($_POST["sign-up-admin"])){
        if(empty($admin_fullname)){
            warning("../../../DuAn1/views/dashboard/sign-up.php", "Vui lòng nhập fullname.");
        }else if(empty($admin_email)){
            warning("../../../DuAn1/views/dashboard/sign-up.php", "Vui lòng nhập email.");
        }else if(empty($admin_phone)){
            warning("../../../DuAn1/views/dashboard/sign-up.php", "Vui lòng nhập phone.");
        }else if(empty($admin_password)){
            warning("../../../DuAn1/views/dashboard/sign-up.php", "Vui lòng nhập password.");
        }else if(empty($check_admin_password)){
            warning("../../../DuAn1/views/dashboard/sign-up.php", "Vui lòng nhập password.");
        }else if($admin_password !== $check_admin_password){
            warning("../../../DuAn1/views/dashboard/sign-up.php", "Password và Check Password phải giống nhau !");
        }else{
            $admin_image = "useradmin.jpeg";
            $role = 0;
            SignUp_Admin($admin_fullname, $admin_email, $admin_phone, $admin_password, $admin_image, $role);
            successfully("../../../DuAn1/views/dashboard/sign-up.php", "Đăng ký thành công vui vòng chờ admin cấp quyền.");
        }
    }
    // kiểm tra điều kiện để đăng nhập
    if(isset($_POST["sign-in-admin"])){
        
        if(empty($ad_email)){
            warning("../../../DuAn1/views/dashboard/sign-in.php", "Vui lòng nhập email.");
        }else if(empty($ad_password)){
            warning("../../../DuAn1/views/dashboard/sign-in.php", "Vui lòng nhập password.");
        }else if(empty($ad_email) && empty($ad_password)){
            warning("../../../DuAn1/views/dashboard/sign-in.php", "Vui lòng nhập email và password để đăng nhập.");
        }else{
            $item = sign_in_admin($ad_email, $ad_password);
            foreach($item as $val){
                $_SESSION["admin_info"] = array(
                    "ad_id"=> $val["admin_id"],
                    "ad_name"=> $val["admin_fullname"],
                    "ad_email"=> $val["admin_email"],
                    "ad_image"=> $val["admin_image"]
                );
                if($ad_email == $val["admin_email"] && $ad_password == $val["admin_password"] && $val["role"] == 1){
                    $_SESSION["auth"] = true;
                    successfully("../../../DuAn1/views/dashboard/index.php", "Đăng nhập trang quản lý thành công.");
                }else{
                    error("../../../DuAn1/views/dashboard/sign-in.php", "Đăng nhập thất bại.");
                }
            }
        }
    }
    // Sign out remove session account admin
    if(isset($_GET["signoutAdmin"])){
        // remove admin_info session variables
        unset($_SESSION["admin_info"]);
        successfully("../../../DuAn1/views/dashboard/sign-in.php", "Đăng nhập xuất thành công.");
    }

    // Cập nhật vai trò quản trị : role
    if(isset($_GET["update_role"])){
        
            $a_id = $_GET["admin_id"];
            $a_role = $_GET["admin_role"];
            if($a_role == 1){
                update_role_admin($a_id, 0);
                successfully("../../../DuAn1/views/dashboard/account-admin.php", "Cập nhật vai trò quản trị thành công.");
            }else if($a_role == 0){
                update_role_admin($a_id, 1);
                successfully("../../../DuAn1/views/dashboard/account-admin.php", "Cập nhật vai trò quản trị thành công.");
            }else{
                error("../../../DuAn1/views/dashboard/account-admin.php", "Cập nhật vai trò quản trị thất bại.");
            }
            
            
    }
    // Delete account admin
    if(isset($_GET["delete_ad_id"])){
        $id = $_GET["delete_ad_id"];
        
        delete_account_admin($id);
        successfully("../../../DuAn1/views/dashboard/account-admin.php", "Xoá tài khoản thành công.");   
    }

    // Update infomation account admin
    if(isset($_POST["update_account_ad"])){
        
        // Note : Enable permission on a folder to allow file upload.
        // Need to run the command chmod -Rf 777 FOLDER_PATH
        // FLODER_PATH is name = uploads
        
        // vị trí folder lưu trữ
        $path = "../../public/dashboard/assets/img";
        
        // image
        // ảnh mới
        $new_admin_image = $_FILES["new_admin_image"]["name"];
        // ảnh củ
        $old_image = $_POST["old_admin_image"];

        if(empty($admin_id) || empty($admin_fullname) || empty($admin_email) || empty($admin_phone) || empty($admin_password) || !isset($role)){
            error("../../../DuAn1/views/dashboard/update-account-admin.php?up_admin_id=".$admin_id, "Cập nhật tài khoản quản trị thất bại.");
        }else{
            // kiểm tra hình ảnh có được tải mới lên không nếu không được tải mới dùng phương thức gán cho giá trị củ của ảnh
            if(empty($new_admin_image)){
                Admin_update($admin_id, $admin_fullname, $admin_email, $admin_phone, $admin_password, $old_image, $role);
                successfully("../../../DuAn1/views/dashboard/profile.php", "Cập nhật tài khoản thành công.");   
            }else if(!empty($new_admin_image)){
                $image_ext = pathinfo($new_admin_image, PATHINFO_EXTENSION); // Nhận thông tin về đường dẩn tận vd: .png

                $filename = time().'.'.$image_ext;  // trả về thời gian hiện tại dưới dang Unix nối chuổi $image_ext .png khởi tạo một tên file mới    

                
                    // kiểm tra điều kiện
                    if(!empty($filename)){
                        Admin_update($admin_id, $admin_fullname, $admin_email, $admin_phone, $admin_password, $filename, $role);
                        if(file_exists("../../public/dashboard/assets/img/".$old_image)) {
                            move_uploaded_file($_FILES["new_admin_image"]["tmp_name"], $path.'/'.$filename); // move_uploaded_file(chỉ định vị trí tệp tải tên, đường dẩn đến vị trí lưu / tên mới của file);
                            unlink("../../public/dashboard/assets/img/".$old_image);
                            successfully("../../../DuAn1/views/dashboard/profile.php", "Cập nhật tài khoản thành công.");   
                        }
                    }
            }
        }

    }
    

    
?>