<?php
$servername = "localhost";
$username="root";
$password="";
$db_name="ticketing_system";
$conn = new mysqli($servername,$username,$password,$db_name);

//checking
if($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}
echo "";
?>