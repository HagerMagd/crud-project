<?php  include('header.php'); 
include('db.php'); 
include('functions.php');
if(isset($_POST['submit'])){
$user_name=sanitizestring($_POST['name']);
$user_email=sanitizeemail($_POST['email']);
$id=$_POST['id'];
if(requiredinput($user_name) || requiredinput($user_email) ){
    $errors[]= "please fill all fields";
}elseif(mininput($user_name,3) || maxinput($user_name,20)){
    $errors []= "name must greater than than 3 char and smaller than 20 char ";
}elseif(validateemail ($user_email)){
    $errors[]='please enter a valid email';
   }
else{
    if(isset($password)){
    $password=sanitizestring($_POST['password']);
    $passwordhash=password_hash($password,PASSWORD_DEFAULT);

    $sql = "UPDATE `users` SET `user_name`='$user_name', `user_email`='$user_email', `user_password`='$passwordhash'
     WHERE `user_id`='$id'";
    }
    else{
        $sql = "UPDATE `users` SET `user_name`='$user_name', `user_email`='$user_email' 
        WHERE `user_id`='$id'";
    }
 $result= mysqli_query($conn,$sql);
    if($result){
        $success ='update successfully' ;
        header("refresh:3;url=index.php");
    }else {
        $errors[] = 'Error updating record: ' . mysqli_error($conn);
    }

   }
    
}

?>


    <h1 class="text-center col-12 bg-info py-3 text-white my-2">Update Info About User</h1>
  
 
  <?php if(isset($errors)):?>
        <h5 class="alert alert-danger text-center">
            <?php foreach( $errors as $error):
                echo $error ."<br>";
            endforeach;?>
        </h5>
    <?php endif; ?>

 <?php if(isset($success)):?>
        <h5 class="alert alert-success text-center">
        <?php echo "$success";
        endif;?>
        </h5>
        <a href="javascript:history.go(-1)" class="btn btn-primary"><< Go Back</a>
    
        <h5 class="alert alert-success text-center"></h5>

<?php  include('footer.php'); ?>

 
  