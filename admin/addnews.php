<?php
include_once("header.php");
?>




<div class="container">
<h1 style="margin-top:20px">ADD News  </h1>





<form method ="POST" action="addnewss.php"  enctype="multipart/form-data">	 
		
<table cellpadding="3" cellspacing="10">		
<tr>
	<td colspan="2"><h1>News Information</h1><hr /> </td>
</tr>
<tr>
			
			<td>Activity Title </td>
			
			<td><input   type="text" name="title" placeholder="Mr. aand Ms. CLSU" size="30"/></td> 
		</tr>
					<tr>
		<tr><td>Body</td><td> 
 		<textarea name="body"></textarea>
 </td></tr>
		<tr>
<td>
Date:
</td>		
			<td><input  type="date" name="date" id="inputField2" ></td>
</tr>


				
				
	<tr>
	<td colspan="4" style="text-align:center;">	<input  type="submit" name="submit" class="btn btn-success" value ="SAVE">	</td>			
	</tr>
	
	
	
	</table>		
			</form>
</div>

</div>			
					
				
<div id="footer">
Copyright &copy; 2013
</div>					
</body>
</html>
