<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pizza - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
		      <a class="navbar-brand" href="index.html"><span class="flaticon-pizza-1 mr-1"></span>Friends Food<br><small>Delicious</small></a>
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="oi oi-menu"></span> Menu
		      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item "><a href="index.html" class="nav-link">Accueil</a></li>
	          <li class="nav-item active"><a href="menu.php" class="nav-link">Menu</a></li>
						<li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
						<li class="nav-item"><a href="" class="nav-link">Mon panier</a></li>
	        </ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->

    <section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">

      <div class="slider-item" style="background-image: url(img/home1.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Our Menu</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span></p>
            </div>

          </div>
        </div>
      </div>
		</section>
		<?php
									require 'admin/database.php';
									echo '
		<section class="ftco-menu">

				<div class="container-fluid">
					<div class="row d-md-flex">
						
						<div class="container">
	
						
						<div class="col-lg-8 ftco-animate p-md-5">
								
							<div class="row">
								
								<div class="col-md-12 nav-link-wrap mb-5 d-flex align-items-center">
									
									<div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">';
									$db=Database::connect();
									$statement = $db->query('SELECT * FROM Categories');
									$categories = $statement->fetchAll();
									foreach($categories as $category)
									{
											if($category['IdCategorie']== '2')
											echo '<a class="nav-link active" id="' .$category['Nom']. '" data-toggle="pill" href="#' .$category['IdCategorie']. '" role="tab" aria-controls="' .$category['IdCategorie']. '" aria-selected="true">' .$category['Nom']. ' </a>';
											else       
											echo '<a class="nav-link" id="' .$category['Nom']. '" data-toggle="pill" href="#' .$category['IdCategorie']. '" role="tab" aria-controls="' .$category['IdCategorie']. '" aria-selected="true">' .$category['Nom']. ' </a>';
									}
										
	              echo '
									</div>
									
								</div>';
									
								echo '
								<div class="col-md-12 d-flex align-items-center">
									
									<div class="tab-content ftco-animate" id="v-pills-tabContent">';
									foreach($categories as $category)
									{
											
										if($category['IdCategorie']== '2'){
											echo '<div class="tab-pane fade show active" id="' .$category['IdCategorie']. '" role="tabpanel" aria-labelledby="' .$category['IdCategorie']. '-tab">
											<div class="row">';
											$statement = $db->prepare('SELECT *FROM items WHERE items.Category = ?');
											$statement->execute(array($category['IdCategorie']));
											while($item =$statement->fetch())
											{
												echo '
												<div class="col-md-4 text-center">
													<div class="menu-wrap">
														<a href="#" class="menu-img img mb-4" style="background-image: url(images/burger-1.jpg);"></a>
														<div class="text">
															<h3><a href="#">' .$item['Nom']. '</a></h3>
															<p>' .$item['Description']. '</p>
															<p class="price"><span>'. number_format($item['Prix'], 2, '.', ''). '€</span></p>';
															
															
															echo '<a class="btn btn-default" href="ajouterpanier.php?id=' .$item['IdItems'].'"><span class= glyphicon glyphicon-eye-open"> </span> Voir</a>';
														echo '</div>
													</div>
												</div>';
											}
											echo '</div>
											</div>';
										}
										else{
											echo '<div class="tab-pane fade show " id="' .$category['IdCategorie']. '" role="tabpanel" aria-labelledby="' .$category['IdCategorie']. '-tab">
											<div class="row">';
											$statement = $db->prepare('SELECT *FROM items WHERE items.Category = ?');
											$statement->execute(array($category['IdCategorie']));
											while($item =$statement->fetch())
											{
												echo '
												<div class="col-md-4 text-center">
													<div class="menu-wrap">
														<a href="#" class="menu-img img mb-4" style="background-image: url(images/burger-1.jpg);"></a>
														<div class="text">
															<h3><a href="#">' .$item['Nom']. '</a></h3>
															<p>' .$item['Description']. '</p>
															<p class="price"><span>'. number_format($item['Prix'], 2, '.', ''). '€</span></p>
															<p><a href="#" class="btn btn-white btn-outline-white">Ajouter Panier</a></p>
														</div>
													</div>
												</div>';
											}
											echo '</div>
											</div>';

										}
										}
										
				echo '</div>
			
												</div>
												</div>
									
						
						</div>
					
					</div>';
					echo'
					<div class="row">
							<div class="col-lg-12">
									<div class="card" style="width: 18rem;">
											<div class="card-header">
												Panier
											</div>
											<ul class="list-group list-group-flush">';
											$statement = $db->query('SELECT Panier1.IdPanier, Panier1.Nom, Panier1.Prix
             FROM Panier1 
             ORDER BY Panier1.IdPanier');

             while($item = $statement->fetch())
             {
							echo  '<li class="list-group-item">' . $item['Nom'].'
							<br> ' . $item['Prix'].'
							</li>';
							  
							
             }
										
										echo '	</ul>
										</div>
							</div>
							
						</div>
				</div>
				</div>
			</section>';
			Database::disconnect();
			?>
		<!--formule salade et burger-->
		<section class="ftco-section">
		

    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Nos Formules</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
			</div>
			
    	<div class="container-wrap">
    		<div class="row no-gutters d-flex">

    			

					<div class="container">

							<div class="col-lg-12">
									<div class="services-wrap d-flex">
										<a href="#" class="img order-lg-last" style="background-image: url(img/formule-burger.jpg);"></a>
										<div class="text p-4">
											<h3 id="formules">Formule Burger</h3>
											<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</br></br></p>
											<p class="price"><span>$15.00</span></br></br>
												
												<!-- Button trigger modal -->
												<a href="formuleBurger.html" class="nav-link"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" >
														Ajouter
												</button></a>

												<!-- Modal -->
												<div class="modal fade"  id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<p><i class="fa fa-kichen color-main"></i>Personalisez votre menu</p>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body"  >
																		<label>Choisir une entrée</label>
																		<select class="form-control" >
																			<option>Salade César</option>
																			<option>Salade Printemps</option>
																		</select>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<button type="button" class="btn btn-primary">Save changes</button>
															</div>
														</div>
													</div>
												</div>
										</div></p>
										
									</div>
								</br>
								</div>
			
								<div class="col-lg-12">
									<div class="services-wrap d-flex">
										<a href="#" class="img order-lg-last" style="background-image: url(img/salade1.jpg);"></a>
										<div class="text p-4">
											<h3>Formule Salade</h3>
											<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia </br></br></p>
											<p class="price"><span>$15.00</span></br></br>
												<a href="formuleSalade.html" class="nav-link"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
													Ajouter
												</button></a>

												<!-- Modal -->
												<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																...
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<button type="button" class="btn btn-primary">Save changes</button>
															</div>
														</div>
													</div>
												</div>	
											</p>
										</div>
									</div>
								</div>

					</div>
    			
					
    			<!--
    			<div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="#" class="img order-lg-last" style="background-image: url(images/pizza-6.jpg);"></a>
    					<div class="text p-4">
    						<h3>Margherita</h3>
    						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
    						<p class="price"><span>$2.90</span> <a href="#" class="ml-2 btn btn-white btn-outline-white">Order</a></p>
    					</div>
    				</div>
					</div>-->

					<!--PANIER-->
					
				
			</div>
			

			<!--prix-->
    	<div class="container">

    		<div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Our Menu Pricing</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
				</div>
				
        <div class="row">
        	<div class="col-md-6">
						
						<div class="pricing-entry d-flex ftco-animate">
							<div class="img" style="background-image: url(img/cheeseburger.jpg);"></div>
								<div class="desc pl-3">
									<div class="d-flex text align-items-center">
										<h3><span>Cheese Burger</span></h3>
										<span class="price">$20.00</span>
									</div>
									<div class="d-block">
										<p>A small river named Duden flows by their place and supplies</p>
									</div>
							</div>
						</div>
	
        		<div class="pricing-entry d-flex ftco-animate">
							<div class="img" style="background-image: url(img/burger4.jpg);"></div>
								<div class="desc pl-3">
									<div class="d-flex text align-items-center">
										<h3><span>Burger</span></h3>
										<span class="price">$20.00</span>
									</div>
									<div class="d-block">
										<p>A small river named Duden flows by their place and supplies</p>
									</div>
								</div>
						</div>	

        		<div class="pricing-entry d-flex ftco-animate">
							<div class="img" style="background-image: url(img/chicken.jpg);"></div>
								<div class="desc pl-3">
									<div class="d-flex text align-items-center">
										<h3><span>Fried Chicken</span></h3>
										<span class="price">$20.00</span>
									</div>
									<div class="d-block">
										<p>A small river named Duden flows by their place and supplies</p>
									</div>
								</div>
						</div>	

        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(img/salade4.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Salade César</span></h3>
	        				<span class="price">$20.00</span>
	        			</div>
	        			<div class="d-block">
	        				<p>A small river named Duden flows by their place and supplies</p>
	        			</div>
        			</div>
						</div>
						
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(img/saladeprintemps.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Salade Printemps</span></h3>
	        				<span class="price">$29.00</span>
	        			</div>
	        			<div class="d-block">
	        				<p>A small river named Duden flows by their place and supplies</p>
	        			</div>
	        		</div>
						</div>

        	</div>

        	<div class="col-md-6">

        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(img/meringues.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Meringues</span></h3>
	        				<span class="price">$49.91</span>
	        			</div>
	        			<div class="d-block">
	        				<p>A small river named Duden flows by their place and supplies</p>
	        			</div>
	        		</div>
						</div>
						
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(img/cake.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Bakes and Cakes</span></h3>
	        				<span class="price">$20.00</span>
	        			</div>
	        			<div class="d-block">
	        				<p>A small river named Duden flows by their place and supplies</p>
	        			</div>
	        		</div>
						</div>
								
        		<div class="pricing-entry d-flex ftco-animate">
							<div class="img" style="background-image: url(img/soda.jpg);"></div>
							<div class="desc pl-3">
								<div class="d-flex text align-items-center">
									<h3><span>Sodas</span></h3>
									<span class="price">$20.00</span>
								</div>
								<div class="d-block">
									<p>A small river named Duden flows by their place and supplies</p>
								</div>
							</div>
						</div>

        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(img/bieres.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Bières</span></h3>
	        				<span class="price">$20.00</span>
	        			</div>
	        			<div class="d-block">
	        				<p>A small river named Duden flows by their place and supplies</p>
	        			</div>
	        		</div>
						</div>
						
        	</div>
        </div>
    	</div>
    </section>

		<!-- Acheter un seul -->
    

    <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Social Media</h2>
              <p>Abonnez-vous et suivez-nous sur tous nos réseaux sociaux.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">À consommer sur place</a></li>
                <li><a href="#" class="py-2 d-block">À emporter</a></li>
                <li><a href="#" class="py-2 d-block">Livraison</a></li>
                <li><a href="#" class="py-2 d-block">Réservation</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Des questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">43 Rue de Sainte-Anne <br> 87000 Limoges.</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">(+33) 06 56 34 65 42</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@friendsfood.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>