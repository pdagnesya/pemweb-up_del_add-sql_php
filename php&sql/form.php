<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $customerNumber = $_POST['customerNumber'];
      $customerName = $_POST['customerName'];
      $contactLastName = $_POST['contactLastName'];
      $contactFirstName = $_POST['contactFirstName'];
      $phone = $_POST['phone'];
      $addressLine1 = $_POST['addressLine1'];
      $addressLine2 = $_POST['addressLine2'];
      $city = $_POST['city'];
      $state = $_POST['state'];
      $postalCode = $_POST['postalCode'];
      $country = $_POST['country'];
      $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
      $creditLimit = $_POST['creditLimit'];
      //query SQL
      $query = "INSERT INTO customers VALUES('$customerNumber','$customerName','$contactLastName','$contactFirstName', '$phone', '$addressLine1','$addressLine2','$city', '$state', '$postalCode','$country','$salesRepEmployeeNumber', '$creditLimit')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
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
                <a class="nav-link" href="<?php echo "index.php"; ?>">Data Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="form.php">Tambah Data Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="indexProduct.php">Data Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="<?php echo "formProducts.php"; ?>">Tambah Data Product</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data  berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data  gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Employee</h2>
          <form action="form.php" method="POST">
            
            <div class="form-group">
              <label>Customer Number</label>
              <input type="text" class="form-control" placeholder="number" name="customerNumber" required="required">
            </div>
            <div class="form-group">
              <label>Customer Name</label>
              <input type="text" class="form-control" placeholder="nama" name="customerName" required="required">
            </div>
            <div class="form-group">
              <label>Contact Last Name</label>
              <input class="form-control" placeholder="contact last name"  name="contactLastName" required="required">
            </div>
            <div class="form-group">
              <label> Contact First Name</label>
              <input type="text" class="form-control" placeholder="contact first name" name="contactfirstName" required="required">
            </div>
            <div class="form-group">
              <label>Phone </label>
              <input type="text" class="form-control" placeholder="+62xxxxxxxxxxx" name="phone" required="required">
            </div>
            <div class="form-group">
              <label>Address 1</label>
              <textarea class="form-control" placeholder="address1"  name="addressLine1" required="required"></textarea>
            </div>
            <div class="form-group">
              <label>Address 2</label>
              <textarea type="text" class="form-control" placeholder="address2" name="addressLine2" required="required"></textarea>
            </div>
            <div class="form-group">
              <label>City</label>
              <input class="form-control" placeholder="city"  name="city" required="required">
            </div>
            <div class="form-group">
              <label> State</label>
              <input type="text" class="form-control" placeholder="state" name="state" required="required">
            </div>
            <div class="form-group">
              <label>Postal Code </label>
              <input type="text" class="form-control" placeholder="postalCode" name="postalCode" required="required">
            </div>
            <div class="form-group">
              <label>Country</label>
              <textarea class="form-control" placeholder="country"  name="country" required="required"></textarea>
            </div>
            <div class="form-group">
              <label>Sales Rep Employee Number</label>
              <input type="text" class="form-control" placeholder="salesRepEmployeeNumber" name="salesRepEmployeeNumber" required="required">
            </div>
            <div class="form-group">
              <label>Credit Limit</label>
              <textarea class="form-control" placeholder="coucreditLimitntry"  name="creditLimit" required="required"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>