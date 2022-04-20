<?php 
include 'header.php';
include 'connection.php';
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
<?php
$records = mysqli_query($conn,"SELECT count(*) FROM tbluser ORDER BY id ASC");
$row_db = mysqli_fetch_row($records);
$total_records = $row_db[0];
?>
     
    <div>
  <form action="search_query.php" id="" method="POST"> 
  <input type="search" id="query" name="user_name" placeholder="Search...">
  <input type="submit" name="search" value="Search">
  </form>
    </div>
    
    
    <div>
     <div class="container">
     
   <table class="table table-bordered table-striped">
<tr>
<td><h1>Total Number of records </h1></td>
<td><h1><?php echo $total_records; ?></h1></td>
</tr>
</table>
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
   $numberOfRecordsPerPage = 5;   
   if (isset($_GET["page"])) {
  $page  = $_GET["page"];
  }
  else{
  $page=1;
  }
   $start_page = ($page-1) * $numberOfRecordsPerPage;
   $result = mysqli_query($conn,"SELECT * FROM tbluser ORDER BY id ASC LIMIT $start_page, $numberOfRecordsPerPage");
    
   //$sql="SELECT * FROM `tbluser`";

   //$result=mysqli_query($conn,$sql);
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
       
   <div class="pagination-drop">
  
       <div class="pageLink"> 
 <?php

$total_pages = ceil($total_records/ $numberOfRecordsPerPage);
$pageLink = "<ul class='pagination'>";
for ($i=1; $i<=$total_pages; $i++) {
$pageLink .= "<li class='page-item'><a class='page-link' href='userlist.php?page=".$i."'>".$i."</a></li>";
}
echo $pageLink; "</ul>";
?>
  
     </div>
    <div class="dropdown">
  <button class="dropbtn">Select</button>
  <div class="dropdown-content">
    
    <a href="#">10</a>
    <a href="#">20</a>
  </div>
</div>
  </div>
         
         
   </div>
    </div>
   
</body>
</html>




<?php
include 'footer.php';
?>