<?php 
include 'conn.php';
$id=$_GET['id'];
$sql= "DELETE FROM `products` WHERE p_id = $id";
$result= mysqli_query($conn,$sql);
if($result){
    header('location: index.php');
}

?>