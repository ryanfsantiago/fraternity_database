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
      $j = 2010;
      while($j < 2051)
			{echo '<option value="',$j,'-',$j+1,'">',$j,'-',$j+1,'</option>';
        $j = $j +1;}
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
$sql="SELECT organization.*,category.*,renewal.*,member_has_organization.*, member.*,position.* FROM organization inner join category,renewal,member,member_has_organization,position WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and member_has_organization.renew_id=renewal.renew_id and member_has_organization.member_id=member.member_id and position.pos_id=member_has_organization.pos_id order by position.pos_id" ;

$result = mysqli_query($con,$sql);







	 
echo "<table border='0' class='resulta'>
<tr>
<th>Renew</th>
<th>Members' Name</th>
<th>Position</th>
<th>Year Level</th>
</tr>";


while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>"."<input type='checkbox' name='chkMem[]' value='".$row['member_id']."'>"."</td>";
  echo "<td>" . $row['lastname'].", ". $row['firstname']." ".$row['mi']."."."</td>";
  echo "<td><select type='text' name='pos[]'> <option value='" . $row['pos_id']."'>".$row['pos_name']."</option><option value='1'>President</option><option value='2'>Vice President</option><option value='3'>Member</option></select></td>";
  echo "<input type='hidden' name='course[]' value='" . $row['course']."'>";
  echo "<td><select name='year[]' ><option value='" . $row['year']."'>".$row['year']."</option><option value='2nd'>2nd</option><option value='3rd'>3rd</option><option value='4th'>4th</option><option value='5th'>5th</option><option value='6th'>6th</option></select></td>";
  echo "</tr>";
  }

echo "</table><br><br>";

$sql="SELECT organization.*,category.*,renewal.*,organization_has_adviser.*, adviser.* FROM organization inner join category,renewal,adviser,organization_has_adviser WHERE renewal.schoolyear = '".$q."' and organization.cat_id = '".$r."' and renewal.org_no=organization.org_no and organization.cat_id=category.cat_id and renewal.renew_id='".$s."' and organization_has_adviser.renew_id=renewal.renew_id and organization_has_adviser.adviser_id=adviser.adviser_id" ;
$result = mysqli_query($con,$sql);

echo "<table border='0' class='resulta'>
<tr>
<th>Renew</th>
<th>Advisers' Name</th>
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
	echo "<input type='hidden' name='advposition[".$i."]' value='" . $row['position']."'>";
	echo "<td><select name='advstatus[".$i."]'> <option value='" . $row['status_of_appointment']."'>".$row['status_of_appointment']."</option><option value='Permanent'>Permanent</option><option value='Temmporary'>Temmporary</option></select></td>";
	echo "<td><select name='advservice[".$i."]'> <option value='" . $row['years_of_service']."'>".$row['years_of_service']."</option>";
  $j = 1;
  while($j < 51)
    {echo "<option value='".$j."'>".$j."</option>";
      $j=$j+1;}
  echo "</select></td>";
	echo "<td><select name='advcivil[".$i."]' ><option value='" . $row['civil_status']."'>".$row['civil_status']."</option><option value='Single'>Single</option><option value='Married'>Married</option></select></td>";
  echo "</tr>";
  $i=$i+1;
  }
echo "</table>";

echo "<input type='submit' name='submit' value='Submit'>";
echo "</form>";

mysqli_close($con);
?>