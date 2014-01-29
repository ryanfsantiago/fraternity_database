<?php
include_once("header.php");
?>


<div class="container">
<h1>Recognized SOs</h1>
<p>School year:&nbsp;2012-2013</p>
<h2>College-based Organizations</h2>
<ul>
<?php
mysql_select_db("osa_organization", $conn);
$result = mysql_query("SELECT organization . * , category . * , renewal . * FROM organization
INNER JOIN category, renewal
WHERE renewal.schoolyear =  '2012-2013'
AND renewal.org_no = organization.org_no
AND organization.cat_id = category.cat_id
AND organization.cat_id =  '1'");
			
			while($row = mysql_fetch_array($result))
			{ ?>  
              <li>
				<?php echo $row['name']?>
				</li>
		<?php } ?>
</ul>
<h2>Non-College-based Organizations</h2>
<ul>
<?php
mysql_select_db("osa_organization", $conn);
$result = mysql_query("SELECT organization . * , category . * , renewal . * FROM organization
INNER JOIN category, renewal
WHERE renewal.schoolyear =  '2012-2013'
AND renewal.org_no = organization.org_no
AND organization.cat_id = category.cat_id
AND organization.cat_id =  '2'");
			
			while($row = mysql_fetch_array($result))
			{ ?>  
              <li>
				<?php echo $row['name']?>
				</li>
		<?php } ?>
</ul>
<h2>Fraternities/Sororities</h2>
<ul>
<?php
mysql_select_db("osa_organization", $conn);
$result = mysql_query("SELECT organization . * , category . * , renewal . * FROM organization
INNER JOIN category, renewal
WHERE renewal.schoolyear =  '2012-2013'
AND renewal.org_no = organization.org_no
AND organization.cat_id = category.cat_id
AND organization.cat_id =  '3'");
			
			while($row = mysql_fetch_array($result))
			{ ?>  
              <li>
				<?php echo $row['name']?>
				</li>
		<?php } ?>
</ul>
<h2>Campus Ministries</h2>
<ul>
<?php
mysql_select_db("osa_organization", $conn);
$result = mysql_query("SELECT organization . * , category . * , renewal . * FROM organization
INNER JOIN category, renewal
WHERE renewal.schoolyear =  '2012-2013'
AND renewal.org_no = organization.org_no
AND organization.cat_id = category.cat_id
AND organization.cat_id =  '4'");
			
			while($row = mysql_fetch_array($result))
			{ ?>  
              <li>
				<?php echo $row['name']?>
				</li>
		<?php } ?>
</ul>
</div>
<div id="footer">
<center>Copyright &copy; 2013</center>
</div>
</body>
</html>