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
<form id="form1" name="form1" method="post" action="">
  <p><img src="so.png" width="664" height="154" /></p>
  <?php
  $q=$_GET["q"];
$r=$_GET["r"];
$s=$_GET["s"];
$sql="SELECT organization.*,category.*,renewal.*,activity.* FROM organization inner join category,renewal,activity WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and activity.renew_id=renewal.renew_id" ;

$result2 = mysql_query($sql);
		$row2 = mysql_fetch_array($result2);
		$name = $row2['name'];

?>
  <h2>Program Of Work</h2>
  <p>Organization:<?php echo $name ?>
<span></span>
  </p>
  <table  width="1000" height="80" border="1" align="center">
    <tr>
      <th scope="col">Title</th>
      <th  scope="col">Venue</th>
      <th  scope="col" >Clientele</th>
      <th scope="col">Date Started</th>
      <th  scope="col">Date Completed</th>
      <th scope="col">Date Filed</th>
	  <th scope="col">Income</th>
	  <th scope="col">Expense</th>
    </tr>
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
  echo "<td>" . $row['venue'] . "</td>";
  echo "<td>" . $row['clientele'] . "</td>";
  echo "<td>" . $row['date_started'] . "</td>";
  echo "<td>" . $row['date_completed'] . "</td>";
  echo "<td>" . $row['date_filed'] . "</td>";
  echo "<td>" . $row['income'] . "</td>";
  echo "<td>" . $row['expense'] . "</td>";
echo "</tr>";}
  ?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
