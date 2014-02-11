<?php
include_once("header.php");
$sql="select * from about where about_id = 1" ;

$result2 = mysql_query($sql);
		$row2 = mysql_fetch_array($result2);
?>

<h1 style="margin-top:20px;">Edit About  </h1>
<script src="tinymce/js/tinymce/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>
<div class="container">

<form method ="POST" action="abouts.php"  enctype="multipart/form-data" name="form1">	 
		
<textarea name="about" id="about"><?php  echo $row2['content']?></textarea>

<input  type="submit" name="submit" class="btn btn-success" value ="SAVE">
</form>


			
					
					
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
</body>
</html>
