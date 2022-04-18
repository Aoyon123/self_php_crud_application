
<!--- For registration data insertion -->

<?php
 include 'connection.php';
$firstName = $lastName = $gender = $email = $password = $pwd = '';

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$pwd = $_POST['password'];
$password = MD5($pwd);

$sql = "INSERT INTO tbluser (firstName,lastName,gender,email,password) VALUES ('$firstName','$lastName','$gender','$email','$password')";
$result = mysqli_query($conn, $sql);
if($result)
{
	header("Location: login.php");
}
else
{
	echo "Error :".$sql;
}
?>