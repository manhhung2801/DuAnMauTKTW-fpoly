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
                          <div class="alert alert-success alert-dismissible text-white" role="alert">
                            <span class="text-sm"><?=$_SESSION["successfully"]?></span>
                            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <?php
                        unset($_SESSION["successfully"]);
                    }else if(isset($_SESSION["error"])){
                        ?>
                            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                              <span class="text-sm"><?=$_SESSION["error"]?></span>
                              <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        <?php
                        unset($_SESSION["error"]);
                    }
                ?>
            </div>
            <div class="col-12">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">UPDATE CATEGORY</h4>
                </div>
              </div>
              <div class="card-body">
                <form role="form" method="POST" action="../../app/Controller/categoriesController.php" class="text-start" enctype="multipart/form-data">
                    <?php
                        if(isset($_GET["cate_id_ud"])) {
                            include("../../Model/categories.php");
                                $id_cate = $_GET["cate_id_ud"];
                                $data = show_category_id($id_cate);
                            foreach($data as $val){
                                ?>
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="cate_title" value="<?=$val["cate_title"];?>" class="form-control">
                                        <input type="hidden" class="custom-file-input" name="ct_id" value="<?=$val["cate_id"];?>">
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Small Description</label>
                                        <input type="text" name="cate_small_description" value="<?=$val["cate_small_description"];?>" class="form-control" >
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <textarea class="form-control" id="form6Example7" name="cate_description" rows="3" placeholder="Description"><?=$val["cate_description"];?></textarea>
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="new_cate_image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"><span><?=$val["cate_image"];?></span>
                                            <img src="../../public/dashboard/assets/img/<?=$val["cate_image"]?> "alt=""  width="100px" height="100px">
                                            <input type="hidden" class="custom-file-input" name="old_cate_image" value="<?=$val["cate_image"];?>" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                  
                  <div class="text-center">
                    <button type="submit" name="update_category" class="btn bg-gradient-primary w-100 my-4 mb-2">Submit</button>
                  </div>
                  
                </form>
              </div>
            </div>
        </div>
      </div>
      
      
<!-- START HEADER -->
<?php
  include("../dashboard/includes/footer.php");
?>
<!-- END HEADER -->