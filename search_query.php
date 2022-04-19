<?php

include 'header.php';

?>

<h1>User Search List:</h1>

<?php
$username = "root";
$password = "";
$server = "localhost";
$db = "crud18";

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
    die("Connection failed");
}

if (isset($_POST['search'])) {
    $name = $_POST['user_name'];
    $sql2 = "SELECT * FROM `tbluser` WHERE firstName LIKE '%$name%' OR lastName LIKE '%$name%'";
    $result = $conn->query($sql2);

} else {
    $sql = "SELECT id,firstName,lastName,address,gender,status,email,password FROM tbluser";
    $result = $conn->query($sql);
}

?>



   <div class="container">
     <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
  <?php

    
 

   $result=mysqli_query($conn,$sql2);
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

















<?php

include 'footer.php';

?>