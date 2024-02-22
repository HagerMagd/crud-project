<?php  include('header.php');
include('functions.php');
include('db.php');
if(isset($_POST['submit'])) {
$name=sanitizestring($_POST['name']);
$email=sanitizeemail($_POST['email']);
$password=sanitizestring($_POST['password']);
if(requiredinput($name) || requiredinput($email) || requiredinput($password)){
    $errors[]= "please fill all fields";
}elseif(mininput($name,3) || maxinput($name,20)){
    $errors []= "name must greater than than 3 char and smaller than 20 char ";
}elseif(mininput($password,3) || maxinput($password,20)){
    $errors []= "password must greater thanthan 3 char and smaller than 20 char ";
}elseif(validateemail ($email)){
    $errors[]='please enter a valid email';
   }
 else{
    $passwordhash=password_hash($password,PASSWORD_DEFAULT);
    $sql_insert= "INSERT INTO `users`(`user_name`, `user_email`, `user_password`) 
    VALUES('$name','$email','$passwordhash') ";
    $result= mysqli_query($conn,$sql_insert);
    if($result){
        $success ='Added successfully' ;
    }

   }
}
?> 
    <h1 class="text-center col-12 bg-info py-3 text-white my-2">Add New User</h1>
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
    <div class="col-md-6 offset-md-3">
        <form class="my-2 p-3 border" method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <label for="exampleInputName1">Full Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName1" >
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
         
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
   
<?php  include('footer.php'); ?>