<?php


$server_name="localhost";
$username="root";
$password='';
$database_name="hospital";

$conn = mysqli_connect($server_name,$username ,$password,$database_name);
if(!$conn)
{
    die("connection failed" . mysqli_connect_error());
}


$sql = "SELECT * FROM appointments";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
  .button{
    float:right;
    width:130px;
    height:50px;
    border-radius:20px;
    border:0px solid;
    font-weight:bold;
  }
  button:hover{
background:orange;
  }
  .add{
    padding-right:100px;
  }
  </style>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>
<br>
    <br>




    <div class="container">

        <h2>Appointments</h2>
        <br><br>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">

                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <br>
<div class=searchdata>
  <table class="table table-bordered">
      <thead>
          <tr>

          </tr>
      </thead>
      <tbody>
          <?php
              $con = mysqli_connect("localhost","root","","hospital");

              if(isset($_GET['search']))
              {
                  $filtervalues = $_GET['search'];
                  $query = "SELECT * FROM appointments WHERE CONCAT(name,age,purpose) LIKE '%$filtervalues%' ";
                  $query_run = mysqli_query($con, $query);

                  if(mysqli_num_rows($query_run) > 0)
                  {
                      foreach($query_run as $items)
                      {
                          ?>
                          <tr>
                              <td><?= $items['appointmentno']; ?></td>
                              <td><?= $items['name']; ?></td>

                              <td><?= $items['age']; ?></td>
                              <td><?= $items['gender']; ?></td>
                              <td><?= $items['mobile_num']; ?></td>
                              <td><?= $items['address']; ?></td>
                              <td><?= $items['purpose']; ?></td>
                          </tr>
                          <?php
                      }
                  }
                  else
                  {
                      ?>
                          <tr>
                              <td colspan="4">No Record Found</td>
                          </tr>
                      <?php
                  }
              }
          ?>
      </tbody>
  </table>

</div>
        <br>

<table class="table table-striped">

    <thead>

        <tr>

        <th>Appointment No</th>

        <th>Name</th>



        <th>Age</th>
        <th>Gender</th>

        <th>MobileNo</th>
        <th>Address</th>

      <th>Purpose</th>

    </tr>

    </thead>

    <tbody>

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['appointmentno']; ?></td>

                    <td><?php echo $row['name']; ?></td>

                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['gender']; ?></td>

                    <td><?php echo $row['mobile_num']; ?></td>
                      <td><?php echo $row['address']; ?></td>

                    <td><?php echo $row['purpose']; ?></td>


                    </tr>

        <?php       }

            }

        ?>

    </tbody>

</table>

    </div>

</body>

</html>
