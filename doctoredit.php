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



    if (isset($_POST['update'])) {

        $name = $_POST['name'];

        $user_id = $_POST['user_id'];
  $age = $_POST['age'];
    $email = $_POST['email'];
    $mobileno = $_POST['mobileno'];

        $qualification = $_POST['qualification'];

        $designation = $_POST['designation'];
          $address = $_POST['address'];
          $image=$_POST['image'];



        $sql = "UPDATE `doctors` SET `name`='$name',`age`='$age',`email`='$email',`mobileno`='$mobileno' ,`qualification`='$qualification',`designation`='$designation',`address`='$address',`image`='$image' WHERE `id`='$user_id'";

        $result = $conn->query($sql);

        if ($result == TRUE) {


        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    }

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "SELECT * FROM `doctors` WHERE `id`='$user_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $name = $row['name'];

            $age = $_POST['age'];
              $email = $_POST['email'];
              $mobileno = $_POST['mobileno'];
            $qualification = $row['qualification'];

            $designation  = $row['designation'];
                      $address = $_POST['address'];
                        $image = $_POST['image'];


            $id = $row['id'];

        }

    ?>

        <h2>Doctor Update Form</h2>

        <form action="" method="post">

          <fieldset>

            <legend>Doctor Profile:</legend>

            Name:<br>

            <input type="text" name="name" value="<?php echo $name; ?>">

            <input type="hidden" name="user_id" value="<?php echo $id; ?>">

            <br>
            Age :<br>

            <input type="text" name="age" value="<?php echo $age; ?>">


            <br>
            Email :<br>

            <input type="text" name="email" value="<?php echo $email; ?>">

            <br>
            Mobile No:<br>

            <input type="text" name="mobileno" value="<?php echo $mobileno; ?>">

            <br>


            Qualification:<br>

            <input type="text" name="qualification" value="<?php echo $qualification; ?>">

            <br>

            Designation:<br>

            <input type="text" name="designation" value="<?php echo $designation; ?>">

            <br>
            Address :
            <br>
            <textarea rows=5 cols=23 name=address  value="<?php echo $address; ?>">
            </textarea>

            <br>
            <input type=file name=image  value="<?php echo $address; ?>">
<br>




        <br><br>
        <a href=doctorlist.php><button type=button class=button>Go Back</button></a>

          </fieldset>

        </form>

        </body>

        </html>

    <?php

    } else{

        header('Location: doctorlist.php');

    }

}

?>
