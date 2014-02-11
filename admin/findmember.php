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

echo "<table border='1'>
<tr>
<th>Members' Name</th>
<th>Course</th>
<th>Position</th>
<th>Option</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['lastname'] .", ".$row['firstname']."</td>";
  echo "<td>" . $row['course'] . "</td>";
  echo "<td>" . $row['pos_name'] . "</td>";
  echo "<td>"."<a href='form6.php?q=". $row['schoolyear']."&r=".$row['cat_id']."&s=".$row['renew_id']."&t=".$row['member_id']."'>Form 6</a>"."</td>";
  echo "<td>"."<a href ='editmember.php?q=". $row['schoolyear']."&r=".$row['cat_id']."&s=".$row['renew_id']."&t=".$row['member_id']."'><img src='images/icons/edit.png' alt='' title='EDIT' />"."
  "."</a><a href ='deletemember.php?id=". $row['renew_id']."&rid=".$row['member_id']."'><img src='images/icons/del.png' alt='' title='DELETE' />"."</a></td>";	
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>