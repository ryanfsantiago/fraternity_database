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

echo "<table border='1'>
<tr>
<th>Activity Title</th>
<th>Venue</th>
<th>Clientele</th>
<th>Date Started</th>
<th>Option</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['title']."</td>";
  echo "<td>" . $row['venue'] . "</td>";
  echo "<td>" . $row['clientele'] . "</td>";
  echo "<td>" . $row['date_started'] . "</td>";
  echo "<td>"."<a href ='editact.php?q=". $row['schoolyear']."&r=".$row['cat_id']."&s=".$row['renew_id']."&t=".$row['act_no']."'><img src='images/icons/edit.png' alt='' title='EDIT' />"."
  "."<a href ='deleteactivity.php?id=". $row['act_no']."'><img src='images/icons/del.png' alt='' title='DELETE' /></a>"."</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>