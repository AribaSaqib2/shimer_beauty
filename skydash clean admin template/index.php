<?php
session_start();
include 'conn.php';
$sqlprod= "SELECT * FROM `products`,`category`,`sub_category` WHERE category.cat_id= products.cat_id AND sub_category.subcat_id= products.subcat_id";
$result = mysqli_query($conn, $sqlprod);
$sqlProdCount = "SELECT COUNT(*) FROM `products`";
$res2 = mysqli_query($conn,$sqlProdCount);
$ProdCount=mysqli_fetch_array($res2);
if(!$_SESSION['e']){
  echo "<script>
    window.location.href = 'pages/samples/login.php';
  </script>";
 
}
else{

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
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome <?php echo $_SESSION['n']?></h3>
                 
                </div>
                <div class="col-12 col-xl-4">
                  <div class="justify-content-end d-flex">
                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                      <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                      </button>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                        <a class="dropdown-item" href="#">January - March</a>
                        <a class="dropdown-item" href="#">March - June</a>
                        <a class="dropdown-item" href="#">June - August</a>
                        <a class="dropdown-item" href="#">August - November</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-4 stretch-card transparent">
              <div class="card card-tale">
                <div class="card-body">
                <p class="mb-4">Total Products</p>
                <p class="fs-30 mb-2"><?php echo $ProdCount[0]; ?></p>
               
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <p class="mb-4">Total Bookings</p>
                  <p class="fs-30 mb-2">61344</p>
                  <p>22.00% (30 days)</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
              <div class="card card-light-blue">
                <div class="card-body">
                  <p class="mb-4">Number of Meetings</p>
                  <p class="fs-30 mb-2">34040</p>
                  <p>2.00% (30 days)</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
              <div class="card card-light-danger">
                <div class="card-body">
                  <p class="mb-4">Number of Clients</p>
                  <p class="fs-30 mb-2">47033</p>
                  <p>0.22% (30 days)</p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">All Products</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Product Image</th>
                          <th>Product Name</th>
                          <th>Product Quentity</th>
                          <th>Product size</th>
                          <th>Product Code</th>
                          <th>Product Price</th>
                          <th>Product Colour</th>
                          <th>Product Material</th>
                          <th>Product Discription</th>
                          <th>Product Category</th>
                          <th>Product Sub Category</th>
                          <th colspan="2">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($row= mysqli_fetch_array($result)){
                        ?>
                        <tr>
                          <td><img src="<?php echo 'product_images/'.$row[1] ?>" alt="" width="60" height="60"></td>
                          <td class="font-weight-bold"><?php echo $row[2]?></td>
                          <td><?php echo $row[3]?></td>
                          <td ><?php echo $row[4]?></td>
                          <td ><?php echo $row[5]?></td>
                          <td ><?php echo $row[6]?></td>
                          <td ><?php echo $row[7]?></td>
                          <td ><?php echo $row[8]?></td>
                          <td ><?php echo substr( $row[9],0,15).'....'?></td>
                          <td ><?php echo $row['cat_name']?></td>
                          <td ><?php echo $row['subcat_name']?></td>    
                          <td><a href="edit.php?id=<?php echo $row['p_id']; ?>">Edit</a></td>
                          <td><a href="delete.php?id=<?php echo $row[0]; ?>">Delete</a></td>  
                        </tr>
                       
                       
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                  class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
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
  <?php } ?>
  <!-- End custom js for this page-->
</body>

</html>