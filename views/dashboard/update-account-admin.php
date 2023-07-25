<!-- START HEADER -->
<?php
  include("../../views/dashboard/includes/header.php");
?>
<!-- END HEADER -->

<body class="g-sidenav-show  bg-gray-200">
  <!-- START SIDEBAR -->
  <?php
    include("../../views/dashboard/includes/sidebar.php");
  ?>
  <!-- END SIDEBAR -->
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- START NAVBAR -->
    <?php
      include("../../views/dashboard/includes/navbar.php");
    ?>
    <!-- END NAVBAR -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-4">
                <?php
                        if(isset($_SESSION["error"])){
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <?=$_SESSION["error"]?>
                                </div>
                            <?php
                            unset($_SESSION["error"]);
                        }
                    ?>
            </div>
            <?php
                if(isset($_SESSION["admin_info"]) && !empty($_GET["up_admin_id"])){
                    include("../../Model/admin.php");
                        $item = select_admin_id($_GET["up_admin_id"]);
                        foreach($item as $val){
                            ?>
                                <section class="vh-100" style="background-color: #eee;">
                                    <div class="container h-50">
                                        <div class="row d-flex justify-content-center align-items-center h-100">
                                        <div class="col-lg-12 col-xl-11">
                                            <div class="card text-black" style="border-radius: 25px;">
                                            <div class="card-body p-md-5">
                                                <div class="row justify-content-center">
                                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Update Account</p>

                                                    <form class="mx-1 mx-md-7" method="POST" action="../../app/Controller/adminController.php" enctype="multipart/form-data">
                                                        <input type="hidden" name="admin_id" value="<?=$val["admin_id"];?>" />
                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="form3Example1c" name="admin_fullname" class="form-control" value="<?=$val["admin_fullname"];?>" />
                                                        <label class="form-label" for="form3Example1c">Full Name</label>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                        <input type="email" id="form3Example3c" name="admin_email" class="form-control"value="<?=$val["admin_email"];?>"/>
                                                        <label class="form-label" for="form3Example3c">Your Email</label>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                        <input type="phone" id="form3Example3c" name="admin_phone" class="form-control"value="<?=$val["admin_phone"];?>"/>
                                                        <label class="form-label" for="form3Example3c">Your Phone</label>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="form3Example4c" name="admin_password" value="<?=$val["admin_password"];?>" class="form-control" />
                                                        <label class="form-label" for="form3Example4c">Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <select class="form-select" name="role" aria-label="Default select example">
                                                                <?php
                                                                    if ($val["role"] == 1){
                                                                        ?>
                                                                            <option selected value="1">Manager</option>
                                                                            <option value="0">No Manager</option>
                                                                        <?php
                                                                    }else if ($val["role"] == 0){
                                                                        ?>
                                                                            <option value="1">Manager</option>
                                                                            <option selected value="0">No Manager</option>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                            <label class="form-label" for="form3Example4c">Role</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-check d-flex justify-content-center mb-5">
                                                        <i class="fas fa-image fa-lg me-3 fa-fw"></i>
                                                        <input type="file" id="form3Example4c" name="new_admin_image" class="form-control" />
                                                        <input type="hidden" name="old_admin_image" value="<?=$val["admin_image"];?>"/>
                                                        <label for="form3Example4c"><?=$val["admin_image"];?></label>
                                                    </div>

                                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                        <button type="submit" class="btn bg-gradient-primary btn-lg" name="update_account_ad">Update</button>
                                                    </div>

                                                    </form>

                                                </div>
                                                <div class="col-md-4 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                                    <img src="../../public/dashboard/assets/img/<?=$val["admin_image"];?>"
                                                    class="img-fluid" alt="Sample image">

                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </section>
                            <?php
                        }
                }
            ?>
      </div>
      
      
<!-- START HEADER -->
<?php
  include("../dashboard/includes/footer.php");
?>
<!-- END HEADER -->