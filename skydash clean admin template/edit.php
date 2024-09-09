<?php
include 'conn.php';
$id= $_GET['id'];
$sql= "SELECT * FROM `products`,`category`,`sub_category` WHERE products.cat_id= category.cat_id AND products.subcat_id=sub_category.subcat_id AND p_id= $id ";
$result=mysqli_query($conn,$sql);
$row= mysqli_fetch_array($result);
var_dump($row);


if(isset($_POST['updateprod'])){
   
   
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
    

if(!empty($_FILES['img']['name'])){

    $p_img= $_FILES['p_img']['name'];
    $p_tmp= $_FILES['p_img']['tmp_name'];

    move_uploaded_file($p_tmp,'product_images/'.$p_img);
}
else{
    $img=$_POST['p_img'];
}
$updatesql= "UPDATE `products` SET`p_image`='$p_img',`p_name`='$p_name',`p_quentity`='$p_qty',`p_size`='$p_size',`p_code`='$p_code',`p_price`='$p_price',`p_colour`='$p_colour',`p_material`='$p_mat',`p_description`='$p_desc',`cat_id`='$cat',`subcat_id`='$subCat' WHERE  `p_id`='$id'";
$updateRes= mysqli_query($conn, $updatesql);
if($updateRes){
    header('location: index.php');
};

};
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                                     

                                       
                                        <button type="submit" name="updateprod" class="btn btn-primary mr-2">Update Product</button>
                                      
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>