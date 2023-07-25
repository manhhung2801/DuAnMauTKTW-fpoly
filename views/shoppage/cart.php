<!-- START HEADER -->
<?php
    include("../shoppage/includes/header.php");
?>
<!-- END HEADER -->
<section class="about-header">
            <h2>#let's_talk</h2>
            <p>LEAVE A MESSAGE, We love to hear from you! </p>        
        </section>

        <section id="cart" class="section-p1">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Remove</td>
                        <td>Image</td>
                        <td>Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Subtotal</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="#"><i class="far fa-times-circle"></i></a></td>
                        <td><img src="../../public/shoppage/assets/products/f1.jpg" alt=""></td>
                        <td>Cartoon Astronaut T-Shirts</td>
                        <td>620000VND</td>
                        <td><input type="number" value="1"></td>
                        <td>620000VND</td>
                    </tr>
                    <tr>
                        <td><a href="#"><i class="far fa-times-circle"></i></a></td>
                        <td><img src="../../public/shoppage/assets/products/f2.jpg" alt=""></td>
                        <td>Cartoon Astronaut T-Shirts</td>
                        <td>620000VND</td>
                        <td><input type="number" value="1"></td>
                        <td>620000VND</td>
                    </tr>
                    <tr>
                        <td><a href="#"><i class="far fa-times-circle"></i></a></td>
                        <td><img src="../../public/shoppage/assets/products/f3.jpg" alt=""></td>
                        <td>Cartoon Astronaut T-Shirts</td>
                        <td>620000VND</td>
                        <td><input type="number" value="1"></td>
                        <td>620000VND</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section id="cart-add" class="section-p1">
            <div id="coupon">
                <h3>Apply Coupon</h3>
                <div>
                    <input type="text" placeholder="Enter Your Coupon">
                    <button class="normal">Apply</button>
                </div>
            </div>
            <div id="subtotal">
                <h3>Cart Totals</h3>
                <table>
                    <tr>
                        <td>Cart Subtotal</td>
                        <td>1240000VND</td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td>Free</td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>1240000VND</strong></td>
                    </tr>
                </table>
                <button class="normal">Proceed to checkout</button>
            </div>
        </section>

<!-- START FOOTER -->
        <?php
            include("../shoppage/includes/footer.php");
        ?>
<!-- END FOOTER -->
