<?php
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
$sql="SELECT organization.*,category.*,renewal.*,member_has_organization.*, member.* FROM organization inner join category,renewal,member,member_has_organization WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and member_has_organization.renew_id=renewal.renew_id and member_has_organization.member_id=member.member_id" ;

$result2 = mysql_query($sql);
		$row2 = mysql_fetch_array($result2);
		$name = $row2['name'];

?>
<body align="center">
<img src="so.png" width="664" height="154">
<h2>Roster of Members and Advisers</h2>
<p>Organization:&nbsp;<b><?php echo $name?></b>
</p>


<h3>Members</h3>
<table width="1000" height="80" border="1" align="center">
  <tr>
    <th >Name</th>
    <th >Position</th>
	<th >Course</th>
	<th >Year Level</th>
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
$sql="SELECT organization.*,category.*,renewal.*,member_has_organization.*, member.* FROM organization inner join category,renewal,member,member_has_organization WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and member_has_organization.renew_id=renewal.renew_id and member_has_organization.member_id=member.member_id" ;

$result = mysqli_query($con,$sql);
  while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['lastname'] .", ".$row['firstname']."</td>";
  echo "<td>" . $row['position'] . "</td>";
   echo "<td>" . $row['course'] . "</td>";
    echo "<td>" . $row['year'] . "</td>";
  
echo "</tr>";}
  ?>
</table>
<h3>Adviser(s)</h3>

<table width="1000" height="80" border="1" align="center">
  <tr>
    <th >Name</th>
    <th >Position</th>
	<th >Status</th>
	<th >Civil Status</th>
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
$sql="SELECT organization.*,category.*,renewal.*,organization_has_adviser.*, adviser.* FROM organization inner join category,renewal,adviser,organization_has_adviser WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and organization_has_adviser.renew_id=renewal.renew_id and organization_has_adviser.adviser_id=adviser.adviser_id" ;

$result = mysqli_query($con,$sql);
  while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['lastname'] .", ".$row['firstname']."</td>";
  echo "<td>" . $row['position'] . "</td>";
   echo "<td>" . $row['status_of_appointment'] . "</td>";
   echo "<td>" . $row['civil_status'] . "</td>";
echo "</tr>";}
  ?>
</table>

</body>
</html>