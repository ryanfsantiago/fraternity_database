<?php
include_once("header.php");
?>


<div class="container">

 <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class=""></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item">
		<img src="images/1.jpg" width="100%" height="1%">
          <div class="container">
            <div class="carousel-caption">
              <h1>Activities</h1>
              
            </div>
          </div>
        </div>
        <div class="item">
         <img src="images/2.jpg" width="100%" height="1%">
          <div class="container">
            <div class="carousel-caption">
              <h1></h1>
              
            </div>
          </div>
        </div>
        <div class="item active">
         <img src="images/3.jpg" width="100%" height="1%">
          <div class="container">
            <div class="carousel-caption">
              <h1></h1>
              
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="http://getbootstrap.com/examples/carousel/#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="http://getbootstrap.com/examples/carousel/#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->




	<div class="row">
		<div class="col-md-6">
			<h3><a href="#">News</a></h3>
			<?php
    
      mysql_select_db("osa_organization", $conn);
      $result = mysql_query("SELECT * from news LIMIT 5");
      
      while($row = mysql_fetch_array($result))
      { ?>  
             <li><a href='news.php?nid=<?php echo $row['id']?>'>
        <?php echo $row['title']?></a>
        </li>
    <?php } ?>
		</div>
		
		<div class="col-md-6">
			<h3><a href="#">Activities</a></h3>
			<ul>
			<?php
       $date = date('Y/m/d h:i:s a', time());
			mysql_select_db("osa_organization", $conn);
			$result = mysql_query("SELECT * from activity LIMIT 5");
			
			while($row = mysql_fetch_array($result))
			{ ?>  
             <li><a>
				<?php echo $row['title']?></a>
				</li>
		<?php } ?>
			</ul>
		</div>
	</div>
</div>
<div class="footer">
<center>Copyright &copy; 2013</center>
</div>
</body>
</html>









