<?php 
session_start();
include 'conn.php';
$sqlCat="SELECT * FROM `category`";
$resCat=mysqli_query($conn, $sqlCat);

$sqlSubcat="SELECT * FROM `sub_category`";
$resSubcat=mysqli_query($conn, $sqlSubcat);

if(isset($_POST['addprod'])){
    $p_img= $_FILES['p_img']['name'];
    $p_tmp= $_FILES['p_img']['tmp_name'];
    move_uploaded_file($p_tmp,'product_images/'.$p_img);
    $p_name= $_POST['pname'];
    $p_qty= $_POST['pqty'];
    $p_size= $_POST['psize'];
    $p_code= $_POST['pcode'];
    $p_price= $_POST['pprice'];
    $p_colour=$_POST['pcolour'];
    $p_mat= $_POST['pmaterial'];
    $p_desc= $_POST['pdesc'];
    $cat=$_POST['category_id'];
    $subCat=$_POST['subCategory_id'];

    $sqlProd= "INSERT INTO `products`(`p_image`, `p_name`, `p_quentity`, `p_size`, `p_code`, `p_price`, `p_colour`, `p_material`, `p_description`, `cat_id`, `subcat_id`) VALUES ('$p_img','$p_name','$p_qty','$p_size','$p_code','$p_price','$p_colour','$p_mat','$p_desc','$cat','$subCat')";

    $resProd= mysqli_query($conn, $sqlProd);
    if ($resProd) {
        echo "<script>
        window.location.href = 'index.php';
    </script>";
    };
    


};
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
            <!-- partial -->

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

                                    <?php while ($row = mysqli_fetch_assoc($resCat)) { ?>
                                            <option value="<?php echo $row['cat_id']; ?>">
                                                <?php echo $row['cat_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="selectsCategory">Select Subcategory</label>
                                    <select class="form-control" id="selectsCategory" name="subCategory_id">

                                    <?php while ($row = mysqli_fetch_assoc($resSubcat)) { ?>
                                            <option value="<?php echo $row['subcat_id']; ?>">
                                                <?php echo $row['subcat_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                        <div class="form-group">
                                           
                                            <input type="file" class="form-control" id="exampleInputUsername1"
                                                name="p_img">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Name</label>
                                            <input type="text" name="pname" class="form-control" id="exampleInputEmail1"
                                                placeholder="Product Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product Quentity</label>
                                            <input type="number" name="pqty" class="form-control" id="exampleInputPassword1"
                                                placeholder="Quentity">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Product Size</label>
                                            <input type="text" name="psize" class="form-control"
                                                id="exampleInputConfirmPassword1" placeholder="size">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Product Code</label>
                                            <input type="text" name="pcode" class="form-control"
                                                id="exampleInputConfirmPassword1" placeholder="Code">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Product Price</label>
                                            <input type="number" name="pprice" class="form-control"
                                                id="exampleInputConfirmPassword1" placeholder="Price">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Product Colour</label>
                                            <input type="text" name="pcolour" class="form-control"
                                                id="exampleInputConfirmPassword1" placeholder="Colour">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Product Material</label>
                                            <input type="text" name="pmaterial" class="form-control"
                                                id="exampleInputConfirmPassword1" placeholder="Material">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Product Description</label>
                                            <input type="text" name="pdesc" class="form-control"
                                                id="exampleInputConfirmPassword1" placeholder="Description">
                                        </div>
                                     

                                       
                                        <button type="submit" name="addprod" class="btn btn-primary mr-2">Submit</button>
                                      
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller --> Bootstrap admin template

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