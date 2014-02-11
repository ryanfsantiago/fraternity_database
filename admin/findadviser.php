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

echo "<table border='1'>
<tr>
<th>Advisers' Name</th>
<th>Position</th>
<th>Status of Appointment</th>
<th>Info</th>
<th>Option</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['lastname'] .", ".$row['firstname']."</td>";
  echo "<td>" . $row['position'] . "</td>";
  echo "<td>" . $row['status_of_appointment'] . "</td>";
  echo "<td>"."<a href ='form12.php?q=". $row['schoolyear']."&r=".$row['cat_id']."&s=".$row['renew_id']."&t=".$row['adviser_id']."'>Form 12</a>";
  echo "<td>"."<a href ='editadviser.php?q=". $row['schoolyear']."&r=".$row['cat_id']."&s=".$row['renew_id']."&t=".$row['adviser_id']."'><img src='images/icons/edit.png' alt='' title='EDIT' />"."
  "."<a href ='deleteadviser.php?id=". $row['renew_id']."&rid=".$row['adviser_id']."'><img src='images/icons/del.png' alt='' title='DELETE' />"."</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>