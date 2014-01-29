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
<title>Member Profile</title>
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
<body align="center">
<img src="so.png" width="664" height="154">
<h2>Member Profile</h2>
<p>Organization:&nbsp;<b><?php echo $name?></b>
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
$sql="SELECT organization.*,address.*,category.*,renewal.*,member_has_organization.*, member.* FROM organization inner join category,renewal,member,member_has_organization,address WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and member_has_organization.renew_id=renewal.renew_id and member_has_organization.member_id=member.member_id and member.member_id='".$t."' LIMIT 1" ;

$result = mysqli_query($con,$sql);
  while($row = mysqli_fetch_array($result))
  {echo "<div style='text-align:center'>";
  echo "<b>Name:</b>&nbsp;" . $row['lastname'] .", ".$row['firstname']."<br><br>";
  echo "<b>Gender:</b>&nbsp;".$row['gender']."<br><br>";
   echo "<b>Birthdate:</b>&nbsp;".$row['bdate']."<br><br>";
  echo "<b>Position:</b>&nbsp;" . $row['position']."<br><br>";
    echo "<b>Course:</b>&nbsp;" . $row['course']."<br><br>";
   }


      mysql_select_db("osa_organization", $conn);
      $result2 = mysql_query("SELECT * from address where member_id = '".$t."' and type = 'Home address' ");
      $row2 = mysql_fetch_array($result2);
       echo "Home Address:&nbsp;" . $row2['brgy'].", ".$row2['municipality'].", ".$row2['province'];
       echo "<br>";
         mysql_select_db("osa_organization", $conn);
      $result2 = mysql_query("SELECT * from address where member_id = '".$t."' and type = 'Clsu Address' ");
      $row2 = mysql_fetch_array($result2);
       echo "Address while studying in CLSU:&nbsp;" . $row2['brgy'].", ".$row2['municipality'].", ".$row2['province'];
  ?>


</body>
</html>