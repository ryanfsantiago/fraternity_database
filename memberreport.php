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
<link rel="stylesheet" type="text/css" href="admin/dist/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="admin/dist/css/bootstrap-min.css" />
<script src="jquery-1.10.2.min.js"></script>
<script src="admin/dist/js/bootstrap.js"></script>
<style type="text/css" media="print" >
           .btn{display:none;} /*class for the div or any element we do not want to print*/

   @media print {
  a[href]:after {
    content: none !important;
  }
}
</style>
<title>Roster of Members</title>
</head>
<?php
 $q=$_GET["q"];
$r=$_GET["r"];
$s=$_GET["s"];
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
<div class="container">
<form>
<p style="text-align:center"><img src="so.png" width="75%" height="40%" ></p>
<h2 style="text-align:center">Roster of Members</h2>
<p style="text-align:center">Organization:&nbsp;<b><?php echo $name?></b>
</p>

<table class="table table-bordered">
  <tr>
    <th >Name</th>
    <th >Position</th>
  <th >Current Year</th>
  <th>Contact Number</th>
  <th>CLSU/Home Address</th>
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
$sql="SELECT organization.*,category.*,renewal.*,member_has_organization.*, member.*,position.* FROM organization inner join category,renewal,member,member_has_organization,position WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and member_has_organization.renew_id=renewal.renew_id and member_has_organization.member_id=member.member_id and member_has_organization.pos_id=position.pos_id ORDER BY position.pos_id" ;

$result = mysqli_query($con,$sql);
  while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td><a href='form6.php?q=".$q."&r=".$r."&s=".$s."&t=".$row['member_id']."'>" . $row['lastname'] .", ".$row['firstname']."</a></td>";
  echo "<td>" . $row['pos_name'] . "</td>";
 echo "<td>" . $row['year'] . "</td>";
  echo "<td>".$row['contact_no']."</td>";
      
      $result2 = mysql_query("SELECT * from address where member_id = '".$row['member_id']."' and type = 'Home address' ");
      $row2 = mysql_fetch_array($result2);
  echo "<td>".$row2['brgy'].", ".$row2['municipality'].", ".$row2['province']."/";
  $result2 = mysql_query("SELECT * from address where member_id = '".$row['member_id']."' and type = 'Clsu Address' ");
      $row2 = mysql_fetch_array($result2);
      echo "<br>".$row2['brgy'].", ".$row2['municipality'].", ".$row2['province']."</td>";
echo "</tr>";}
  ?>

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
  while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td><a href='form12.php?q=". $row['schoolyear']."&r=".$row['cat_id']."&s=".$row['renew_id']."&t=".$row['adviser_id']."'>" . $row['lastname'] .", ".$row['firstname']."</a></td>";
  echo "<td>" . "Adviser" . "</td>";
   echo "<td>" . "Professor" . "</td>";
   echo "<td>" . $row['contact_no'] . "</td>";
   echo "<td>".$row['address']."</td>";
echo "</tr>";}
  ?>
</table>
</form>
</div>
</body>
</html>