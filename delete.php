<?php

include 'connection.php';

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];


    $sql="delete from `tbluser` where id=$id";
    $result=mysqli_query($conn,$sql);

    if($result){
         header('location:userlist.php');
    }
    else{
        die(mysqli_error($conn));
    }
}


?>