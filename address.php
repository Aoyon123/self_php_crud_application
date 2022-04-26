
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php
include 'connection.php';

$sql = "SELECT * FROM division ORDER BY name ASC";

$result = mysqli_query($conn, $sql);

//$sql2 = "SELECT * FROM district ORDER BY name ASC";

//$result2 = mysqli_query($conn, $sql2);
//print_r($result);exit;
?>

<div class="container">
    <h1 class="header-style">Address</h1>

    <div class="">
        <label>Division :</label>
        <br>
        <select id="division" name="division" onchange="showDistrict(this.value)">
            <option>Please Select A Division</option>

            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $divisionId = $row["id"];
                    $division = $row["name"];
                    echo '<option value=" ' . $divisionId . '">' . $division . '</option>';
                }
            }
            ?>
        </select>
        <br>
        <br>
        <label>District</label>
        <br>
        <select id="district" name="district" onchange="showThana(this.value)">
            <option value=0>Please Select A District</option>

        </select>
        <br>
        <br>
          <label>Thana</label>
        <br>
        <select id="thana" name="thana" onchange="showUnion(this.value)">
            <option value=0>Please Select A Thana</option>
        </select>      
       <br>
        <br>
        
         <label>Union</label>
        <br>
        <select id="union" name="union">
            <option value=0>Please Select A Union</option>
        </select> 
    </div>
    <style>
        .header-style{
            color:red;
        }
    </style>
</div>


<script src="script.js"></script>

