<?php include "includes/header.php"; ?>

  <?php include "includes/nav.php"; ?>

  <?php 

   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rentdeduct'])){

      $rentdeduct = $acct->leaveBonus($_POST);
   }

  ?>

  

  <script type="text/javascript">
    function chkStaff(str){
    //var userid = document.getElementById("userid").value;
    //alert(str);
    //alert(userid);
    if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
    }
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
    document.getElementById("livesearch").style.border="";


    $("#y").val($("#livesearch").text());
    $("#livesearch").text("")
    }
    }
    xmlhttp.open("GET","process_data.php?q="+str,true);
    xmlhttp.send();

    
    }
    
    function chkStaffs(str){
    //var userid = document.getElementById("userid").value;
    //alert(str);
    //alert(userid);
    if (str.length==0) { 
    document.getElementById("livesearchs").innerHTML="";
    document.getElementById("livesearchs").style.border="0px";
    return;
    }
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    document.getElementById("livesearchs").innerHTML=xmlhttp.responseText;
    document.getElementById("livesearchs").style.border="";


    $("#yy").val($("#livesearchs").text());
    $("#livesearchs").text("")
    }
    }
    xmlhttp.open("GET","process_data.php?qq="+str,true);
    xmlhttp.send();

    
    }

  </script>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Leave Bonus</h1>
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
                <h5>Leave Bonus</h5>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <?php  

                      if (isset($rentdeduct)) {
                        echo $rentdeduct;
                      }
                      
                      if (isset($_SESSION['leave_message'])) {

                        $msg = $_SESSION['leave_message'];
                        
                        echo $msg;

                        unset($_SESSION['leave_message']);
                        
                      }

                    ?>
                    <form action="" method="post">
                      <div class="mb-3">
                        <label for="">Search by Last Name</label>
                        <input type="text" class="form-control" onblur="chkStaff(this.value);" oninput="chkStaffs(this.value);">
                      </div><hr>
                      <div class="mb-3">
                        <label for="">Staff ID</label>
                        <input type="text" class="form-control" name="staff_id" id="yy">
                        <div id="livesearchs"></div>
                      </div>

                      <div class="mb-3">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control" name="fullname" id="y">
                        <div id="livesearch"></div>
                      </div>

                      <div class="mb-3">
                        <label for="">Amount</label>
                        <input type="text" class="form-control" name="amount">
                      </div>
                      
                      <div class="mb-3">
                        <label for="">Date Joined</label>
                        <input type="date" class="form-control" name="date_joined">
                      </div>

                      <button type="submit" name="rentdeduct" class="btn btn-primary">Submit</button>
                    </form>
                  </div>

                  <div class="col-md-6">
                    <?php 
            
                      if(isset($delpro)){
                        echo $delpro;
                      }

                    ?>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover">
                        <thead>
                          <th>Staff ID</th>
                          <th>Full Name</th>
                          <th>Amount</th>
                          <th>Action</th>
                        </thead>

                        <tbody>
                          <?php 
                            $getPro = $acct->getLeaveBonus();

                            if($getPro){
                              $i = 0;
                              foreach ($getPro as $results) {
                                $i++;
             
                          ?>
                          <tr>
                            <td><?= $results['staff_id'] ?></td>
                            <td><?= $results['fullname'] ?></td>
                            <td>&#8358;<?= $results['amount']?></td>
                            <td>
                              <a href="edit-leavebonus?staffid=<?=$results['staff_id']; ?>" class="btn btn-success">Edit</a>
                            </td>
                          </tr>
                          <?php } } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

                
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

  





<?php include "includes/footer.php"; ?>