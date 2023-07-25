<?php
    include("../../Model/categories.php");
    include("../../functions/myfunctions.php");
    //phân giải các field name từ form trong form thành cách biến
    extract($_REQUEST);

    if(isset($_POST["add_category"])){

        // Note : Enable permission on a folder to allow file upload.
        // Need to run the command chmod -Rf 777 FOLDER_PATH
        // FLODER_PATH is name = uploads
        
        // vị trí folder lưu trữ
        $path = "../../public/dashboard/assets/img";

        $image = $_FILES["cate_image"]["name"];
        
        // image
        $image_ext = pathinfo($image, PATHINFO_EXTENSION); // Nhận thông tin về đường dẩn tận vd: .png

        $filename = time().'.'.$image_ext;  // trả về thời gian hiện tại dưới dang Unix nối chuổi $image_ext .png khởi tạo một tên file mới  

        if(empty($cate_title) || empty($cate_small_description) || empty($cate_description) || empty($image)){
            error("../../../DuAn1/views/dashboard/add-category.php", "Thêm mới category thất bại.");
        }else {
            add_new_category($cate_title, $cate_small_description, $cate_description, $filename, $cate_status);
            move_uploaded_file($_FILES["cate_image"]["tmp_name"], $path.'/'.$filename); // move_uploaded_file(chỉ định vị trí tệp tải tên, đường dẩn đến vị trí lưu / tên mới của file);
            successfully("../../../DuAn1/views/dashboard/add-category.php", "Thêm mới category thành công.");   
        }
        //echo $cate_title ."-". $cate_small_description ."-". $cate_description ."-". $_FILES["cate_image"]["name"] ."-". $cate_status;
        
    }

    // update status
    if(isset($_GET["cate_update_status"])){
        if($_GET["cate_update_status"] == 1){
            $status = 0;
            update_status_categories($cate_id, $status);
            successfully("../../../DuAn1/views/dashboard/list-categories.php", "Cập nhật trạng status category thành công.");   
        }else if($_GET["cate_update_status"] == 0){
            $status = 1;
            update_status_categories($cate_id, $status);
            successfully("../../../DuAn1/views/dashboard/list-categories.php", "Cập nhật trạng status category thành công.");   
        }else{
            error("../../../DuAn1/views/dashboard/list-categories.php", "Cập nhật trạng status category thất bại.");
        }
    }

    // delete category by id
    if(isset($_GET["cate_delete_id"])){
        delete_category($cate_delete_id);
        successfully("../../../DuAn1/views/dashboard/list-categories.php", "Xoá category thành công.");   
    }

    // update category by id 
    if(isset($_POST["update_category"])){
        if(empty($cate_title) || empty($cate_small_description) || empty($cate_description)){
            error("../../../DuAn1/views/dashboard/update-category.php?cate_id_ud=", "Thêm mới category thất bại.");
        }
        if(empty($_FILES["new_cate_image"]["name"])) {
            update_category_id($cate_title, $cate_small_description, $cate_description, $old_cate_image, $ct_id);
            successfully("../../../DuAn1/views/dashboard/update-category.php?cate_id_ud=".$ct_id, "Update category thành công.1");   
        }else if(!empty($_FILES["new_cate_image"]["name"])){
            // Note : Enable permission on a folder to allow file upload.
            // Need to run the command chmod -Rf 777 FOLDER_PATH
            // FLODER_PATH is name = uploads
            
            // vị trí folder lưu trữ
            $path = "../../public/dashboard/assets/img";

            $image = $_FILES["new_cate_image"]["name"];
            
            // image
            $image_ext = pathinfo($image, PATHINFO_EXTENSION); // Nhận thông tin về đường dẩn tận vd: .png

            $filename = time().'.'.$image_ext;  // trả về thời gian hiện tại dưới dang Unix nối chuổi $image_ext .png khởi tạo một tên file mới  
            echo $filename;
            update_category_id($cate_title, $cate_small_description, $cate_description, $filename, $ct_id);
            if(file_exists("../../public/dashboard/assets/img/".$old_cate_image)) {
                move_uploaded_file($_FILES["new_cate_image"]["tmp_name"], $path.'/'.$filename); // move_uploaded_file(chỉ định vị trí tệp tải tên, đường dẩn đến vị trí lưu / tên mới của file);
                unlink("../../public/dashboard/assets/img/".$old_cate_image);
                successfully("../../../DuAn1/views/dashboard/update-category.php?cate_id_ud=".$ct_id, "Update mới category thành công.2");   
            } 
        }
    }
?>