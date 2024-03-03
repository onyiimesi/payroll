<?php include "includes/header.php"; ?>

  <?php include "includes/nav.php"; ?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Deduction Breakdown Report</h1>
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
              <div class="card-body table-responsive">
              
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Description</th>
                    <th>Formular</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>Net Pay</td>
                    <td>GROSS SALARY - (PENSION BY STAFF + TAX + TOTAL SCHOOL DEDUCTION)</td>
                  </tr>

                  <tr>
                    <td>2</td>
                    <td>Basic Salary</td>
                    <td>(GROSS SALARY - 1400) / 2.2</td>
                  </tr>

                  <tr>
                    <td>3</td>
                    <td>Housing</td>
                    <td>0.7 * BASIC SALARY</td>
                  </tr>

                  <tr>
                    <td>4</td>
                    <td>Transport</td>
                    <td>0.3 * BASIC SALARY</td>
                  </tr>

                  <tr>
                    <td>5</td>
                    <td>Meal</td>
                    <td>0.35 * (GROSS SALARY - (BASIC SALARY + HOUSING + TRANSPORT))</td>
                  </tr>

                  <tr>
                    <td>6</td>
                    <td>Entertainment</td>
                    <td>0.35 * (GROSS SALARY - (BASIC SALARY + HOUSING + TRANSPORT))</td>
                  </tr>

                  <tr>
                    <td>7</td>
                    <td>Internet</td>
                    <td>0.3 * (GROSS SALARY - (BASIC SALARY + HOUSING + TRANSPORT))</td>
                  </tr>

                  <tr>
                    <td>8</td>
                    <td>Pension by Staff</td>
                    <td>0.08 * (BASIC SALARY + HOUSING + TRANSPORT )</td>
                  </tr>

                  <tr>
                    <td>9</td>
                    <td>Pension by Employer</td>
                    <td>0.1 * (BASIC SALARY + HOUSING + TRANSPORT )</td>
                  </tr>

                  <tr>
                    <td>10</td>
                    <td>Annual Leave Bonus</td>
                    <td>(0.1* BASIC SALARY) * 12</td>
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