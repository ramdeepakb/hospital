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
    $billno = $_POST['billno'];
    $name = $_POST['name'];
    $age = $_POST['age'];
      $paymentholder = $_POST['paymentholder'];
    $date = $_POST['date'];
    $amount = $_POST['amount'];
    // get the post recordsswds

    $sql_query = "INSERT INTO payment(`name`, `age`,`paymentholder`, `date`, `amount`) VALUES ('$name','$age','$paymentholder','$date','$amount')";

    // insert in database
    $rs = mysqli_query($conn, $sql_query);

    if($rs)
    {
        echo '<script>alert("PAYMENT Done!!")</script>';
        include 'userpaymentsection.html';
    }
    else{
        echo "error" . $sql ."" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
