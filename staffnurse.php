<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php

		$conn = mysqli_connect("localhost", "root", "", "hospital");

		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}

		// Taking all 5 values from the form data(input)
		$Serial_no = $_REQUEST['Serial_no'];
		$name = $_REQUEST['name'];
		$age = $_REQUEST['age'];
		$gender=$_POST['gender'];
		$mobile_num=$_POST['mobile_num'];

		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO nurse VALUES ('$Serial_no',
			'$name','$age','$gender','$mobile_num')";

		if(mysqli_query($conn, $sql)){
			echo "<h1>details saved succesfully</h1>";

		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}

		// Close connection
		mysqli_close($conn);

		?>
		<?php
		echo "<a href=displaystaff.php><button type=button>Go Back</button></a>"
		?>



	</center>
</body>

</html>
