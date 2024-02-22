<?php  include('header.php');
include('db.php'); 
$id = $_GET['id'];
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location:index.php');

}else{
$sql="DELETE FROM `users` WHERE `user_id`='$id'";
$result=mysqli_query($conn,$sql);
}

?>


    <h1 class="text-center col-12 bg-danger py-3 text-white my-2"> User  Have Been Deleted </h1>
   
  
   
<?php  include('footer.php'); ?>

 
  