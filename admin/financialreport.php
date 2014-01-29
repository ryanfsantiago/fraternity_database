<?php
	$conn = mysql_connect("localhost","root","");
	if (!$conn)
	{
	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("osa_organization", $conn);

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body align="center">
<img src="so.png" width="664" height="154" />
<h2>Financial Report</h2>
<p>Organization:
  <input type="text" name="org" id="org" />
</p>

<p>Date:
  <input type="text" name="date" id="date" />
</p>
<table width="500" height="80" border="1" align="center">
  <tr>
    <th  scope="col">Activity</th>
    <th  scope="col">Income</th>
    <th scope="col">Expense</th>
    <th  scope="col">Net Income</th>
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
$sql="SELECT organization.*,category.*,renewal.*,activity.* FROM organization inner join category,renewal,activity WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and activity.renew_id=renewal.renew_id" ;

$result = mysqli_query($con,$sql);
  while($row = mysqli_fetch_array($result))
  {
 echo "<tr>";
  echo "<td>" . $row['title']."</td>";
  echo "<td>" . $row['income'] . "</td>";
  echo "<td>" . $row['expense'] . "</td>";
  echo "<td>" . $row['net_income'] . "</td>";
  
echo "</tr>";}
  ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
