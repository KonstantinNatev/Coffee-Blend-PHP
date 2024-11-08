<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php
	$total_price = $_SESSION["total_price"];

	if(isset($_POST["submit"])) {
		if(
			empty($_POST["first_name"]) OR 
			empty($_POST["last_name"]) OR 
			empty($_POST["state"]) OR
			empty($_POST["address"]) OR
			empty($_POST["city"]) OR
			empty($_POST["post_code"]) OR
			empty($_POST["phone_number"]) OR
			empty($_POST["email"])
		) {
		  echo "<script>alert('one or more inputs are empty')</script>";
		} else {
			$first_name = $_POST["first_name"];
			$last_name = $_POST["last_name"];
			$state = $_POST["state"];
			$address = $_POST["address"];
			$city = $_POST["city"];
			$post_code = $_POST["post_code"];
			$phone_number = $_POST["phone_number"];
			$user_id = $_SESSION["user_id"];
			$status = "Pending";
			$total_price = $total_price;
	  
			$insert = $conn->prepare("INSERT INTO orders (first_name, last_name, state, address, city, post_code, phone_number, user_id, status, total_price) 
			  VALUES (:first_name, :last_name, :state, :address, :city, :post_code, :phone_number, :user_id, :status, :total_price)");
	  
			$insert->execute([
			  ":first_name" => $first_name,
			  ":last_name" => $last_name,
			  ":state" => $state,
			  ":address" => $address,
			  ":city" => $city,
			  ":post_code" => $post_code,
			  ":phone_number" => $phone_number,
			  ":user_id" => $user_id,
			  ":status" => $status,
			  ":total_price" => $total_price,
			]);
	  
			header("location: pay.php");
		  };
	}	
?>

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Checkout</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checout</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
				<form action="checkout.php" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
					<h3 class="mb-4 billing-heading">Billing Details $<?php echo $total_price; ?></h3>
					<div class="row align-items-end">
						<div class="col-md-6">
						<div class="form-group">
							<label for="first_name">Firt Name</label>
						<input name="first_name" type="text" class="form-control" placeholder="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="last_name">Last Name</label>
							<input name="last_name" type="text" class="form-control" placeholder="">
						</div>
					</div>
					<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="country">State / Country</label>
								<div class="select-wrap">
							<div class="icon"><span class="ion-ios-arrow-down"></span></div>
							<select name="state" id="" class="form-control">
								<option value="France">France</option>
								<option value="Italy">Italy</option>
								<option value="Philippines">Philippines</option>
								<option value="Hongkong">Hongkong</option>
								<option value="Japan">Japan</option>
							</select>
							</div>
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="address">Street Address</label>
								<input name="address" type="text" class="form-control" placeholder="House number and street name">
							</div>
						</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="city">Town / City</label>
							<input name="city" type="text" class="form-control" placeholder="">
						</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="post_code">Postcode / ZIP *</label>
							<input name="post_code" type="text" class="form-control" placeholder="">
						</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
						<div class="form-group">
							<label for="phone_number">Phone</label>
							<input name="phone_number" type="text" class="form-control" placeholder="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="email">Email Address</label>
							<input name="email" type="text" class="form-control" placeholder="">
						</div>
					</div>
					<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group mt-4">
								<div class="radio">
									<button type="submit" name="submit" href="#" class="btn btn-primary py-3 px-4">Place an order</button>
								</div>
						</div>
					</div>
	            </div>
	          </form>


<!-- 
	          <div class="row mt-5 pt-3 d-flex">
	          	<div class="col-md-6 d-flex">
	          		<div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
		    						<span>$20.60</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Delivery</span>
		    						<span>$0.00</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Discount</span>
		    						<span>$3.00</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>$17.60</span>
		    					</p>
								</div>
	          	</div>
	          	<div class="col-md-6">
	          		<div class="cart-detail ftco-bg-dark p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
									<p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p>
								</div>
	          	</div>
	          </div> -->
          </div> <!-- .col-md-8 -->

           
          </div>

        </div>
      </div>
    </section>

<?php require "../includes/footer.php"; ?>