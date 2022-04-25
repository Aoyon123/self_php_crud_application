<?php

include 'connection.php';

$sql="SELECT * FROM division2 ORDER BY name ASC";

$result=mysqli_query($conn,$sql);

?>

<div>
    <h1>Address</h1>

    <div class="">
     <label>Division :</label>
     <br>
     <select id="division" name="division" onchange="showDistrict(this.value)">
     <option>Please Select A Division</option>

     <?php
     
     if(mysqli_num_rows($result)>0){
         while($row=mysqli_fetch_assoc($result)){
             $divisionId=$row["id"];
             $division=$row["name"];
           echo '<option value=" ' . $divisionId .'">'. $division .'</option>';
         }
     }
     ?>
    </select>
    <br>
    <label>District</label>
    <br>
    <select id="district" name="district">
    <option value=0>Please Select A District</option>
    </select>
    </div>
    </div>
  

    <script>
  function showDistrict(id){
      var xhttp;
      if(id==""){
          document.getElementById("district").innerHTML="";
          return;
      }
      xhttp=new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
          if(this.readyState==4 && this.status==200){
              document.getElementById("district").innerHTML=this.responseText;
          }
      };
      xhttp.open("GET","getdistrict.php?id="+id,true);
      xhttp.send();
  }
</script>


