<?php include "includes/header.php"; ?>

  <?php include "includes/nav.php"; ?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Attendance</h1>
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
                <a href="/payroll/add-attendance" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> New</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Employee ID</th>
                    <th>Full Name</th>
                    <th>Time In</th>
                    <th></th>
                    <th>Time Out</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Jul 01, 2022</td>
                    <td>QDF541672930</td>
                    <td>John Doe</td>
                    <td>08:00 AM</td>
                    <td><span class="badge badge-danger">late</span></td>
                    <td>4:30 PM</td>
                    <td>
                      <a href="" class="btn btn-success">Edit</a>
                      <a href="" class="btn btn-danger">Delete</a>
                    </td>
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