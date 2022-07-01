<?php


$server_name="localhost";
$name="root";
$password="";
$database_name="hospital";

$conn = mysqli_connect($server_name,$name ,$password,$database_name);
if(!$conn)
{
    die("connection failed" . mysqli_connect_error());
}


  if (isset($_POST['submit'])) {

    $name = $_POST['name'];

  $age = $_POST['age'];
    $email = $_POST['email'];
      $mobileno = $_POST['mobileno'];

    $qualification = $_POST['qualification'];

    $designation = $_POST['designation'];
      $address = $_POST['address'];


    $sql = "INSERT INTO `doctors`(`name`, `age`,`email`,`mobileno`,`qualification`, `designation`,`address`) VALUES ('$name','$age','$email','$mobileno','$qualification','$designation','$address')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo '<script>alert("New Record CREATED Successfully!!")</script>';


    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    }

    $conn->close();

  }

?>

<!DOCTYPE html>

<html>
<head>
  <style>
  body {
  background-color: #ff8d85;
  animation-name: event;
  animation-duration: 10s;
  animation-iteration-count:infinite;
}

@keyframes event {
  0%   {background-color:#ff9494;}
  15%  {background-color: #ff9b94;}
  30%  {background-color: #f1fc88;}
  45% {background-color: #fffcab;}
  60% {background-color: #97f587;}
  75% {background-color: pink;}
  90% {background-color: #fcdee9;}
}
  </style>
  </head>

<body>

<h2>New Doctor</h2>

<form action="" method="POST">

  <fieldset>

    <legend>Doctor Profile :</legend>

    Name:<br>

    <input type="text" name="name">

    <br>

        Age:<br>

        <input type="text" name="age">

        <br>

            Email:<br>

            <input type="email" name="email">

            <br>

                Mobile No :<br>

                <input type="text" name="mobileno">

                <br>

    Qualification :<br>

    <input type="text" name="qualification">

    <br>

    Designation :<br>

    <input type="text" name="designation">

    <br>
    Address :<br>

    <input type="text" name="address">

    <br>

    <a href=doctorlist.php><input type="submit" name="submit" value="submit">
</a>
<br><br>
<a href=doctorlist.php><button type=button class=button>Go Back</button></a>
  </fieldset>

</form>

</body>

</html>
