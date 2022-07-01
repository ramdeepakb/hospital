<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
.newnurse{
  float:right;
}
</style>
</head>
<body>

  <br><br>
  <a href=staffnurse.html>
    <button type=button class=newnurse>
      Add Nurse</button></a>
      <br>
      <br>


<table>
<tr>
<th>Serial_no</th>
<th>Name</th>
<th>Age</th>
<th>Gender</th>
<th>Mobile No</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "hospital");

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT Serial_no,name,age,gender,mobile_num FROM nurse";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Serial_no"]. "</td><td>" . $row["name"]. "</td><td>" . $row["age"] ."</td><td>" . $row["gender"] . "</td><td>"
. $row["mobile_num"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>


<br><br><br>
<a href=staffcleaners.html>
  <button type=button class=newnurse>
    Add Cleaners</button></a>
    <br><br><br>
<table>
<tr>
  <th>Seial_no</th>
  <th>Name</th>
  <th>Age</th>
  <th>Gender</th>
  <th>Mobile No</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "hospital");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT Serial_no,name,age,gender,mobile_num FROM cleaners";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Serial_no"]. "</td><td>" . $row["name"]. "</td><td>" . $row["age"] ."</td><td>" . $row["gender"]. "</td><td>"
. $row["mobile_num"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>
