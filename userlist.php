<?php 
include 'header.php';
include 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
     <div class="container">
     <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">Gender</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
  <?php

    
   $sql="SELECT * FROM `tbluser`";

   $result=mysqli_query($conn,$sql);
   if($result){
      
    while( $row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $firstName=$row['firstName'];
        $lastName=$row['lastName'];
        $gender=$row['gender'];
        $email=$row['email'];
        $password=$row['password'];

        echo ' <tr>
        <th scope="row">'.$id.'</th>
        <td>'.$firstName.'</td>
        <td>'.$lastName.'</td>
        <td>'.$gender.'</td>
        <td>'.$email.'</td>
        <td>'.$password.'</td>
        
        <td>
        <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
       </td>
      </tr>';
    }
 }
  ?>

  </tbody>
</table>
     </div>
</body>
</html>




<?php
include 'footer.php';
?>