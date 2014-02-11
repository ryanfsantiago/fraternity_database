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
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap-min.css" />
<script src="jquery-1.10.2.min.js"></script>
<script src="dist/js/bootstrap.js"></script>
<style type="text/css" media="print" >
           .btn{display:none;} /*class for the div or any element we do not want to print*/
</style>
<title>Recognition Form</title>
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
document.write('<input type=button class="btn btn-primary" name=print value="Print this page" onClick="window.print()">');
}
</script>
<div class="container">
<form>
<p style="text-align:center"><img src="so.png" width="75%" height="40%" ></p>
<h2 style="text-align:center">SOU Form 1</h2>

<h2>I. Basic Information</h2>
<b>Name of Organization:&nbsp;</b><?php echo $name?><br>

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
$sql="SELECT organization.*,category.*,renewal.*,member_has_organization.*, member.*,position.* FROM organization inner join category,renewal,member,member_has_organization,position WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and member_has_organization.renew_id=renewal.renew_id and member_has_organization.member_id=member.member_id and member_has_organization.pos_id=position.pos_id and position.pos_name='President'ORDER BY position.pos_id" ;

$result = mysqli_query($con,$sql);
 $row = mysqli_fetch_array($result);
    echo "<b>President:</b>&nbsp;".$row['lastname'].", ".$row['firstname']." ".$row['mi'];
    echo "<br>";
    echo "<b>Adviser/s:</b>&nbsp;";

    $sql="SELECT organization.*,category.*,renewal.*,organization_has_adviser.*, adviser.* FROM organization inner join category,renewal,adviser,organization_has_adviser WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and organization_has_adviser.renew_id=renewal.renew_id and organization_has_adviser.adviser_id=adviser.adviser_id" ;
    $result2 = mysqli_query($con,$sql);
    while($row2 = mysqli_fetch_array($result2))
      {echo $row2['lastname'].", ".$row2['firstname']."/";}
      echo "<br><b>Date of Anniversary:</b>&nbsp;".$row['date_estb']."<br>";
        echo "<div style='margin-left:100px'>";
       $sql = "select COUNT(*) as members from member_has_organization inner join member where member_has_organization.member_id = member.member_id and renew_id = ".$s." and gender = 'male'";
       $result2 = mysqli_query($con,$sql);
       $row2 = mysqli_fetch_array($result2);
       echo "No. of Males:&nbsp;".$row2['members']."<br>";

       $sql = "select COUNT(*) as members from member_has_organization inner join member where member_has_organization.member_id = member.member_id and renew_id = ".$s." and gender = 'female'";
       $result2 = mysqli_query($con,$sql);
       $row2 = mysqli_fetch_array($result2);
       echo "No. of Females:&nbsp;".$row2['members']."<br>";


       $sql = "select COUNT(*) as members from member_has_organization inner join member where member_has_organization.member_id = member.member_id and renew_id = ".$s." and year = '2nd' ";
       $result2 = mysqli_query($con,$sql);
       $row2 = mysqli_fetch_array($result2);
       echo "2nd Year:&nbsp;".$row2['members']."<br>";

        $sql = "select COUNT(*) as members from member_has_organization inner join member where member_has_organization.member_id = member.member_id and renew_id = ".$s." and year = '3rd' ";
       $result2 = mysqli_query($con,$sql);
       $row2 = mysqli_fetch_array($result2);
       echo "3rd Year:&nbsp;".$row2['members']."<br>";

        $sql = "select COUNT(*) as members from member_has_organization inner join member where member_has_organization.member_id = member.member_id and renew_id = ".$s." and year = '4th' ";
       $result2 = mysqli_query($con,$sql);
       $row2 = mysqli_fetch_array($result2);
       echo "4th Year:&nbsp;".$row2['members']."<br>";

        $sql = "select COUNT(*) as members from member_has_organization inner join member where member_has_organization.member_id = member.member_id and renew_id = ".$s." and year = '5th' ";
       $result2 = mysqli_query($con,$sql);
       $row2 = mysqli_fetch_array($result2);
       echo "5th Year:&nbsp;".$row2['members']."<br>";

        $sql = "select COUNT(*) as members from member_has_organization inner join member where member_has_organization.member_id = member.member_id and renew_id = ".$s." and year = '6th' ";
       $result2 = mysqli_query($con,$sql);
       $row2 = mysqli_fetch_array($result2);
       echo "6th Year:&nbsp;".$row2['members']."<br>";
        

      $sql = "select COUNT(*) as members from member_has_organization where renew_id = ".$s."";
       $result2 = mysqli_query($con,$sql);
       $row2 = mysqli_fetch_array($result2);
       echo "Total no. of members:&nbsp;".$row2['members']."<br>";
       echo "</div>";
    

    echo "<h2>II. Organizational Objectives</h2>";
    echo $row['description'];    
   echo "<h2>III. Activities Performed</h2>"; ?>
     <table class="table table-bordered">
    <tr>
      <th>Date</th>
      <th >Title of Activity</th>
      <th >Clients</th>
      <th>Type of Activity</th>
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
$sql="SELECT organization.*,category.*,renewal.*,activity.*,activity_has_category.* FROM organization inner join category,renewal,activity, activity_has_category WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and activity.renew_id=renewal.renew_id and activity_has_category.id=activity.act_cat_id" ;

$result = mysqli_query($con,$sql);
  while($row = mysqli_fetch_array($result))
  {
 echo "<tr>";
  echo "<td>" . $row['date_started']."</td>";
  echo "<td>" . $row['title'] . "</td>";
  echo "<td>" . $row['clientele'] . "</td>";
  echo "<td>". $row['name']. "</td>";
echo "</tr>";}
  ?>
  </table>  
</div>
</body>
</html>