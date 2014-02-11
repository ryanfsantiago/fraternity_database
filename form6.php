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
<h2 style="text-align:center">Member Profile</h2>
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
$sql="SELECT organization.*,address.*,category.*,renewal.*,member_has_organization.*, member.*,position.* FROM organization inner join position,category,renewal,member,member_has_organization,address WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and member_has_organization.renew_id=renewal.renew_id and member_has_organization.member_id=member.member_id and position.pos_id=member_has_organization.pos_id and member.member_id='".$t."' LIMIT 1" ;

$result = mysqli_query($con,$sql);
  while($row = mysqli_fetch_array($result))
  {echo "<div style='text-align:left'>";
  echo "<img style='float:right;border-radius:15px;margin-right:180px' src='admin/photo/".$row['photo']."' width='150px' height='150px' style='border-radius:15px'><br>";
  echo "<div style='margin-left:180px;'><b>Name:</b>&nbsp;" . $row['lastname'] .", ".$row['firstname']."<br><br>";
  echo "<b>Gender:</b>&nbsp;".$row['gender']."<br><br>";
   echo "<b>Birthdate:</b>&nbsp;".$row['bdate']."<br><br>";
  echo "<b>Position in the Organization:</b>&nbsp;" . $row['pos_name']."<br><br>";
    echo "<b>Course:</b>&nbsp;" . $row['course']."<br><br>";
   }


      mysql_select_db("osa_organization", $conn);
      $result2 = mysql_query("SELECT * from address where member_id = '".$t."' and type = 'Home address' ");
      $row2 = mysql_fetch_array($result2);
       echo "<b>Home Address:</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row2['brgy'].", ".$row2['municipality'].", ".$row2['province'];
       echo "<br>";
         mysql_select_db("osa_organization", $conn);
      $result2 = mysql_query("SELECT * from address where member_id = '".$t."' and type = 'Clsu Address' ");
      $row2 = mysql_fetch_array($result2);
       echo "<b>Address while studying in CLSU:</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row2['brgy'].", ".$row2['municipality'].", ".$row2['province']."";
 echo "<br><b>Parents:</b><br>";
 $result2 = mysql_query("SELECT * from parents where member_id = '".$t."' and type = 'Father' ");
  $row2 = mysql_fetch_array($result2);
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Father:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row2['lastname'].", ".$row2['firstname']."<br>";
 $result2 = mysql_query("SELECT * from parents where member_id = '".$t."' and type = 'Mother' ");
  $row2 = mysql_fetch_array($result2);
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Mother:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row2['lastname'].", ".$row2['firstname']."<br>";
  echo "</div>";
  ?>

</div>
</body>
</html>