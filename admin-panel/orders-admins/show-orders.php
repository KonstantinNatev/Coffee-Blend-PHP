<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 
  if(!isset($_SESSION["admin_name"])) {
    header("location: ".ADMURL."/admins/login-admins.php");
  }

  $orders = $conn->query("SELECT * FROM orders");
	$orders->execute();
	$allOrders = $orders->fetchAll(PDO::FETCH_OBJ);
?>
          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Orders</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Post code</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Street Address</th>
                    <th scope="col">Total price</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allOrders as $order) : ?>
                    <tr>
                      <th scope="row"><?php echo $order->id?></th>
                      <td><?php echo $order->first_name?></td>
                      <td><?php echo $order->last_name?></td>
                      <td> <?php echo $order->city?></td>
                      <td> <?php echo $order->state?></td>
                      <td>
                        <?php echo $order->post_code?>
                      </td>
                      <td><?php echo $order->phone_number?></td>
                      <td><?php echo $order->address?></td>
                      <td>$<?php echo $order->total_price?></td>
  
                      <td><?php echo $order->status?></td>
                      <td><a href="delete-orders.html" class="btn btn-danger  text-center ">delete</a></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
          <?php require "../layouts/footer.php"; ?>