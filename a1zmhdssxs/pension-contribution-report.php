<?php include "includes/header.php"; ?>

  <?php include "includes/nav.php"; ?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pension Contribution Report</h1>
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
              
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Fullname</th>
                    
                    <th>Employee</th>
                    <th>Employer</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $getPro = $acct->getPenReport();

                    $gross = 0;
                    $pens = 0;
                    $taxes = 0;
                    $tdeduct = 0;
                    $net = 0;
                    if($getPro){
                      $i = 0;
                      foreach ($getPro as $results) {
                        $i++;

                        $gross += $results['amount'];
                        $pens += $results['amounts'];
     
                  ?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$results['fullname']?></td>
                    
                    <td>&#8358;<?=number_format($results['amount'])?></td>
                    <td>&#8358;<?=number_format($results['amounts'])?></td>
                  </tr>
                  <?php } } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td></td>
                      <td colspan="1" class="text-right">Total</td>
                      <td>&#8358;<?= number_format($gross) ?></td>
                      <td>&#8358;<?= number_format($pens) ?></td>

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