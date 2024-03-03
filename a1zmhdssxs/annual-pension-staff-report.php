<?php include "includes/header.php"; ?>

  <?php include "includes/nav.php"; ?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Annual Pension Report</h1>
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

                          $month = date('Y', strtotime($dates));
                        ?>
                      <?php } }else{$month = null;} ?>

                  <?php if($month){ ?>
                    <h4>Year <?php echo $month ?></h4>
                  <?php } ?>
                </div>

                <div class="float-right">
                  <form action="">
                    <div class="row">
                      <div class="col-md-8">
                        <select class="form-control" name="year" id="">
                          <option>Choose Year</option>
                          <?php for ($count = date('Y'); $count >= 1910; $count--) 
                            echo '<option value="' . $count . '">' . $count . '</option>';
                            ?>
                        </select>
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