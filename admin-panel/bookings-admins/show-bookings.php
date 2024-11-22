<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 
  if(!isset($_SESSION["admin_name"])) {
    header("location: ".ADMURL."/admins/login-admins.php");
  }

  $bookings = $conn->query("SELECT * FROM bookings");
	$bookings->execute();
	$allBookings = $bookings->fetchAll(PDO::FETCH_OBJ);
?>
          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Bookings</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Message</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created at</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allBookings as $booking) : ?>
                    <tr>
                      <th scope="row"><?php echo $booking->id?></th>
                      <td><?php echo $booking->first_name?></td>
                      <td><?php echo $booking->last_name?></td>
                      <td><?php echo $booking->date?></td>
                      <td><?php echo $booking->time?></td>
                      <td><?php echo $booking->phone?></td>
                      <td><?php echo $booking->message?></td>
                      <td><?php echo $booking->status?></td>
                      <td><?php echo $booking->created_at?></td>
                      <td><a href="delete-bookings.html" class="btn btn-danger  text-center ">delete</a></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
          <?php require "../layouts/footer.php"; ?>