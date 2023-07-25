<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tech2etc Ecommerce Tutorial</title>
        <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/> -->
        <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" /> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="../../public/shoppage/assets/css/style.css"> 
    </head>

    <body>
        <!-- header section starts  -->

        <header class="header">

            <div class="header-1">
                <a href="#"><img src="../../public/shoppage/assets/logo.png" class="logo" alt=""></a>

                <!-- <a href="#" class="logo"> <i class="fas fa-book"></i> bookstore </a> -->

                <form action="" class="search-form">
                    <input type="search" name="" placeholder="search here..." id="search-box">
                    <label for="search-box" class="fas fa-search"></label>
                </form>

                <div class="icons">
                    <div id="search-btn" class="fas fa-search"></div>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="./cart.php" class="fas fa-shopping-cart"></a>
                    <div id="login-btn" class="fas fa-user"></div>
                </div>

            </div>

            <div class="header-2">
                <nav class="navbar">
                    <a href="./index.php">Home</a>
                    <a href="./shop.php">Shop</a>
                    <a href="./blog.php">Blog</a>
                    <a href="./about.php">About</a>
                    <a href="./contact.php">Contact</a>
                </nav>
            </div>

        </header>

        <!-- header section ends -->

        <!-- bottom navbar  -->

        <nav class="bottom-navbar">
            <a href="#home" class="fas fa-home"></a>
            <a href="#featured" class="fas fa-list"></a>
            <a href="#arrivals" class="fas fa-tags"></a>
            <a href="#reviews" class="fas fa-comments"></a>s
            <a href="#blogs" class="fas fa-blog"></a>
        </nav>

        <!-- login form  -->

        <div class="login-form-container">

            <div id="close-login-btn" class="fas fa-times"></div>

            <form action="">
                <h3>sign in</h3>
                <span>username</span>
                <input type="email" name="" class="box" placeholder="enter your email" id="">
                <span>password</span>
                <input type="password" name="" class="box" placeholder="enter your password" id="">
                <div class="checkbox">
                    <input type="checkbox" name="" id="remember-me">
                    <label for="remember-me"> remember me</label>
                </div>
                <input type="submit" value="sign in" class="btn">
                <p>forget password ? <a href="#">click here</a></p>
                <p>don't have an account ? <a href="#">create one</a></p>
            </form>

        </div>
        