<?php
include_once("header.php");
?>
<div class="container">
<?php
$sql= "Select * from about where about_id=1";
$result2 = mysql_query($sql);
$row2 = mysql_fetch_array($result2);
echo $row2['content'];?>
</div>

<div id="footer">
<center>Copyright &copy; 2013</center>
</div>
</body>
</html>