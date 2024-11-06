<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php
	$user_id = $_SESSION["user_id"];
	if (!isset($user_id)) {
		header("location: ".APPURL."");
	}

	$products = $conn->query("SELECT * FROM cart WHERE user_id=$user_id ");
	$products->execute();

	$allProducts = $products->fetchAll(PDO::FETCH_OBJ);

	// cart total

	$cartTotal = $conn->query(" SELECT SUM(quantity*price) AS total FROM cart WHERE user_id=$user_id ");
	$cartTotal->execute();

	$allTotal = $cartTotal->fetch(PDO::FETCH_OBJ);

	if (!isset($_POST["checkout"])) {
		$_SESSION["total_price"] = $_POST["total_price"];

		header("location: checkout.php");

	}

?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row slider-text justify-content-center align-items-center">

		<div class="col-md-7 col-sm-12 text-center ftco-animate">
			<h1 class="mb-3 mt-5 bread">Cart</h1>
			<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo APPURL; ?>/">Home</a></span> <span>Cart</span></p>
		</div>

		</div>
	</div>
	</div>
</section>
	
	<section class="ftco-section ftco-cart">
		<div class="container">
			<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="cart-list">
					<table class="table">
						<thead class="thead-primary">
							<tr class="text-center">
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>Product</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($allProducts as $product) : ?>
							<tr class="text-center">
								<td class="product-remove"><a href="delete-product.php?id=<?php echo $product->id; ?>"><span class="icon-close"></span></a></td>
								
								<td class="image-prod"><div class="img" style="background-image:url(<?php echo APPURL; ?>/images/<?php echo $product->image; ?>);"></div></td>
								
								<td class="product-name">
									<h3><?php echo $product->name; ?></h3>
									<p><?php echo $product->description; ?></p>
								</td>
								
								<td class="price">$<?php echo $product->price; ?></td>
								
								<td>
									<div class="input-group mb-3">
										<input disabled type="text" name="quantity" class="quantity form-control input-number" value="<?php echo $product->quantity; ?>" min="1" max="100">
										</div>
								</td>
								
								<td class="total">$<?php echo $product->price * $product->quantity; ?></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
						</table>
					</div>
			</div>
		</div>
		<div class="row justify-content-end">
			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<h3>Cart Totals</h3>
					<p class="d-flex">
						<span>Subtotal</span>
						<span>$<?php echo $allTotal->total; ?></span>
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
						<span>$<?php echo $allTotal->total - 3.00; ?></span>
					</p>
				</div>
				<form action="cart.php" method="POST">
					<input name="total_price" type="hidden" value="<?php echo $allTotal->total - 3.00; ?>" >
					<button name="checkout" type="submit" href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</button>
				</form>
			</div>
		</div>
		</div>
	</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
		<div class="col-md-7 heading-section ftco-animate text-center">
		<span class="subheading">Discover</span>
		<h2 class="mb-4">Related products</h2>
		<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="menu-entry">
					<a href="#" class="img" style="background-image: url(images/menu-1.jpg);"></a>
					<div class="text text-center pt-4">
						<h3><a href="#">Coffee Capuccino</a></h3>
						<p>A small river named Duden flows by their place and supplies</p>
						<p class="price"><span>$5.90</span></p>
						<p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
					</div>
				</div>
		</div>
		<div class="col-md-3">
			<div class="menu-entry">
					<a href="#" class="img" style="background-image: url(images/menu-2.jpg);"></a>
					<div class="text text-center pt-4">
						<h3><a href="#">Coffee Capuccino</a></h3>
						<p>A small river named Duden flows by their place and supplies</p>
						<p class="price"><span>$5.90</span></p>
						<p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
					</div>
				</div>
		</div>
		<div class="col-md-3">
			<div class="menu-entry">
					<a href="#" class="img" style="background-image: url(images/menu-3.jpg);"></a>
					<div class="text text-center pt-4">
						<h3><a href="#">Coffee Capuccino</a></h3>
						<p>A small river named Duden flows by their place and supplies</p>
						<p class="price"><span>$5.90</span></p>
						<p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
					</div>
				</div>
		</div>
		<div class="col-md-3">
			<div class="menu-entry">
					<a href="#" class="img" style="background-image: url(images/menu-4.jpg);"></a>
					<div class="text text-center pt-4">
						<h3><a href="#">Coffee Capuccino</a></h3>
						<p>A small river named Duden flows by their place and supplies</p>
						<p class="price"><span>$5.90</span></p>
						<p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
					</div>
				</div>
		</div>
	</div>
	</div>
</section>

<?php require "../includes/footer.php"; ?>
