<?php
	error_reporting(0);
	$conn = mysql_connect("localhost","root","");
	if (!$conn)
	{
	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("osa_organization", $conn);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Roster of Members & Adviser</title>
</head>
<?php
 $q=$_GET["q"];
$r=$_GET["r"];
$s=$_GET["s"];
$sql="SELECT organization.*,category.*,renewal.* FROM organization inner join category,renewal WHERE renewal.schoolyear = '".$q."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id " ;

$result2 = mysql_query($sql);
		$row2 = mysql_fetch_array($result2);
		$name = $row2['name'];

?>
<body align="center">
<img src="so.png" width="664" height="154">
<h2>Roster of Organizations</h2>



<table width="1000" height="80" border="1" align="center">
  <tr>
    <th >Name</th>
	 <th >Category</th>
    <th >Date Established</th>
	<th >Financial Status</th>
  </tr>
  <?php
  $q=$_GET["q"];
$r=$_GET["r"];
$s=$_GET["s"];
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"osa_organization");
$sql="SELECT organization.*,category.*,renewal.* FROM organization inner join category,renewal WHERE renewal.schoolyear = '".$q."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id order by category_name" ;

$result = mysqli_query($con,$sql);
  while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
   echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['category_name'] . "</td>";
  echo "<td>" . $row['date_estb'] . "</td>";
   echo "<td>" . $row['financial_status'] . "</td>";
   
  
echo "</tr>";}
  ?>
</table>


</body>
</html>