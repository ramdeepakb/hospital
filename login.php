<?php
session_start();


$server_name="localhost";
$username="root";
$password="";
$database_name="hospital";

$conn = mysqli_connect($server_name,$username ,$password,$database_name);
if(!$conn)
{
    die("connection failed" . mysqli_connect_error());
}
if(isset($_POST['submit']))
{
    if (isset($_POST['email']) && isset($_POST['password']))
	{
		$email= $_POST['email'];
		$password = $_POST['password'];
        if(mysqli_num_rows(mysqli_query($conn,"select * from user_details where email='$email'")))
		{
			if(mysqli_num_rows(mysqli_query($conn,"select * from user_details where email='$email' AND password='$password'")))
            {
                include 'preface.html';
            }
            else
            {
                echo '<script>alert("Wrong Password")</script>';
                include 'login.html';
            }
        }
    }
}
?>
