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
                        <h6 class="text-white text-capitalize ps-3">List account admin</h6>
                    </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">FullName</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                            <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include("../../Model/admin.php");
                                    $list = list_admin();
                                if(!empty($list)){
                                    foreach($list as $val){
                                        ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="../../public/dashboard/assets/img/<?=$val["admin_image"];?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="text-xs text-secondary mb-0"><?=$val["admin_email"];?></p>
                                                    </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($val["role"] == 1){
                                                            ?>
                                                                <p class="text-xs font-weight-bold mb-0">Manager</p>
                                                            <?php
                                                        }
                                                    ?>
                                                    <p class="text-xs text-secondary mb-0"><?=$val["admin_fullname"];?></p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <?php
                                                        if($val["role"] == 1){
                                                            ?>
                                                                <a href="../../app/Controller/adminController.php?update_role&admin_id=<?=$val["admin_id"]?>&admin_role=<?=$val["role"]?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                                    <span class="badge badge-sm bg-gradient-success">On</span>
                                                                </a>
                                                            <?php
                                                        }else if($val["role"] == 0){
                                                            ?>
                                                                <a href="../../app/Controller/adminController.php?update_role&admin_id=<?=$val["admin_id"]?>&admin_role=<?=$val["role"]?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                                    <span class="badge badge-sm bg-gradient-secondary">Off</span>
                                                                </a>
                                                            <?php
                                                        }
                                                    ?>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?=$val["created_ad"];?></span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="../../app/Controller/adminController.php?delete_ad_id=<?=$val["admin_id"];?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                
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