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


$sql = "SELECT * FROM doctors";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>
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

    <title>View Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>
<br>
<div class=add>
  <a href=adddoctors.php target=adminmain><button type=button class=button>Add Doctors</button></a>
</div>
    <br>




    <div class="container">

        <h2>Our Doctors</h2>
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
                  $query = "SELECT * FROM doctors WHERE CONCAT(name,qualification,designation) LIKE '%$filtervalues%' ";
                  $query_run = mysqli_query($con, $query);

                  if(mysqli_num_rows($query_run) > 0)
                  {
                      foreach($query_run as $items)
                      {
                          ?>
                          <tr>
                              <td><?= $items['id']; ?></td>
                              <td><?= $items['name']; ?></td>

                              <td><?= $items['qualification']; ?></td>
                                <td><?= $items['designation']; ?></td>
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

        <th>ID</th>

        <th>Name</th>



        <th>Qualification</th>
        <th>Designation</th>


        <th>Action</th>

    </tr>

    </thead>

    <tbody>

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['name']; ?></td>

                    <td><?php echo $row['qualification']; ?></td>
                      <td><?php echo $row['designation']; ?></td>




                    <td><a class="btn btn-info" href="doctoredit.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="deletedoctors.php?id=<?php echo $row['id']; ?>">Delete</a>
                      &nbsp;
                      <a class="btn btn-success" href="doctordetails.php?id=<?php echo $row['id']; ?>">View</a>
                    </td>

                    </tr>

        <?php       }

            }

        ?>

    </tbody>

</table>

    </div>

</body>

</html>
