<?php require "../layouts/headers.php"; ?>
<?php require "../../config/config.php"; ?>

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
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th scope="col">price</th>
                    <th scope="col">type</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                     <th scope="row">1</th>
                     <td>Pizza</td>
                     <td>image</td>
                     <td>$1300</td>
                     <td>drink</td>
                     <td><a href="delete-products.html" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Pizza</td>
                    <td>image</td>
                    <td>$1300</td>
                    <td>drink</td>
                     <td><a href="delete-products.html" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Pizza</td>
                    <td>image</td>
                    <td>$1300</td>
                    <td>drink</td>
                     <td><a href="delete-products.html" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                </tbody>
              </table> 
            </div>
          </div>
          <?php require "../layouts/footer.php"; ?>