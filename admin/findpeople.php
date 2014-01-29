<?php
$q=$_GET["q"];
$r=$_GET["r"];
$s=$_GET["s"];
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

 ?><?php 
  
echo "<form method ='post' action='renewed.php'  enctype='multipart/form-data'>";
echo "<table>";
echo "<tr><td>Renew to this School Year:</td>";
echo "<td><select name='rsy' id='rsy'><option value=''>---</option>";
$date = date('Y/m/d h:i:s a', time());
	 mysql_select_db("osa_organization", $con);
			$result = mysql_query("SELECT YEAR('$date') as yr");
			$row = mysql_fetch_array($result);
			$scy = $row['yr'];
			echo '<option value="',$scy,'-',$scy+1,'">',$scy,'-',$scy+1,'</option>';
echo "</select>";

echo "</td></tr>";
echo "<tr><td>Date Filed:</td><td><input  type='date' name='rdate'id='inputField'></td></tr>";
 
 echo "<tr></tr>
  <tr></tr>
   <tr></tr>
  <tr></tr>
   <tr></tr>
  <tr></tr>
  <tr></tr>
  <tr></tr>
   <tr></tr>
  <tr></tr>
   <tr></tr>
  <tr></tr>
  <tr></tr>
  <tr></tr>
   <tr></tr>
  <tr></tr>
   <tr></tr>
  <tr></tr>
  <tr></tr>
  <tr></tr>";
  echo "</table >";
mysqli_select_db($con,"osa_organization");
$sql="SELECT organization.*,category.*,renewal.*,member_has_organization.*, member.* FROM organization inner join category,renewal,member,member_has_organization WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and member_has_organization.renew_id=renewal.renew_id and member_has_organization.member_id=member.member_id" ;

$result = mysqli_query($con,$sql);







	 
echo "<table border='0' class='resulta'>
<tr>
<th>Renew</th>
<th>Members' Name</th>
<th>Position</th>
<th>Course</th>
<th>Year Level</th>
</tr>";


while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>"."<input type='checkbox' name='chkMem[]' value='".$row['member_id']."'>"."</td>";
  echo "<td>" . $row['lastname'].", ". $row['firstname']." ".$row['mi']."."."</td>";
  echo "<td><input type='text' name='pos[]' value='" . $row['position']."'></td>";
  echo "<td><input type='text' name='course[]' value='" . $row['course']."'></td>";
  echo "<td><input type='text' name='year[]' value='" . $row['year']."'></td>";
  echo "</tr>";
  }

echo "</table><br><br>";

$sql="SELECT organization.*,category.*,renewal.*,organization_has_adviser.*, adviser.* FROM organization inner join category,renewal,adviser,organization_has_adviser WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and organization_has_adviser.renew_id=renewal.renew_id and organization_has_adviser.adviser_id=adviser.adviser_id" ;
$result = mysqli_query($con,$sql);

echo "<table border='0' class='resulta'>
<tr>
<th>Renew</th>
<th>Advisers' Name</th>
<th>Position</th>
<th>Status of Appointment</th>
<th>Years of Service</th>
<th>Civil Status</th>
</tr>";
$i=0;
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<input type='hidden' name='org' value='".$row['org_no']."'>";
  echo "<td>"."<input type='checkbox' name='chkAdv[".$i."]' value='".$row['adviser_id']."'>"."</td>";
   echo "<td>" . $row['lastname'].", ". $row['firstname']." ".$row['mi']."."."</td>";
	echo "<td><input type='text' name='advposition[".$i."]' value='" . $row['position']."'></td>";
	echo "<td><input type='text' name='advstatus[".$i."]' value='" . $row['status_of_appointment']."'></td>";
	echo "<td><input type='text' name='advservice[".$i."]' value='" . $row['years_of_service']."'></td>";
	echo "<td><input type='text' name='advcivil[".$i."]' value='" . $row['civil_status']."'></td>";
  echo "</tr>";
  $i=$i+1;
  }
echo "</table>";

echo "<input type='submit' name='submit' value='Submit'>";
echo "</form>";

mysqli_close($con);
?>