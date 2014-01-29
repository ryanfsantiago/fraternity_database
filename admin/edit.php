<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Form</title>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css">

</style>
<script src="jquery-2.0.3.min.js"></script>
</head>
<body>
<div id="header">
<img src="head.png" height="60" width="500" />
</div>
<div id="banner">
<img src="banner.png" />
</div>

<div id="allcontent">



  <ul id="vertical-navigation">
  
    <li class="" style="border-left:2px solid gray;border-right:2px solid gray;"> <a href="#">Management of Records</a>
      <ul>
        <li class=""> <a href="#">Organizations</a> </li>
        <li class=""> <a href="#">Advisers</a> </li>
        <li class=""> <a href="#">Members</a> </li>
		        <li class=""> <a href="#">Organization Category</a> </li>
      </ul>
    </li>
    
    <!-- Begin parent item -->
    <li class="" > <a href="#">Transaction</a>
      
      <!-- Begin Child Items Group-->
      <ul>
      
        <!-- Begin Child Item-->
        <li class=""> <a href="#">Renewal</a> </li>
        <li class=""> <a href="#">Activity</a> </li>
        
      </ul>
      <!-- End Child Items Group-->
      
    </li>
    <!-- End parent item -->
    
    <li class=""style="border-left:2px solid gray;border-right:2px solid gray;padding-left:20px;"> <a href="#">Report</a> </li>
 </ul>





<h1>&nbsp;</h1>
<h1>&nbsp;</h1>
<h1>UPDATE </h1>
<h1>
  <hr />
</h1>
<div id="add">
<form method ="POST" action="add_org.php"  enctype="multipart/form-data">	 
		
<table cellpadding="3" cellspacing="10">		

<tr>
	<td>	<label for="org">Organization Name:</label> </td>
	<td>  <input   type="text" name="orgname" id="org" size="50" placeholder="e.g (Builders of Information Technology Society)"/> 
		</td>	 
	
</tr>

<tr>
	<td>     <label for="br">Category:</label>	 </td>
	<td>	 <select >
	<option selected="selected" value="">------</option> 
	</select>

</td>
	
</tr>

			
<tr>
	<td>		<label for="inputField">Date Founded:</label></td>
	<td>		<input  type="date" name="date" id="inputField"></td>
	
</tr>


<tr>			<td><label for="college">Organization  Image:</label> </td>
	<td>		<input  type="file" name="file" id="picture" > </td>	
	
	</tr>
	
	<tr>
<td colspan="2" style="text-align:center;">
<img id="pic" src="images/sample.png" alt="your image" height="90" width="90"/>

<script>
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#pic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#picture").change(function(){
    readURL(this);
});
</script>

</td>


</tr>
	
	
	<tr>
	<td colspan="2" style="text-align:center;">	<input  type="submit" name="submit" value ="SAVE">	</td>			
	</tr>
	
	
	
	</table>		
			</form>
</div>

					
					<br /><br /><br /><br /><br /><br /><br />
					</div>
<div id="footer">
Copyright &copy; 2013
</div>
</body>
</html>
