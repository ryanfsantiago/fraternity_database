<?php
include_once("header.php");
?>


<!--ORGANIZATION-->
<div id="">
<h1>Activities</h1>
<form>
<table>
<tr><td>School Year</td><td><select name="sy" id="sy" onchange="showOrg(sy.value,category.value)">
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
  <tr><td>Category</td><td><select name="category" id="category" onchange="showOrg(sy.value,category.value)">
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
 <select name="org" id="org" onchange="showActivity(sy.value,category.value,org.value)">
  <option value="" >------</option>
  </select><br />
 </td></tr>
  <tr><td> <a href="addact.php"><input  type="button" value="add activity"></a></td></tr>
</table>
</form>
<div id="txtHint"></div>



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
function showActivity(str,str2,str3)
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
xmlhttp.open("GET","findactivity.php?q="+str+"&r="+str2+"&s="+str3,true);
xmlhttp.send();
}
</script>
</body>
</html>
