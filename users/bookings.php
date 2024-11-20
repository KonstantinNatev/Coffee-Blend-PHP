<?php require "../config/config.php"; ?>
<?php require "../includes/header.php"; ?>
<?php 
    $user_id = $_SESSION["user_id"];
    if (!isset($user_id)) {
        header("location: ".APPURL."");
    }

    $bookings = $conn->query("SELECT * FROM bookings WHERE user_id=$user_id ");
    $bookings->execute();

    $allBookings = $bookings->fetchAll(PDO::FETCH_OBJ);
?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row slider-text justify-content-center align-items-center">

		<div class="col-md-7 col-sm-12 text-center ftco-animate">
			<h1 class="mb-3 mt-5 bread">Bookings</h1>
			<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo APPURL; ?>/">Home</a></span> <span>Bookings</span></p>
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
                    <?php if (count($allBookings) > 0) : ?>
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Phone number</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Write Review</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($allBookings as $booking) : ?>
                                <tr class="text-center">
                                    <td class="product-remove"><?php echo $booking->first_name; ?></td>
                                    <td class="product-remove"><?php echo $booking->last_name; ?></td>
                                    <td class="product-remove"><?php echo $booking->date; ?></td>
                                    <td class="product-remove"><?php echo $booking->time; ?></td>
                                    <td class="product-remove"><?php echo $booking->phone; ?></td>
                                    <td class="product-remove"><?php echo $booking->message; ?></td>
                                    <td class="product-remove"><?php echo $booking->status; ?></td>
                                    <?php if($booking->status == "Done") : ?>
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
