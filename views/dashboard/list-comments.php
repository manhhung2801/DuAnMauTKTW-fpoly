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
                    }else if(isset($_SESSION["error"])){
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?=$_SESSION["error"]?>
                            </div>
                        <?php
                        unset($_SESSION["error"]);
                    }
                ?>
            </div>
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">List Comments</h6>
                    </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Number of comments</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">New Date</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Old Date</th>
                            <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="../../public/dashboard/assets/img/Men Slogan Graphic Curved Hem Tee.jpeg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="text-xs text-secondary mb-0">Áo Thun</p>
                                                    </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    
                                                    <p class="text-xs text-secondary mb-0">12</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">2023-01-21</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">2022-01-21</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="../../app/Controller/adminController.php?delete_ad_id=" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Detail
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="../../public/dashboard/assets/img/1690209079.jpeg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="text-xs text-secondary mb-0">Quần Jean Nữ</p>
                                                    </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    
                                                    <p class="text-xs text-secondary mb-0">32</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">2023-03-21</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">2021-01-21</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="../../app/Controller/adminController.php?delete_ad_id=" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Detail
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="../../public/dashboard/assets/img/1690208842.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="text-xs text-secondary mb-0">Quần Short nam</p>
                                                    </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    
                                                    <p class="text-xs text-secondary mb-0">2</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">2023-01-21</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">2019-01-21</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="../../app/Controller/adminController.php?delete_ad_id=" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Detail
                                                    </a>
                                                </td>
                                            </tr>

                                 
                
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
      </div>
      
      
<!-- START HEADER -->
<?php
  include("../dashboard/includes/footer.php");
?>
<!-- END HEADER -->