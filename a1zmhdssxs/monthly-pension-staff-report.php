<?php include "includes/header.php"; ?>

  <?php include "includes/nav.php"; ?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Monthly Pension Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="float-left">
                  <?php 
                    $getPro = $acct->getPensionDeduct();
                      if($getPro){

                        foreach ($getPro as $results) {
                        

                          $dates = $results['date_added'];

                          $date = date('Y-m-d', strtotime($dates));

                          $month = date('F, Y', strtotime($dates));
                        ?>
                      <?php } }else{$month = null;} ?>

                  <h4><?php echo $month ?></h4>
                </div>

                <div class="float-right">
                  <form action="">
                    <div class="row">
                      <div class="col-md-8">
                        <input type="month" name="search" value="<?=!empty($_GET['search']) ? $_GET['search'] : '' ?>" class="form-control">
                      </div>

                      <div class="col-md-4">
                        <button type="submit" class="btn btn-success">Go</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Staff ID</th>
                    <th>Full Name</th>
                    <th>Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $getPro = $acct->getPensionDeduct();

                    $amounts = 0;
                    if($getPro){
                      $i = 0;
                      foreach ($getPro as $results) {
                        $i++;

                        $amounts += $results['amount'];
     
                  ?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?= $results['staff_id'] ?></td>
                    <td><?= $results['fullname'] ?></td>
                    <td>&#8358;<?=number_format($results['amount'])?></td>
                  </tr>
                  <?php } } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="3" class="text-right">Total</td>
                      <td>&#8358;<?= number_format($amounts) ?></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>







<?php include "includes/footer.php"; ?>