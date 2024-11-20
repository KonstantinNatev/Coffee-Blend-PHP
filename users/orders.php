<?php require "../config/config.php"; ?>
<?php require "../includes/header.php"; ?>
<?php 
    $user_id = $_SESSION["user_id"];
    if (!isset($user_id)) {
        header("location: ".APPURL."");
    }

    $orders = $conn->query("SELECT * FROM orders WHERE user_id=$user_id ");
    $orders->execute();

    $allOrders = $orders->fetchAll(PDO::FETCH_OBJ);
?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row slider-text justify-content-center align-items-center">

		<div class="col-md-7 col-sm-12 text-center ftco-animate">
			<h1 class="mb-3 mt-5 bread">Orders</h1>
			<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo APPURL; ?>/">Home</a></span> <span>Orders</span></p>
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
                    <?php if (count($allOrders) > 0) : ?>
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>First name</th>
                                <th>Last name</th>
                                <th>State</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Phone number</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Write Review</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($allOrders as $order) : ?>
                                <tr class="text-center">
                                    <td class="product-remove"><?php echo $order->first_name; ?></td>
                                    <td class="product-remove"><?php echo $order->last_name; ?></td>
                                    <td class="product-remove"><?php echo $order->state; ?></td>
                                    <td class="product-remove"><?php echo $order->address; ?></td>
                                    <td class="product-remove"><?php echo $order->city; ?></td>
                                    <td class="product-remove"><?php echo $order->phone_number; ?></td>
                                    <td class="product-remove"><?php echo $order->total_price; ?></td>
                                    <td class="product-remove"><?php echo $order->status; ?></td>
                                    <?php if($order->status == "Delivered") : ?>
                                        <td class="product-remove">
                                            <a class="btn btn-primary" href="<?php echo APPURL; ?>/reviews/write-review.php">write review</a>
                                        </td>
                                    <?php endif; ?>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else : ?>
                        <p>You do not have any bookings</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require "../includes/footer.php"; ?>
