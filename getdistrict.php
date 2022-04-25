<?php
include 'connection.php';

$id=$_GET['id'];
$sql="SELECT * FROM district2 WHERE division-id = $id";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    echo "<option value=''>Select District</option>";
    while($row=mysqli_fetch_assoc($result)){
        $district=$row["name"];
       // echo '<option value=" ' . $district . '">' . $district . '</option>';
       echo "<option value=".$row['name'].">". $row['name'] ."</option>";
    }
}
?>