<?php
include 'header.php';
include 'connection.php';
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Pagination</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" 
     href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
  <?php
      
   
    require_once "connection.php";
  
    $limit = 10;      
    if (isset($_GET["page"])) { 
      $pn= $_GET["page"]; 
    } 
    else { 
      $pn=1; 
    };  
  
    $start_from = ($pn-1) * $limit;  
  
    $sql2 = "SELECT * FROM tableuser LIMIT $start_from, $limit";  
    $result = mysqli_query ($conn,$sql2); 
  
  ?>
  <div class="container">
    <br>
    <div>
     
      <table class="table table-striped table-condensed table-bordered">
        <thead>
        <tr>
          <th>SL</th>
          <th>firstName</th>
          <th>lastName</th>
          <th>gender</th>
          <th>email</th
           <th>password</th>
        </tr>
        </thead>
        <tbody>
        <?php  
         // while ($row = mysql_fetch_array($rs_result, MYSQL_ASSOC)) { 
                  // Display each field of the records. 
         while( $row=mysqli_fetch_assoc($result)){
        ?>  
        <tr>  
          <td><?php echo $row["id"]; ?></td>  
          <td><?php echo $row["firstName"]; ?></td>
          <td><?php echo $row["lastName"]; ?></td>
          <td><?php echo $row["gender"]; ?></td>  
           <td><?php echo $row["email"]; ?></td>      
           <td><?php echo $row["password"]; ?></td>      
        </tr>  
        <?php  
        };  
        ?>  
        </tbody>
      </table>
      <ul class="pagination">
      <?php  
        $sql = "SELECT COUNT(*) FROM tableuser";  
        $result = mysqli_query($conn,$sql);  
        $row = mysqli_fetch_row($result);  
        $total_records = $row[0];  
          
       
        $total_pages = ceil($total_records / $limit);  
        $pagLink = "";                        
        for ($i=1; $i<=$total_pages; $i++) {
          if ($i==$pn) {
              $pagLink .= "<li class='active'><a href='pagination.php.php?page="
                                                .$i."'>".$i."</a></li>";
          }            
          else  {
              $pagLink .= "<li><a href='pagination.php?page=".$i."'>
                                                ".$i."</a></li>";  
          }
        };  
        echo $pagLink;  
      ?>
      </ul>
    </div>
  </div>
  </body>
</html>



<?php
include 'footer.php';
?>