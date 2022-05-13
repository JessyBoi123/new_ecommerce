<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
	 
	<div class="content-wrapper">
	    <div class="container-fluid margin-bottom-for-search" style="background-color: #000024;">


	      <!-- Main content -->
	      <section class="">
	        <div class="container" >
	        	<div class="col-sm-12">
					<div class="text-center">
						<!-- <img src="images/Logo4.png" alt="Rice Next Door Logo">
						<p style="color: #fff;">We specialize in selling quality products.</p>  -->

							<form method="POST" class="" action="search.php">
								<div class="form-group">
									<input type="text" class="form-control " name="keyword" placeholder="Search for Product" required>
									<small class="form-text" style="color: #fff;">If you remember keywords, type here.</small>
								</div>
							</form>
      				</div>
				</div>
			</div>
		</div>
			
	

	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
						if(isset($_SESSION['success'])){
	        				echo "
	        					<div class='alert alert-success'>
	        						".$_SESSION['success']."
	        					</div>
	        				";
	        				unset($_SESSION['success']);
	        			}
	        		?>
	        		<div id="carousel-example-generic" class="carousel slide container" data-ride="carousel">
		                <ol class="carousel-indicators">
		                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
		                </ol>
		                <div class="carousel-inner">
		                  <div class="item active" style="max-height: 300px">
		                    <img src="images/banner_1.jpg" alt="First slide">
		                  </div>
		                  <div class="item" style="max-height: 300px">
		                    <img src="images/banner_2.jpg" alt="Second slide">
		                  </div>
		                  <div class="item" style="max-height: 300px">
		                    <img src="images/banner_3.jpg" alt="Third slide">
		                  </div>
		                </div>
		                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		                  <span class="fa fa-angle-left"></span>
		                </a>
		                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		                  <span class="fa fa-angle-right"></span>
		                </a>
		            </div>
					<div class="container">
		            <h2>Monthly Top Sellers</h2>
		       		<?php
		       			$month = date('m');
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 4;	
						    $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
						    $stmt->execute();
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='col-sm-3'>
	       								<div class='box box-solid round'>
		       								<div class='box-body prod-body'>
		       									<img src='".$image."' width='100%' height='250px' class='thumbnail'>
		       									<h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b>PHP ".number_format($row['price'], 2)."</b>
		       								</div>
	       								</div>
	       							</div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
					</div>
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>