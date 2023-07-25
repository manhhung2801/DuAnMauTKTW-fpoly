<?php
    require_once("../../config/pdo.php");

    //Thêm khách hàng mới
    function SignUp_Admin($admin_fullname, $admin_email, $admin_phone, $admin_password, $admin_image, $role){
        $sql = "INSERT INTO admin(admin_fullname, admin_email, admin_phone, admin_password, admin_image, role) VALUES (?, ?, ?, ?, ?, ?)";
        pdo_execute($sql, $admin_fullname, $admin_email, $admin_phone, $admin_password, $admin_image, $role);
    } 

    //Cập nhật thông tin account admin
    function Admin_update($admin_id, $admin_fullname, $admin_email, $admin_phone, $admin_password, $admin_image, $role){
        $sql = "UPDATE admin SET admin_fullname=?,admin_email=?,admin_phone=?,admin_password=?,admin_image=?,role=? WHERE admin_id=?";
        pdo_execute($sql, $admin_fullname, $admin_email, $admin_phone, $admin_password, $admin_image, $role, $admin_id);
    }

    // // Xóa một hoặc nhiều khách hàng
    function delete_account_admin($id){
        $sql = "DELETE FROM admin WHERE admin_id=?";
        pdo_execute($sql, $id);
    }

    // // Truy vấn tất cả các khách hàng
    function sign_in_admin($email, $pass){
        $sql = "SELECT * FROM admin WHERE admin_email=? AND admin_password=?";
        return pdo_query($sql, $email, $pass);
    }

    function list_admin(){
        $sql = "SELECT * FROM admin";
        return pdo_query($sql);
    }
    // //Truy vấn một kháh hàng theo ma_kh
    function select_admin_id($id){
        $sql = "SELECT * FROM admin WHERE admin_id=?";
        return pdo_query($sql, $id);
    }

    // //Kiểm tra sự tồn tại của một khách hang 3
    // function khach_hang_exist($ma_kh){
    //     $sql = "SELECT count(*) FROM khach_hang WHERE ma_kh=?";
    //     return pdo_query_value($sql, $ma_kh) > 0;
    // }

    // //Lấy danh sách kh theo vai trò
    // function khach_hang_select_by_role($vai_tro){
    //     $sql = "SELECT * FROM khach_hang WHERE vai_tro=?";
    //     return pdo_query($sql, $vai_tro);
    // }
    // //Cập nhật mật khẩu của 1 khách hàng
    // function khach_hang_change_password($ma_kh, $mat_khau_moi){
    //     $sql = "UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
    //     pdo_execute($sql, $mat_khau_moi, $ma_kh);
    // }
    function update_role_admin($id, $role){
        $sql = "UPDATE admin SET role=? WHERE admin_id=?";
        pdo_execute($sql, $role, $id);
    }
?>