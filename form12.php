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
<title>Adviser Profile</title>
<link rel="stylesheet" type="text/css" href="admin/dist/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="admin/dist/css/bootstrap-min.css" />
<script src="jquery-1.10.2.min.js"></script>
<script src="admin/dist/js/bootstrap.js"></script>
<style type="text/css" media="print" >
           .btn{display:none;} /*class for the div or any element we do not want to print*/
</style>
</head>
<?php
 $q=$_GET["q"];
$r=$_GET["r"];
$s=$_GET["s"];
$t=$_GET["t"];
$sql="SELECT organization.*,category.*,renewal.*,member_has_organization.*, member.* FROM organization inner join category,renewal,member,member_has_organization WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and member_has_organization.renew_id=renewal.renew_id and member_has_organization.member_id=member.member_id" ;

$result2 = mysql_query($sql);
		$row2 = mysql_fetch_array($result2);
		$name = $row2['name'];

?>
<body>
  <script LANGUAGE="JavaScript"> 
if (window.print) {
document.write('<input type=button class="btn btn-primary" name=print value="Print this page" onClick="window.print()"></form>');
}
</script>
  <div class="container" width="1000px">
<p style="text-align:center"><img src="so.png" width="75%" height="40%" /></p>
<h2 style="text-align:center">Adviser Profile</h2>
<p style="text-align:center"><b>Organization:&nbsp;<?php echo $name ?></b>
</p>

  <?php
$q=$_GET["q"];
$r=$_GET["r"];
$s=$_GET["s"];
$t=$_GET["t"];
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"osa_organization");
    $sql="SELECT organization.*,category.*,renewal.*,organization_has_adviser.*, adviser.* FROM organization inner join category,renewal,adviser,organization_has_adviser WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and organization_has_adviser.renew_id=renewal.renew_id and organization_has_adviser.adviser_id=adviser.adviser_id and adviser.adviser_id = '".$t."'" ;


$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
echo "<div style='margin-left:150px;float:left'>";
echo "<b>Name:</b> ".$row['lastname'].", ".$row['firstname']."<br><br>";
echo "<b>Gender:</b> ".$row['gender']."<br><br>";
echo "<b>Civil Status:</b> ".$row['civil_status']."<br><br>";
echo "<b>Major/Field Specification:</b><br><br>";
echo "<b>Address</b>: ".$row['address']."<br><br>";
echo "<b>Years in Service:</b> ".$row['years_of_service']."<br><br>";
echo "</div>";
echo "<div style='float:right;margin-right:150px'>";
echo "<b>Birthdate:</b> ".$row['bdate']."<br><br>";
echo "<b>Contact No.:</b> ".$row['contact_no']."<br><br>";
echo "<b>Position:</b> Adviser<br><br>";
echo "<b>Status of Appointment:</b> ".$row['status_of_appointment']."<br><br>";
echo "</div>";
 ?>

</div>
</body>
</html>