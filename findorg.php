<?php
$q=$_GET["q"];
$r=$_GET["r"];

$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"osa_organization");
$sql="SELECT organization.*,category.*,renewal.* FROM organization inner join category,renewal WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id" ;

$result = mysqli_query($con,$sql);

echo "<table border='2' class='table table-responsive'>
<tr>
<th>Organization Name</th>
<th>Members</th>
<th>Activities</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
 echo "<td><a href='memberreport.php?q=".$row['schoolyear']."&r=".$row['cat_id']."&s=".$row['renew_id']."'>View Roster of Members</a></td>";
 echo "<td><a href='activityreport.php?q=".$row['schoolyear']."&r=".$row['cat_id']."&s=".$row['renew_id']."'>View Activities</a></td></tr>";

  }
echo "</table>";

mysqli_close($con);
?>