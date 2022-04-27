<?php

include 'connection.php';

$id = $_GET['id'];
//echo($id);exit;
//echo($_GET['id']);exit;
$sql2 = "SELECT * FROM thana WHERE district_id = $id";

//print_r($_GET['id']);exit;

$result2 = mysqli_query($conn, $sql2);
print_r($result2);
if (mysqli_num_rows($result2) > 0) {
    echo "<option value=0>Select Thana</option>";
    while ($row = mysqli_fetch_assoc($result2)) {
        $id=$row['id'];
        $thana = $row["name"];
        echo '<option value="' . $id . '">' . $thana . '</option>';
        // echo "<option value=".$row['name'].">". $row['name'] ."</option>";
    }
}
?>
<?php

?>