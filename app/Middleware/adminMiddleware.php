<?php
    function warning1($url, $warning){
        $_SESSION["warning"] = $warning;
        header("Location: " . $url);
        exit(0);
    }
    
    function check_login_admin(){
        if(isset($_SESSION["auth"]) && $_SESSION["auth"] == true && !empty($_SESSION["admin_info"])){
            
        }else {
            warning1("../../../DuAn1/views/dashboard/sign-in.php", "Bạn không có quyền truy cập.");
        }
    }

    check_login_admin();
?>