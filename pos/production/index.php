<?php
require_once './../util/initialize.php';
require_once 'common/pos_header.php';
$user = User::find_by_id($_SESSION["user"]["id"]);
?>
<body>
  <form class="form-inline" action="#">
    <!-- content container starts -->
    <div class="container">
      <div class="row" id='info-bar'>
        <div class="col-sm-6">

          <table class="table table-bordered">
            <tbody>
              <tr>
                <td colspan=2 >Cashier Name: <?php echo $user->name; ?></td>
              </tr>
              <tr>
                <td>Branch Name: <?php
                $branch = Branch::find_by_id($user->branch_id);
                echo $branch->name;
                ?> </td>
                <td>Code: <?php
                $branch = Branch::find_by_id($user->branch_id);
                echo $branch->code;
                ?> </td>
              </tr>
            </tr>
          </tbody>
        </table>

      </div>
      <div class="col-sm-3">
        <table>
          <tbody>
            <tr>
              <td>Date: </td>
              <td> <?php echo date("Y-m-d"); ?> </td>
            </tr>
            <tr>
              <td>Time: </td>
              <td> <?php echo date("h:i:s"); ?> </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-sm-2">
        <a href="logout.php" class="btn btn-info" role="button"> <span class="fa fa-sign-out"></span> LogOut </a>
      </div>
    </div>
  </div>
  <form class="form-inline" action="#">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-8">
          <div class="col-sm-12" id='grid-section'>
            <div class="form-group">
              <label>CUSTOMER MEMBERSHIP NO: </label>
              <input type="text" class="form-control" placeholder=" CUSTOMER MEMBERSHIP NO ">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value=""> Course redemption
              </label>
            </div>
            <hr/>
            <!-- table grid start -->
            <table class="table table-striped grid-table">
              <thead>
                <tr>
                  <th>S/No</th>
                  <th>Name</th>
                  <th>Categoey</th>
                  <th>Code</th>
                  <th>Unit Price</th>
                  <th>Qty</th>
                  <th>Sub Total</th>
                  <th>Ops1</th>
                  <th>Ops2</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
            <!-- table grid end -->


          </div>
        </div>

        <div class="col-sm-4">
          <div class="col-sm-12" id='product-section'>
            <h4>Category for brand, service</h4>
            <?php
            if(isset($_GET['product'])){
              ?>
              <div class="col-sm-12 select-section"> <a href="index.php" class="btn btn-warning btn-block" role="button"> BACK </a> </div>

              <?php
              foreach(Product::find_all() as $product_data){
                ?>
                <div class="col-sm-12 select-section"> <a href="" class="btn btn-primary btn-block" role="button"> <?php echo $product_data->name; ?> </a> </div>
                <?php
              }
              ?>

              <?php
            }else if(isset($_GET['service'])){
              ?>
              <div class="col-sm-12 select-section"> <a href="index.php" class="btn btn-warning btn-block" role="button"> BACK </a> </div>

              <?php
              foreach(Service::find_all() as $service_data){
                ?>
                <div class="col-sm-12 select-section"> <a href="" class="btn btn-primary btn-block" role="button"> <?php echo $service_data->name; ?> </a> </div>
                <?php
              }
              ?>

              <?php
            }else if(isset($_GET['package'])){
              ?>
              <div class="col-sm-12 select-section"> <a href="index.php" class="btn btn-warning btn-block" role="button"> BACK </a> </div>

              <?php
              foreach(Package::find_all() as $package_data){
                ?>
                <div class="col-sm-12 select-section"> <a href="" class="btn btn-primary btn-block" role="button"> <?php echo $package_data->name; ?> </a> </div>
                <?php
              }
              ?>

              <?php
            }else{
              ?>
              <div class="col-sm-4 select-section"> <a href="index.php?product=1" class="btn btn-info btn-block" role="button"> Product </a> </div>
              <div class="col-sm-4 select-section"> <a href="index.php?service=2" class="btn btn-info btn-block" role="button"> Services </a> </div>
              <div class="col-sm-4 select-section"> <a href="index.php?package=3" class="btn btn-info btn-block" role="button"> Packages </a> </div>

              <?php
            }
            ?>

          </div>

        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-12">
          <div class="col-sm-12" id='bottom-section'>

            <div class="col-sm-3"><button type="button" class="btn btn-primary btn-block touch-button" data-toggle="modal" data-target="#myModal">CASH</button></div>
            <div class="col-sm-3"> <a href="#" class="btn btn-primary btn-block touch-button" role="button">OTHER E PAYMENTS</a> </div>
            <div class="col-sm-3"> <a href="#" class="btn btn-primary btn-block touch-button" role="button">CASH + VOUCHER</a> </div>
            <div class="col-sm-3"> <a href="#" class="btn btn-primary btn-block touch-button" role="button">SUSPENDED OR CONTINUE PAYMENT</a> </div>

            <!-- CASH MODEL BODY START -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>CASH PAYMENT</b></h4>
                  </div>
                  <div class="modal-body">

                    <div class="form-group">
                      <label>INVOICE DISCOUNT: </label>
                      <input type="text" class="form-control" placeholder="INVOICE DISCOUNT ">
                    </div>
                    <hr/>
                    <div class="form-group">
                      <label>INVOICE PAYMENT: </label>
                      <input type="text" class="form-control" placeholder="INVOICE PAYMENT ">
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
            <!-- CASH MODEL BODY ENDS -->
          </div>
        </div>

      </div>
    </div>

  </form>
  <!-- content container ends -->
</body>
</html>
