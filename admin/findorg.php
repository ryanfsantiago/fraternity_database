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
<th>Date Founded</th>
<th>Option</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['date_estb'] . "</td>";
  echo "<td>"."<a href ='editorg.php?id=". $row['renew_id']."'><img src='images/icons/edit.png' alt='' title='EDIT' />"."</a>
  "."<a href ='deleteorg.php?id=". $row['renew_id']."'><img src='images/icons/del.png' alt='' title='DELETE' />"."</a></td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>