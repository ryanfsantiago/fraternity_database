<?php
$q=$_GET["q"];
$r=$_GET["r"];
$s=$_GET["s"];
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

 $sql="select distinct name from organization inner join renewal where renewal.org_no=organization.org_no and renewal.renew_id='".$s."'" ;

$result = mysqli_query($con,$sql);  
  $row = mysqli_fetch_array($result);
  echo "<input type='text' value='".$row['name']."'>";
  
  
  
mysqli_select_db($con,"osa_organization");
$sql="SELECT organization.*,category.*,renewal.*,activity.* FROM organization inner join category,renewal,activity WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and activity.renew_id=renewal.renew_id" ;

$result = mysqli_query($con,$sql);

echo "<table border='1'>
<tr>
<th>Activity Title</th>
<th>Venue</th>
<th>Clientele</th>
<th>Date Started</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['title']."</td>";
  echo "<td>" . $row['venue'] . "</td>";
  echo "<td>" . $row['clientele'] . "</td>";
  echo "<td>" . $row['date_started'] . "</td>";
	
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>