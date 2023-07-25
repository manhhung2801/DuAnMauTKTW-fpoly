<?php
    require_once("../../config/pdo.php");

    function select_categories(){
        $sql = "SELECT * FROM categories";
        return pdo_query($sql);
    }
    function add_new_product($prod_category_id, $prod_title, $prod_original_price, $prod_selling_price, $prod_image,  $prod_quantity, $prod_trending, $prod_status, $prod_description) {
        $sql = "INSERT INTO products(prod_category_id, prod_title, prod_original_price, prod_selling_price, prod_image, prod_quantity, prod_trending, prod_status, prod_description) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        pdo_execute($sql, $prod_category_id, $prod_title, $prod_original_price, $prod_selling_price, $prod_image,  $prod_quantity, $prod_trending, $prod_status, $prod_description);
    }
    function update_product_id($prod_category_id, $prod_title, $prod_original_price, $prod_selling_price, $prod_image, $prod_quantity, $prod_trending, $prod_status, $prod_description, $prod_id) {
        $sql = "UPDATE products SET prod_category_id=? , prod_title=?, prod_original_price=?, prod_selling_price=?, prod_image=?, prod_quantity=?, prod_trending=?, prod_status=?, prod_description=?  WHERE prod_id=?";
        pdo_execute($sql, $prod_category_id, $prod_title, $prod_original_price, $prod_selling_price, $prod_image, $prod_quantity, $prod_trending, $prod_status, $prod_description, $prod_id);
    }

    
    
    // Hàm tính toán số trang
    function calculate_total_pages($total_records, $rows_per_page) {
        return ceil($total_records / $rows_per_page);
    }

    // Hàm lấy dữ liệu từ CSDL theo trang
    function get_data_with_pagination($start, $rows_per_page, $conn) {
        $sql = "SELECT * FROM products LIMIT :start, :rows";
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


    function update_status_product($id, $status){
        $sql = "UPDATE products SET prod_status=? WHERE prod_id=?";
        pdo_execute($sql, $status, $id);
    }

    function delete_product($id){
        $sql = "DELETE FROM products WHERE prod_id=?";
        pdo_execute($sql, $id);
    }

    function show_product_id($id) {
        $sql = "SELECT * FROM products WHERE prod_id=?";
        return pdo_query($sql, $id);
    }
?>