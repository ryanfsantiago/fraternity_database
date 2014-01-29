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

  
 

<div id="container">
  <h1 style="text-align:center;"> News</h1>
  <button><a href="addnews.php">Add news</a></button>
  <table class="table">
    <tr>
      <th>Title</th>
      <th>Date</th>
      <th></th>
      <th></th>
    </tr>
    <?php
      mysql_select_db("osa_organization", $con);
      $result = mysql_query("SELECT * FROM news");
      
      while($row = mysql_fetch_array($result))
      { ?>  
             <tr> <td>
        <?php echo $row['title']?>
        </td>
        <td>
        <?php echo $row['date']?>
        </td>
         <td>
      <?php echo "<a href='editnews.php?nid=".$row['id']."'>Edit</a>"?>
        </td>
         <td>
        <?php echo "<a href='deletenews.php?nid=".$row['id']."'>Delete</a>"?>
        </td>
      </tr>
    <?php } ?>
    <tr>
    </tr>
  </table>
 </div>
</body>
</html>
