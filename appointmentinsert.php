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
if(isset($_POST['save']))
{
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $mobile_num = $_POST['mobile_num'];
      $address = $_POST['address'];
      $purpose=$_POST['purpose'];
        $visited = $_POST['visited'];
    // get the post recordsswds

    $sql_query = "INSERT INTO appointments(`name`, `gender`, `age`, `mobile_num`,`address`,`purpose`,`visited`) VALUES ('$name','$gender','$age','$mobile_num','$address','$purpose','$visited')";

    // insert in database
    $rs = mysqli_query($conn, $sql_query);

    if($rs)
    {
        echo '<script>alert("Appointmnt Success!!")</script>';
        include 'appointment.html';
    }
    else{
        echo "error" . $sql ."" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
