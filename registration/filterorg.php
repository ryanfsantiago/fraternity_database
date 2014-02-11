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

	echo "<option>-----</option>";
while($row = mysqli_fetch_array($result))
  {
  echo "<option value=";
  echo '"' . $row['renew_id'] . '"';
  echo ">" . $row['name'];
  echo "</option>";
  }


mysqli_close($con);
?>