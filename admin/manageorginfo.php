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

  
 

<div class="container">
  <h1 style="text-align:center;"> Manage Organization Information</h1>
  
 
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
  <tr><td>Category</td><td>
  <select name="category" class="form-control" id="category" onload="showOrg(sy.value,category.value)"  onchange="showOrg(sy.value,category.value)">
  <option value="">-----</option>
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


 <tr><td><a href="addorg.php"><input type="button" class="form-control" value=" Add Organization"></a></td></tr>
  </table>			
 
	<div id="txtHint"></div>


				
		

						 
  <div id="footer">
Copyright &copy; 2013
</div>
  
  
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
