<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php 

	if(isset($_GET["id"])) {
		$id = $_GET["id"];
		$user_id = $_SESSION["user_id"];

		// data for single product
		$product = $conn->query("SELECT * FROM products WHERE id='$id' ");
		$product->execute();

		$singleProduct = $product->fetch(PDO::FETCH_OBJ);

		// data for related products
		$relatedProducts = $conn->query("SELECT * FROM products WHERE type='$singleProduct->type' AND id!='$singleProduct->id' ");
		$relatedProducts->execute();

		$allRelatedProducts = $relatedProducts->fetchAll(PDO::FETCH_OBJ);

		// add to cart
		if(isset($_POST['submit'])) {
			$name = $_POST['name'];
			$description = $_POST['description'];
			$price = $_POST['price'];
			$image = $_POST['image'];
			$quantity = $_POST['quantity'];
			$pro_id = $_POST['pro_id'];
			
			$insert_cart = $conn->prepare("INSERT INTO cart(name, image, price, description, pro_id ,user_id, quantity) VALUES (:name, :image, :price, :description, :pro_id, :user_id, :quantity)");

			$insert_cart->execute([
				":name" => $name,
				":image" => $image,
				":price" => $price,
				":description" => $description,
				":pro_id" => $pro_id,
				":user_id" => $user_id,
				":quantity" => $quantity,
			]);
		}

		// validation for cart
		if(isset($user_id)) {
			$validateCart = $conn->query(" SELECT * FROM cart WHERE pro_id='$id' AND user_id='$user_id' ");
			$validateCart->execute();

			$rowCount = $validateCart->rowCount();
		}
	}
?>

<section class="home-slider owl-carousel">

  <div class="slider-item" style="background-image: url(<?php echo APPURL?>images/bg_3.jpg);" data-stellar-background-ratio="0.5">
  	<div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
        	<h1 class="mb-3 mt-5 bread">Product Detail</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Product Detail</span></p>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-5 ftco-animate">
				<a href="images/menu-2.jpg" class="image-popup"><img src="<?php echo APPURL; ?>/images/<?php echo $singleProduct->image; ?>" class="img-fluid" alt="Colorlib Template"></a>
			</div>
			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<h3><?php echo $singleProduct->name; ?></h3>
				<p class="price"><span><?php echo $singleProduct->price; ?></span></p>
				<p><?php echo $singleProduct->description; ?></p>
				<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
				<div class="row mt-4">
					<div class="col-md-6">
						<div class="form-group d-flex">
		              <div class="select-wrap">
	                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                  <select name="" id="" class="form-control">
	                  	<option value="">Small</option>
	                    <option value="">Medium</option>
	                    <option value="">Large</option>
	                    <option value="">Extra Large</option>
	                  </select>
	                </div>
		            </div>
					</div>
					<form method="POST" action="product-single.php?id=<?php echo $id; ?> ">		
						<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
								<span class="input-group-btn mr-2">
								<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
								<i class="icon-minus"></i>
								</button>
								</span>
								<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
								<span class="input-group-btn ml-2">
									<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
									<i class="icon-plus"></i>
								</button>
								</span>
							</div>
						</div>
					
						<input name="name" value="<?php echo $singleProduct->name; ?>" type="hidden">
						<input name="image" value="<?php echo $singleProduct->image; ?>" type="hidden">
						<input name="description" value="<?php echo $singleProduct->description; ?>" type="hidden">
						<input name="pro_id" value="<?php echo $singleProduct->id; ?>" type="hidden">
						<input name="price" value="<?php echo $singleProduct->price; ?>" type="hidden">
						<?php if($user_id) :?>
							<?php if($rowCount > 0) : ?>
								<button name="submit" type="submit" class="btn btn-primary py-3 px-5" disabled>Added to Cart</button>
							<?php else: ?>
								<button name="submit" type="submit" class="btn btn-primary py-3 px-5">Add to Cart</button>
							<?php endif; ?>
						<?php endif; ?>
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
			<?php foreach($allRelatedProducts as $allRelatedProduct) : ?>
				<div class="col-md-3">
					<div class="menu-entry">
							<a href="<?php echo APPURL; ?>/products/product-single.php?id=<?php echo $allRelatedProduct->id; ?>" class="img" style="background-image: url(<?php echo APPURL; ?>/images/<?php echo $allRelatedProduct->image; ?>);"></a> <!-- Corrected href attribute -->
							<div class="text text-center pt-4">
								<h3><a href="#"><?php echo $allRelatedProduct->name; ?></a></h3>
								<p><?php echo $allRelatedProduct->description; ?></p>
								<p class="price"><span>$<?php echo $allRelatedProduct->price; ?></span></p>
								<p><a href="<?php echo APPURL; ?>/products/product-single.php?id=<?php echo $allRelatedProduct->id; ?>" class="btn btn-primary btn-outline-primary">Show</a></p>
							</div>
						</div>
				</div>
			<?php endforeach; ?>
        </div>
	</div>
</section>

<?php require "../includes/footer.php"; ?>
