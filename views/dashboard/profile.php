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
                        if(isset($_SESSION["successfully"])){
                            ?>
                                <div class="alert alert-success" role="alert">
                                    <?=$_SESSION["successfully"]?>
                                </div>
                            <?php
                            unset($_SESSION["successfully"]);
                        }
                    ?>
            </div>
            <?php
                if(isset($_SESSION["admin_info"])){
                    include("../../Model/admin.php");
                        $item = select_admin_id($_SESSION["admin_info"]["ad_id"]);
                        foreach($item as $val){
                            ?>
                                <section class="vh-100" style="background-color: #f4f5f7;">
                                    <div class="container py-5 h-50">
                                        <div class="row d-flex justify-content-center align-items-center h-100">
                                        <div class="col col-lg-12 mb-4 mb-lg-12">
                                            <div class="card mb-3" style="border-radius: .5rem;">
                                            <div class="row g-0">
                                                <div class="col-md-4 gradient-custom text-center text-white"style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                                <img src="../../public/dashboard/assets/img/<?=$val["admin_image"]?>"alt="Avatar" class="img-fluid my-5" style="width: 350px; height: 250px" />
                                                <h3 class="text-muted"><?=$val["admin_fullname"]?></h3>
                                                <p class="text-muted">Web Designer</p>
                                                <i class="far fa-edit mb-5"></i>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body p-4">
                                                        <h6>Information</h6>
                                                        <hr class="mt-0 mb-4">
                                                        <div class="row pt-1">
                                                            <div class="col-6 mb-3">
                                                                <h6>Email</h6>
                                                                <p class="text-muted"><?=$val["admin_email"]?></p>
                                                            </div>
                                                            <div class="col-6 mb-3">
                                                                <h6>Phone</h6>
                                                                <p class="text-muted"><?=$val["admin_phone"]?></p>
                                                            </div>
                                                            <div class="col-6 mb-3">
                                                                <h6>Password</h6>
                                                                <p class="text-muted"><?=$val["admin_password"]?></p>
                                                            </div>
                                                            <div class="col-6 mb-3">
                                                                <h6>account creation date</h6>
                                                                <p class="text-muted"><?=$val["admin_password"]?></p>
                                                            </div>
                                                            <div class="col-6 mb-3">
                                                                <?php
                                                                    if($val["role"] == 1){
                                                                        ?>
                                                                            <h6>Manager</h6>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="d-grid gap-2 col-3 mx-auto">
                                                            <a class="btn bg-gradient-primary" href="../../views/dashboard/update-account-admin.php?up_admin_id=<?=$val["admin_id"]?>">Update</a>
                                                        </div>
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