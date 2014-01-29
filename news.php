<?php
include_once("header.php");
?>

<?php
$nid = $_GET['nid'];
mysql_select_db("osa_organization", $conn);
$result = mysql_query("Select * from news  where id = '$nid'");

	$row=  mysql_fetch_array($result);
    if (!$conn) {
    	die('Could Not Connect:' .mysql_error());
        }
?>


<div class="container">
<h1>News</h1>
<h2><?php echo $row['title'] ?></h2>
<p><?php echo $row['body'] ?></p>
</div>
<div id="footer">
<center>Copyright &copy; 2013</center>
</div>
</body>
</html>