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
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="text-white text-capitalize ps-3">List Categories</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-dark mb-0" href="../dashboard/add-category.php"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Category</a>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Small description</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">cate_status</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                            <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include("../../Model/categories.php");
                                    // showing 1 of 6
                                if(!empty($data)){
                                    foreach($data as $val){
                                        ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="../../public/dashboard/assets/img/<?=$val["cate_image"];?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="text-xs text-secondary mb-0"><?=$val["cate_title"];?></p>
                                                    </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0"><?=$val["cate_small_description"];?></p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <?php
                                                        if($val["cate_status"] == 1){
                                                            ?>
                                                                <a href="../../app/Controller/categoriesController.php?cate_update_status=<?=$val["cate_status"]?>&cate_id=<?=$val["cate_id"];?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                                    <span class="badge badge-sm bg-gradient-success">On</span>
                                                                </a>
                                                            <?php
                                                        }else if($val["cate_status"] == 0){
                                                            ?>
                                                                <a href="../../app/Controller/categoriesController.php?cate_update_status=<?=$val["cate_status"]?>&cate_id=<?=$val["cate_id"];?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                                    <span class="badge badge-sm bg-gradient-secondary">Off</span>
                                                                </a>
                                                            <?php
                                                        }
                                                    ?>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?=$val["cate_description"];?></span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="../../views/dashboard/update-category.php?cate_id_ud=<?=$val["cate_id"];?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Update
                                                    </a>
                                                    <br/>
                                                    <a href="../../app/Controller/categoriesController.php?cate_delete_id=<?=$val["cate_id"];?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
            <!-- Phân trang -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php if ($current_page != 1) { ?>
                            <li class="page-item">
                                <a class="page-link" href="../dashboard/list-categories.php?page=<?php echo ($current_page - 1); ?>" tabindex="-1">
                                    <span class="material-icons">
                                    keyboard_arrow_left
                                    </span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                            <li class="page-item <?php if ($i == $current_page) echo 'active'; ?>">
                                <a class="page-link" href="../dashboard/list-categories.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php } ?>
                        <li class="page-item">
                            <a class="page-link" href="../dashboard/list-categories.php?page=<?php echo ($current_page + 1); ?>">
                                <span class="material-icons">
                                keyboard_arrow_right
                                </span>
                            </a>
                        </li>
                    </ul>
                </nav>
      </div>
      
      
      
      
<!-- START HEADER -->
<?php
  include("../dashboard/includes/footer.php");
?>
<!-- END HEADER -->