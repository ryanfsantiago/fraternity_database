<?php
include_once("header.php");
$category = $_GET['category'];
?>


<div class="container">
<h1>Recognized SOs</h1>
 <table style="width:300px;">	
  <tr><td>School Year</td><td>
  <select name="sy" id="sy" class="form-control" onload="showOrg(sy.value,category.value)"  onchange="showOrg(sy.value,category.value)">
  <option selected="selected" value="">------</option>
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
  <input type="hidden" name="category" id="category"value="<?php echo $category?>">
</table>
 
	<div id="txtHint"></div>


</div>
<div id="footer">
<center>Copyright &copy; 2013</center>
</div>
<script>
function showOrg(str,str2)
{
if (str==""&&str2=="")
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
xmlhttp.open("GET","findorg.php?q="+str+"&r="+str2,true);
xmlhttp.send();
}
</script>
</body>
</html>