    



<?php $__env->startSection('content'); ?>

        


                <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12 col-sm-12 ">

              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="col-md-6">
                    <h3> مخطط بياني <small> حركة المبيعات خلال الشهر </small></h3>
                  </div>
                  <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2020 - January 28, 2020</span> <b class="caret"></b>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-9">
                    <canvas id="mybarChart">

                    </canvas>
                </div>
                <div class="clearfix"></div>
              </div>

              <br>
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="col-md-6">
                    <h3> مخطط بياني <small> حركة المبيعات خلال اليوم </small></h3>
                  </div>
                    <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2020 - Fub 28, 2020</span> <b class="caret"></b>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-9">
                    <div id="echart_line"  style="height:350px;">

                    </div>
                </div>
                <div class="clearfix"></div>
              </div>


            </div>
          </div>
        </div>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rest3\resources\views/POS/index.blade.php ENDPATH**/ ?>