<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 
  if(!isset($_SESSION["admin_name"])) {
    header("location: ".ADMURL."/admins/login-admins.php");
  }

  $products = $conn->query("SELECT * FROM products");
	$products->execute();
	$allProducts = $products->fetchAll(PDO::FETCH_OBJ);
?>
          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Foods</h5>
              <a  href="create-products.html" class="btn btn-primary mb-4 text-center float-right">Create Products</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Type</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allProducts as $product) : ?>
                    <tr>
                      <th scope="row"><?php echo $product->id?></th>
                      <td><?php echo $product->name?></td>
                      <td>$<?php echo $product->price?></td>
                      <td><?php echo $product->type?></td>
                      <td><a href="delete-products.html" class="btn btn-danger  text-center ">delete</a></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
          <?php require "../layouts/footer.php"; ?>