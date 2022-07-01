<?php


$server_name="localhost";
$username="root";
$password="";
$database_name="hospital";

$conn = mysqli_connect($server_name,$username ,$password,$database_name);
if(!$conn)
{
    die("connection failed" . mysqli_connect_error());
}


if (isset($_GET['appointmentno'])) {

    $user_appointmentno = $_GET['appointmentno'];

    $sql = "DELETE FROM `appointments` WHERE `appointmentno`='$user_appointmentno'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "<h1>Record DELETED Successfullu</h1>";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

}

?>
