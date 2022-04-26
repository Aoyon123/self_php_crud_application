<?php
include 'connection.php';

$id = $_GET['id'];
//echo($id);exit;
//echo($_GET['id']);exit;
$sql = "SELECT * FROM district WHERE division_id = $id";

//print_r($_GET['id']);exit;

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    echo "<option value=''>Select District</option>";
    while($row=mysqli_fetch_assoc($result)){
        $district=$row["name"];
        $id=$row['id'];
       echo '<option value="' . $id . '">' . $district . '</option>';
      // echo "<option value=".$row['name'].">". $row['name'] ."</option>";
    }
}
?>