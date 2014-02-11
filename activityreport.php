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
<title>Program of Work</title>
<link rel="stylesheet" type="text/css" href="admin/dist/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="admin/dist/css/bootstrap-min.css" />
<script src="jquery-1.10.2.min.js"></script>
<script src="admin/dist/js/bootstrap.js"></script>
 <style type="text/css" media="print" >
           .btn{display:none;} /*class for the div or any element we do not want to print*/
</style>
</head>

<body>
<script LANGUAGE="JavaScript"> 
if (window.print) {
document.write('<input type=button class="btn btn-primary" name=print value="Print this page" onClick="window.print()"></form>');
}
</script>
  <div class="container" width="1000px">
<form id="form1" name="form1" method="post" action="">
  <p style="text-align:center"><img src="so.png" width="75%" height="40%" /></p>
  <?php
  $q=$_GET["q"];
$r=$_GET["r"];
$s=$_GET["s"];
$sql="SELECT organization.*,category.*,renewal.*,activity.* FROM organization inner join category,renewal,activity WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and activity.renew_id=renewal.renew_id" ;

$result2 = mysql_query($sql);
		$row2 = mysql_fetch_array($result2);
		$name = $row2['name'];

?>
  <h2 style="text-align:center">Program Of Work</h2>
  <p style="text-align:center"><b>Organization:&nbsp;<?php echo $name ?></b>
<span></span>
  </p>
  <table class="table table-bordered">
    <tr>
      <th>Activities</th>
      <th >Venue</th>
      <th >Clientele</th>
      <th>Date</th>
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
echo "</tr>";}
  ?>
  </table>
  <p>&nbsp;</p>
</form>
</div>
</body>
</html>
