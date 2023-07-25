<?php
    include("../../Model/products.php");
    include("../../functions/myfunctions.php");
    //phân giải các field name từ form trong form thành cách biến
    extract($_REQUEST);

    if(isset($_POST["add_product"])){

        // Note : Enable permission on a folder to allow file upload.
        // Need to run the command chmod -Rf 777 FOLDER_PATH
        // FLODER_PATH is name = uploads
        
        // vị trí folder lưu trữ
        $path = "../../public/dashboard/assets/img";

        $image = $_FILES["prod_image"]["name"];
        
        // image
        $image_ext = pathinfo($image, PATHINFO_EXTENSION); // Nhận thông tin về đường dẩn tận vd: .png

        $filename = time().'.'.$image_ext;  // trả về thời gian hiện tại dưới dang Unix nối chuổi $image_ext .png khởi tạo một tên file mới  

       //echo  $prod_category_id . $prod_title . $prod_original_price . $prod_selling_price . $_FILES["prod_image"]["name"] . $prod_quantity . $prod_trending . $prod_status . $prod_description;
        echo "hung";
        if(empty($prod_category_id) || empty($prod_title) || empty($prod_original_price) || empty($prod_selling_price) || empty($image) || empty($prod_quantity) || empty($prod_description)){
            error("../../../DuAn1/views/dashboard/add-product.php", "Thêm mới product thất bại.");
        }
        else {
            if(isset($prod_status) == 1){
                $prod_status = 1;
            }else {
                $prod_status = 0;
            }
            if(isset($prod_trending) == 1){
                $prod_trending = 1;
            }else {
                $prod_trending = 0;
            }

            add_new_product($prod_category_id, $prod_title, $prod_original_price, $prod_selling_price, $filename,  $prod_quantity, $prod_trending, $prod_status, $prod_description);
            move_uploaded_file($_FILES["prod_image"]["tmp_name"], $path.'/'.$filename); // move_uploaded_file(chỉ định vị trí tệp tải tên, đường dẩn đến vị trí lưu / tên mới của file);
            successfully("../../../DuAn1/views/dashboard/add-product.php", "Thêm mới product thành công.");   
        }
        //echo $cate_title ."-". $cate_small_description ."-". $cate_description ."-". $_FILES["cate_image"]["name"] ."-". $cate_status;
        
    }else if(isset($_POST["update_product"])){
        if(isset($prod_status) == 1){
            $prod_status = 1;
        }else {
            $prod_status = 0;
        }
        if(isset($prod_trending) == 1){
            $prod_trending = 1;
        }else {
            $prod_trending = 0;
        }

        if(empty($prod_category_id) || empty($prod_title) || empty($prod_original_price) || empty($prod_selling_price) || empty($prod_quantity) || empty($prod_description)){
            error("../../../DuAn1/views/dashboard/update-product.php?prod_id_update=".$prod_id, "Update product thất bại.");   
        }else{
            if(empty($_FILES["new_prod_image"]["name"])){
                update_product_id($prod_category_id, $prod_title, $prod_original_price, $prod_selling_price, $old_prod_image, $prod_quantity, $prod_trending, $prod_status, $prod_description, $prod_id);
                successfully("../../../DuAn1/views/dashboard/update-product.php?prod_id_update=".$prod_id, "Update product thành công.");   
            }
            if(!empty($_FILES["new_prod_image"]["name"])){
                // Note : Enable permission on a folder to allow file upload.
                // Need to run the command chmod -Rf 777 FOLDER_PATH
                // FLODER_PATH is name = uploads
                
                // vị trí folder lưu trữ
                $path = "../../public/dashboard/assets/img";

                $image = $_FILES["new_prod_image"]["name"];
                
                // image
                $image_ext = pathinfo($image, PATHINFO_EXTENSION); // Nhận thông tin về đường dẩn tận vd: .png

                $filename = time().'.'.$image_ext;  // trả về thời gian hiện tại dưới dang Unix nối chuổi $image_ext .png khởi tạo một tên file mới  
                
                update_product_id($prod_category_id, $prod_title, $prod_original_price, $prod_selling_price, $filename, $prod_quantity, $prod_trending, $prod_status, $prod_description, $prod_id);
                if(file_exists("../../public/dashboard/assets/img/".$old_prod_image)) {
                    move_uploaded_file($_FILES["new_prod_image"]["tmp_name"], $path.'/'.$filename); // move_uploaded_file(chỉ định vị trí tệp tải tên, đường dẩn đến vị trí lưu / tên mới của file);
                    unlink("../../public/dashboard/assets/img/".$old_prod_image);
                    successfully("../../../DuAn1/views/dashboard/update-product.php?prod_id_update=".$prod_id, "Update product thành công.");   
                } 
            }
        }
        
    }
     // delete product by id
    else if(isset($_GET["delete_product_id"])){
        $id_prod = $_GET["delete_product_id"];
        if($id_prod != 0){
            delete_product($id_prod);
            successfully("../../../DuAn1/views/dashboard/list-products.php", "Delete product thành công.");   
        }else{
            error("../../../DuAn1/views/dashboard/list-products.php", "Delete product thất bại.");   
        }
    }
    // Update status
    else if(isset($_GET["prod_update_status"])){
        if($_GET["prod_update_status"] == 1){
            $status = 0;
            update_status_product($prod_id, $status);
            successfully("../../../DuAn1/views/dashboard/list-products.php", "Cập nhật trạng status product thành công.");   
        }else if($_GET["prod_update_status"] == 0){
            $status = 1;
            update_status_product($prod_id, $status);
            successfully("../../../DuAn1/views/dashboard/list-products.php", "Cập nhật trạng status product thành công.");   
        }else{
            error("../../../DuAn1/views/dashboard/list-products.php", "Cập nhật trạng status product thất bại.");
        }
    }

    
    
?>