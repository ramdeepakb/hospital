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
 session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  </style>
</head>
<body>
	<h3>Payment Section</h3>
	<table class="table">
		<th>Bill No</th>
    <th>Name</th>
    <th>Payment Holder</th>
    <th>Date</th>
		<th>Amount</th>
	<?php
		$total_amount=0;

		//MySQLi OOP
		$query=$conn->query("select * from payment");
		while($row=$query->fetch_array()) {
			?>
				<tr>
					<td><?php echo $row['billno']; ?></td>
          	<td><?php echo $row['name']; ?></td>
            	<td><?php echo $row['paymentholder']; ?></td>
              	<td><?php echo $row['date']; ?></td>
					<td><?php echo $row['amount']; ?></td>
				</tr>
			<?php
			$total_amount += $row['amount'];
		}
	?>
	<tr style="background:lightgreen;">
		<td colspan=4>TOTAL AMOUNT:</td>
		<td><?php echo $total_amount; ?></td>

	</tr>
	</table>

</body>
</html>
