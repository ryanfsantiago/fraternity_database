<?php
include_once("header.php");
?>
<h1> Roster of Officers and Members </h1>


<?php 
	$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

	 $date = date('Y/m/d h:i:s a', time());
	 
	 echo "<table border='1'>";
	echo "<tr>";
	echo "<th>Name</th>";
	echo "<th>Position</th>";
	echo "<th>Course</th>";
	echo "</tr>";

	 mysqli_select_db($con,"osa_organization");
	 $sql="SELECT * from activity";
	$result = mysqli_query($con,$sql);
	
	while($row = mysqli_fetch_array($result))
	{
	echo "<tr>";
  echo "<td>" . $row['title']."</td>";
  echo "<td>" . $row['date_started'] . "</td>";
  echo "<td>" . $row['venue'] . "</td>";
  echo "<td>" . $row['clientele'] . "</td>";
  echo "</tr>";
	}
	echo "</table>";
  ?>

</body>
</html>