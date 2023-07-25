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
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">ADD NEW PRODUCT</h4>
                </div>
              </div>
              <div class="card-body">
                <form role="form" method="POST" action="../../app/Controller/productsController.php" class="text-start" enctype="multipart/form-data">
                  <?php
                      if(isset($_GET["prod_id_update"])){
                          include("../../Model/products.php");
                            foreach(show_product_id($_GET["prod_id_update"]) as $data){
                                ?>
                                <div class="input-group input-group-outline my-3">
                                  <label class="form-label">Title</label>
                                  <input type="text" name="prod_title" class="form-control" value="<?=$data["prod_title"];?>">
                                  <input type="hidden" name="prod_id" class="form-control" value="<?=$data["prod_id"];?>">
                                </div>
                                <div class="row">
                                      <div class="col-3">
                                        <div class="input-group input-group-outline my-2">
                                              <?php
                                                          ?>
                                                              <select class="form-select" aria-label="Default select example" name="prod_category_id">
                                                                  <option selected>Categories</option>
                                                                  <?php
                                                                      foreach(select_categories() as $val){
                                                                          if($data["prod_category_id"] == $val["cate_id"]){
                                                                            ?>
                                                                              <option value="<?=$val["cate_id"];?>" selected><?=$val["cate_title"];?></option>
                                                                            <?php
                                                                          }else{
                                                                            ?>
                                                                              <option value="<?=$val["cate_id"];?>"><?=$val["cate_title"];?></option>
                                                                            <?php
                                                                          }
                                                                      }
                                                                  ?>
                                                              </select>
                                                          <?php
                                              ?>
                                              
                                          </div>
                                      </div>
                                      <div class="col-3">
                                          <div class="input-group input-group-outline my-2">
                                              <label class="form-label">Original Price</label>
                                              <input type="number" name="prod_original_price" class="form-control" value="<?=$data["prod_original_price"];?>">
                                          </div>
                                      </div>
                                      <div class="col-3">
                                          <div class="input-group input-group-outline my-2">
                                              <label class="form-label">Selling Price</label>
                                              <input type="number" name="prod_selling_price" class="form-control" value="<?=$data["prod_selling_price"];?>">
                                          </div>
                                      </div>
                                      <div class="col-3">
                                          <div class="input-group input-group-outline my-2">
                                              <label class="form-label">Quantity</label>
                                              <input type="number" name="prod_quantity" class="form-control" value="<?=$data["prod_quantity"];?>">
                                          </div>
                                      </div>
                                </div>
                                <div class="input-group input-group-outline my-3">
                                  <textarea class="form-control" id="form6Example7" name="prod_description" rows="3" placeholder="Description"><?=$data["prod_description"];?></textarea>
                                </div>
                                <div class="input-group input-group-outline my-3">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" name="new_prod_image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                      <img src="../../public/dashboard/assets/img/<?=$data["prod_image"];?>" alt="update_image" height="120px" width="120px">
                                      <input type="hidden" name="old_prod_image" value="<?=$data["prod_image"];?>"> 
                                    </div>
                                </div>
                                <div class="input-group input-group-outline my-3">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="prod_status" value="1" id="form11Example2" <?php echo ($data["prod_status"] == 1)? "checked" : "" ; ?>/>
                                    <label class="form-check-label" for="form11Example2">Status</label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="prod_trending" value="1" id="form11Example2" <?php echo ($data["prod_trending"] == 1)? "checked" : "" ; ?>/>
                                    <label class="form-check-label" for="form11Example2">Trending</label>
                                  </div>
                                </div>
                                <?php
                            }
                      }
                  ?>
                  <div class="text-center">
                    <button type="submit" name="update_product" class="btn bg-gradient-primary w-100 my-4 mb-2">Submit</button>
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