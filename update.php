<?php
include_once('link.php');

?>

<?php

include 'connection.php';

  $id=$_GET['updateid'];

  $sql="Select * from `tbluser` where id=$id";
  $result=mysqli_query($conn,$sql);

  $row=mysqli_fetch_assoc($result);
  $firstName=$row['firstName'];
  $lastName=$row['lastName'];
  $gender=$row['gender'];
  $email=$row['email'];
  $password=$row['password'];

if(isset($_POST['submit'])){
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    
    $sql="update `tbluser` set id='$id',firstName='$firstName',lastName='$lastName',gender='$gender',email='$email',password='$password' where id='$id'";


    $result=mysqli_query($conn,$sql);
    
    if($result){
         header('location:userlist.php');
    }
    else{
        die(mysqli_error($conn));
    }
   
}
   
?>


<div id="frmRegistration">
<form class="form-horizontal" action="" method="POST">
	<h1>User Registration</h1>
	<div class="form-group">
    <label class="control-label col-sm-2" for="firstName">First Name:</label>
    <div class="col-sm-6">
      <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Enter Firstname" value=<?php echo $firstName; ?>>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="lastName">Last Name:</label>
    <div class="col-sm-6">
      <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Enter Lastname" value=<?php echo $lastName; ?>>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="gender">Gender:</label>
    <div class="col-sm-6">
      <label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label value=<?php echo $gender; ?>>
	  <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-6">
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value=<?php echo $email; ?>>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-6"> 
      <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password" value=<?php echo $password; ?>>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </div>
  </div>
</form>
</div>