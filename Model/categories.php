<?php
    require_once("../../config/pdo.php");

    function add_new_category($cate_title, $cate_small_description, $cate_description, $cate_image, $cate_status) {
        $sql = "INSERT INTO categories(cate_title, cate_small_description, cate_description, cate_image, cate_status) VALUES(?, ?, ?, ?, ?)";
        pdo_execute($sql, $cate_title, $cate_small_description, $cate_description, $cate_image, $cate_status);
    }
    function update_category_id($cate_title, $cate_small_description, $cate_description, $cate_image, $id) {
        $sql = "UPDATE categories SET cate_title=?, cate_small_description=?, cate_description=?, cate_image=?  WHERE cate_id=?";
        pdo_execute($sql, $cate_title, $cate_small_description, $cate_description, $cate_image, $id);
    }

    
    
    // Hàm tính toán số trang
    function calculate_total_pages($total_records, $rows_per_page) {
        return ceil($total_records / $rows_per_page);
    }

    // Hàm lấy dữ liệu từ CSDL theo trang
    function get_data_with_pagination($start, $rows_per_page, $conn) {
        $sql = "SELECT * FROM categories LIMIT :start, :rows";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':start', $start, PDO::PARAM_INT);
        $stmt->bindParam(':rows', $rows_per_page, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    // Số lượng bản ghi mỗi trang
    $rows_per_page = 6;

    // Trang hiện tại
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Kết nối đến CSDL
    $pdo = pdo_get_connection();
    

    // Đếm tổng số lượng bản ghi
    $sql_count = "SELECT COUNT(*) AS total FROM categories";
    $count_stmt = $pdo->query($sql_count);
    $total_records = $count_stmt->fetchColumn();

    // Tính toán tổng số trang
    $total_pages = calculate_total_pages($total_records, $rows_per_page);

    // Tính toán vị trí bắt đầu
    $start = ($current_page - 1) * $rows_per_page;

    // Lấy dữ liệu từ CSDL theo trang
    $data = get_data_with_pagination($start, $rows_per_page, $pdo);


    function update_status_categories($id, $status){
        $sql = "UPDATE categories SET cate_status=? WHERE cate_id=?";
        pdo_execute($sql, $status, $id);
    }

    function delete_category($id){
        $sql = "DELETE FROM categories WHERE cate_id=?";
        pdo_execute($sql, $id);
    }

    function show_category_id($id) {
        $sql = "SELECT * FROM categories WHERE cate_id=?";
        return pdo_query($sql, $id);
    }
?>