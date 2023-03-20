<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['nrp'])) {
          //query SQL
          $prodCode = $_GET['nrp'];
          $query = "SELECT * FROM products WHERE productCode = '$prodCode'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $productCode = $_POST['productCode'];
      $productName = $_POST['productName'];
      $productLine = $_POST['productLine'];
      $productScale = $_POST['productScale'];
      $productVendor = $_POST['productVendor'];
      $productDescription = $_POST['productDescription'];
      $quantityInStock = $_POST['quantityInStock'];
      $buyPrice = $_POST['buyPrice'];
      $MSRP = $_POST['MSRP'];


      //query SQL
      $sql = "UPDATE products SET productName='$productName', productLine='$productLine', productScale='$productScale', productVendor='$productVendor', productDescription='$productDescription', quantityInStock='$quantityInStock', buyPrice='$buyPrice', MSRP='$MSRP'  WHERE productCode='$productCode'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: indexProduct.php?status='.$status);
  }


?>


<!DOCTYPE html>
<html>
  <head>
    <title>Example</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pemrograman Web</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
          <ul class="nav flex-column" style="margin-top:100px;">
             <li class="nav-item" >
                <a class="nav-link" style="color:brown" >Putri Dwi Agnesya (21081010142) </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" ></a>
              </li>
               <li class="nav-item">
                <a class="nav-link " href="<?php echo "index.php"; ?>">Data Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="form.php">Tambah Data Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="indexProduct.php">Data Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="<?php echo "formProducts.php"; ?>">Tambah Data Product</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


          <h2 style="margin: 30px 0 30px 0;">Update Data Products</h2>
          <form action="updateProduct.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div class="form-group">
              <label>Product Code</label>
              <input type="text" class="form-control" placeholder="code" name="productCode" value="<?php echo $data['productCode'];?>" required="required" readonly>
            </div>
            <div class="form-group">
              <label>Product Name</label>
              <input type="text" class="form-control" placeholder="nama produk" name="productName" required="required">
            </div>
            <div class="form-group">
              <label>Product Line</label>
              <input class="form-control" placeholder="contact line"  name="productLine" required="required">
            </div>
            <div class="form-group">
              <label> Product Scale</label>
              <input type="text" class="form-control" placeholder="product scale" name="productScale" required="required">
            </div>
            <div class="form-group">
              <label>Product Vendor </label>
              <input type="text" class="form-control" placeholder="productVendor" name="productVendor" required="required">
            </div>
            <div class="form-group">
              <label>Product Description</label>
              <textarea class="form-control" placeholder="productDescription"  name="productDescription" required="required"></textarea>
            </div>
            <div class="form-group">
              <label>Quantity In Stock</label>
              <textarea type="text" class="form-control" placeholder="quantity" name="quantityInStock" required="required"></textarea>
            </div>
            <div class="form-group">
              <label>Buy Price</label>
              <input class="form-control" placeholder="buyPrice"  name="buyPrice" required="required">
            </div>
            <div class="form-group">
              <label> MSRP</label>
              <input type="text" class="form-control" placeholder="MSRP" name="MSRP" required="required">
            </div>

            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>