---- setups database ----
# CREATE DATABASE shoppingonline
CREATE DATABASE DuAn1;

# CREATE TABLE admin
CREATE TABLE admin(
    admin_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    admin_fullname VARCHAR(100) NOT NULL,
    admin_email VARCHAR(255) NOT NULL,
    admin_phone INT(15) NOT NULL,
    admin_password VARCHAR(100) NOT NULL,
    admin_image VARCHAR(100) NOT NULL,
    role INT(1) NOT NULL DEFAULT 0,
    created_ad TIMESTAMP
);

# CREATE TABLE users

CREATE TABLE users(
    user_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    user_phone INT(15) NOT NULL,
    user_password VARCHAR(100) NOT NULL,
    user_image VARCHAR(100) NOT NULL,
    user_status INT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP
);

# CREATE TABLE categories
CREATE TABLE categories(
    cate_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cate_title VARCHAR(255) NOT NULL,
    cate_small_description VARCHAR(100) NOT NULL,
    cate_description MEDIUMTEXT,
    cate_image VARCHAR(255) NOT NULL,
    cate_status INT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP
);

# CREATE TABLE products
CREATE TABLE products(
    prod_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    prod_category_id INT(11) NOT NULL,
    prod_title VARCHAR(255) NOT NULL,
    prod_original_price INT(255) NOT NULL,
    prod_selling_price INT(255) NOT NULL,
    prod_image VARCHAR(255) NOT NULL,
    prod_quantity INT(255) NOT NULL,
    prod_trending INT(1) NOT NULL DEFAULT 0,
    prod_status  INT(1) NOT NULL DEFAULT 0,
    prod_description MEDIUMTEXT,
    FOREIGN KEY (prod_category_id) REFERENCES categories(cate_id),
    created_at TIMESTAMP
);

# CREATE TABLE carts
CREATE TABLE carts(
cart_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
cart_user_id INT(11) NOT NULL,
cart_product_id INT(11) NOT NULL,
cart_quantity INT(200) NOT NULL,
created_at TIMESTAMP,
FOREIGN KEY (cart_user_id) REFERENCES users(user_id),
FOREIGN KEY (cart_product_id) REFERENCES products(prod_id)
);

# CREATE TABLE orders
CREATE TABLE orders(
    order_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    order_user_id INT(11) NOT NULL ,
    order_username VARCHAR(200) NOT NULL ,
    order_phone VARCHAR(200) NOT NULL ,
    order_address  VARCHAR(255) NOT NULL ,
    order_email VARCHAR(255) NOT NULL ,
    order_pincode VARCHAR(255) ,
    order_total_price DOUBLE,
    order_payment_mode VARCHAR(255) ,
    order_status  INT(1) NOT NULL DEFAULT 0,
    order_comments VARCHAR(255) ,
    created_at TIMESTAMP,
    FOREIGN KEY (order_user_id) REFERENCES users(user_id)
);

# CREATE TABLE order_items
CREATE TABLE order_items(
    od_items_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    od_items_order_id INT(11) NOT NULL,
    od_items_product_id  INT(11) NOT NULL,
    order_quantity DOUBLE,
    order_price DOUBLE,
    created_at TIMESTAMP,
    FOREIGN KEY (od_items_order_id) REFERENCES orders(order_id),
    FOREIGN KEY (od_items_product_id) REFERENCES products(prod_id)
);