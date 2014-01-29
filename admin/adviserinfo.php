<?php
	$con = mysql_connect("localhost","root","");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	  mysql_select_db("osa_organization", $con);

?>

<?php
include_once("header.php");
?>

  
 

<div id="content">
  <h1 style="text-align:center;"> Manage Adviser Information</h1>
  <form>

  <table style="width:300px;">
 <tr><td>School Year</td><td><select name="sy" id="sy" onload="showOrg(sy.value,category.value)"  onchange="showOrg(sy.value,category.value)">
   <option value="">---</option>
  <?php
			mysql_select_db("osa_organization", $con);
			$result = mysql_query("SELECT distinct schoolyear FROM renewal");
			
			while($row = mysql_fetch_array($result))
			{ ?>  
              <option value="<?php echo $row['schoolyear']?>">
				<?php echo $row['schoolyear']?>
				</option>
		<?php } ?>
  </select><br />
 </td> </tr>  
  <tr><td>Category</td><td><select name="category" id="category" onload="showOrg(sy.value,category.value)"  onchange="showOrg(sy.value,category.value)">
  <option value="">---</option>
<?php
			mysql_select_db("osa_organization", $con);
			$result = mysql_query("SELECT * FROM category");
			
			while($row = mysql_fetch_array($result))
			{ ?>  
              <option value="<?php echo $row['cat_id']?>">
				<?php echo $row['category_name']?>
				</option>
		<?php } ?>
  </select><br />
 </td> </tr>
 <tr><td>Organization</td><td>
 <select id="org" name="org" onchange="showAdviser(sy.value,category.value,org.value)">
  <option  value="">------</option>
  </select><br />
 </td> </tr>
  
 		</table>	

<tr><td><a href="addadviser.php"><input type="button" value=" Add Adviser"></a></td></tr>		
			  
		
</form>
				<div id="txtHint"></div>		 
  
  
  
  
  
  
				</div>		
					</div>
<div id="footer">
Copyright &copy; 2013
</div>
<script>
function showOrg(str,str2)
{
if (str==""&&str2=="")
  {
  document.getElementById("org").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("org").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","filterorg.php?q="+str+"&r="+str2,true);
xmlhttp.send();
}
</script>
<script>
function showAdviser(str,str2,str3)
{
if (str==""&&str2==""&&str3=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","findadviser.php?q="+str+"&r="+str2+"&s="+str3,true);
xmlhttp.send();
}
</script>
</body>
</html>
