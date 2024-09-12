<?php
include 'conn.php';
$id = $_GET['id'];
$sql = "SELECT * FROM `products`,`category`,`sub_category` WHERE products.cat_id= category.cat_id AND products.subcat_id=sub_category.subcat_id AND p_id= $id ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
// var_dump($row);


if (isset($_POST['updateprod'])) {


    $p_name = $_POST['pname'];
    $p_qty = $_POST['pqty'];
    $p_size = $_POST['psize'];
    $p_code = $_POST['pcode'];
    $p_price = $_POST['pprice'];
    $p_colour = $_POST['pcolour'];
    $p_mat = $_POST['pmaterial'];
    $p_desc = $_POST['pdesc'];
    $cat = $_POST['category_id'];
    $subCat = $_POST['subCategory_id'];


    if (!empty($_FILES['img']['name'])) {

        $p_img = $_FILES['p_img']['name'];
        $p_tmp = $_FILES['p_img']['tmp_name'];

        move_uploaded_file($p_tmp, 'product_images/' . $p_img);
    } else {
        $img = $_POST['p_img'];
    }
    $updatesql = "UPDATE `products` SET`p_image`='$p_img',`p_name`='$p_name',`p_quentity`='$p_qty',`p_size`='$p_size',`p_code`='$p_code',`p_price`='$p_price',`p_colour`='$p_colour',`p_material`='$p_mat',`p_description`='$p_desc',`cat_id`='$cat',`subcat_id`='$subCat' WHERE  `p_id`='$id'";
    $updateRes = mysqli_query($conn, $updatesql);
    if ($updateRes) {
        header('location: index.php');
    };


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    <?php
    include 'header.php';
    ?>



    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Product</h4>

                            <form class="forms-sample" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="selectCategory">Select Product Category</label>
                                    <select class="form-control" id="selectCategory" name="category_id">
                                        <?php
                                        include 'conn.php';
                                        $id = $_GET['id'];
                                        $sql = "SELECT * FROM `products`,`category`,`sub_category` WHERE products.cat_id= category.cat_id AND products.subcat_id=sub_category.subcat_id AND p_id= $id ";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        while($row1 = mysqli_fetch_array($result)) { ?>
                                            <option value="<?php echo $row1['cat_id']; ?>">
                                                <?php echo $row1['cat_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="selectsCategory">Select Subcategory</label>
                                    <select class="form-control" id="selectsCategory" name="subCategory_id">
                                        <?php
                                        include 'conn.php';
                                        $id = $_GET['id'];
                                        $sql = "SELECT * FROM `products`,`category`,`sub_category` WHERE products.cat_id= category.cat_id AND products.subcat_id=sub_category.subcat_id AND p_id= $id ";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row2 = mysqli_fetch_array($result)) { ?>
                                            <option value="<?php echo $row2['subcat_id']; ?>">
                                                <?php echo $row2['subcat_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <img src="<?php echo 'product_images/'.$row['p_image']; ?>" alt="" width="70" height="70">
                                <input type="text" hidden name="pimg" id="" value="<?php echo $row['p_image']; ?>">

                                <div class="form-group">

                                    <input type="file" value=" <?php echo $row['p_image']; ?>" class="form-control" id="exampleInputUsername1"
                                        name="p_img">
                                </div>

       

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" value=" <?php echo $row['p_name']; ?>" name="pname" class="form-control" id="exampleInputEmail1"
                                        placeholder="Product Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Quantity</label>
                                    <input type="text"  value=" <?php echo $row['p_quentity']; ?>" name="pqty" class="form-control" id="exampleInputPassword1"
                                        placeholder="Quantity">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Product Size</label>
                                    <input type="text"  value=" <?php echo $row['p_size']; ?>" name="psize" class="form-control"
                                        id="exampleInputConfirmPassword1" placeholder="size">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Product Code</label>
                                    <input type="text"  value=" <?php echo $row['p_code']; ?>" name="pcode" class="form-control"
                                        id="exampleInputConfirmPassword1" placeholder="Code">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Product Price</label>
                                    <input type="text"  value=" <?php echo $row['p_price']; ?>" name="pprice" class="form-control"  id="exampleInputPassword1"
                                        placeholder="Price">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Product Colour</label>
                                    <input type="text"  value=" <?php echo $row['p_colour']; ?>" name="pcolour" class="form-control"
                                        id="exampleInputConfirmPassword1" placeholder="Colour">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Product Material</label>
                                    <input type="text"  value=" <?php echo $row['p_material']; ?>" name="pmaterial" class="form-control"
                                        id="exampleInputConfirmPassword1" placeholder="Material">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Product Description</label>
                                    <input type="text"  value=" <?php echo $row['p_description']; ?>" name="pdesc" class="form-control"
                                        id="exampleInputConfirmPassword1" placeholder="Description">
                                </div>



                                <button type="submit" name="updateprod" class="btn btn-primary mr-2">Update Product</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
 
  <!-- End custom js for this page-->
</body>

</html>

