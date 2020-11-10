<?php
require_once './../util/initialize.php';

include 'common/upper_content.php';
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <h3>Hi <?php echo User::find_by_id($_SESSION["user"]["id"])->name; ?>..</h3>
                </div>

                <div class="title_right">

                </div>
            </div>
            <div class="clearfix"></div>
            <?php Functions::output_result(); ?>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">

                    <div class="x_panel">
                        <div class="x_title">
                            <!--<h2>This Year Summery <small>Monthly report</small></h2>-->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <!--<h2 id="title">Daily Expences Quick Add</h2>-->
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                      

                  </div>
              </div>
          </div>

      </div>
  </div>
</div>
</div>
<!-- /page content -->
<?php include 'common/bottom_content.php'; ?>
<script>





</script>
