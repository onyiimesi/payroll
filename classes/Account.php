<?php

	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../connect/Database.php');
	include_once ($filepath.'/../lib/format.php');

	class Account{

		private $con;
		private $format;

		public function __construct(){
	   		$this->con = new Database();
	   		$this->format = new Format();
		}

		public function addEmployee($data, $file){

			$arr = array();
			$arr['staffid'] = addslashes($data['staff_id']);
			$staffid = $arr['staffid'];

			$arr['surname'] = addslashes($data['surname']);
			$sname = $arr['surname'];

			$arr['firstname'] = addslashes($data['firstname']);
			$fname = $arr['firstname'];

			$arr['middle'] = addslashes($data['middle']);
			$middle = $arr['middle'];

			$arr['addr'] = addslashes($data['addr']);

			$arr['email'] = addslashes($data['email']);
			$email = $arr['email'];

			$arr['phone'] = addslashes($data['phone']);

			$arr['school'] = addslashes($data['school']);

			$arr['designation'] = addslashes($data['designation']);

			$arr['nxtofkin'] = addslashes($data['nxtofkin']);

			$arr['nxtphone'] = addslashes($data['nxtphone']);

			$arr['nxtaddr'] = addslashes($data['nxtaddr']);

			$arr['gender'] = addslashes($data['gender']);

			date_default_timezone_set('Africa/Lagos');
			$rawdate = htmlentities($data['yearjoined']);
	  		$arr['yearjoined'] = date('Y-m-d', strtotime($rawdate));

			$arr['salary'] = addslashes($data['salary']);

			$arr['allowance'] = addslashes($data['allowance']);

			$arr['status'] = addslashes($data['status']);

			$arr['basic_salary'] = addslashes($data['basic_salary']);

			$arr['housing'] = addslashes($data['housing']);

			$arr['transport'] = addslashes($data['transport']);

			$arr['meal'] = addslashes($data['meal']);

			$arr['entertainment'] = addslashes($data['entertainment']);

			$arr['internet'] = addslashes($data['internet']);


	  		// $ends = $arr['subend'];
	  		// $subend = date('F jS, Y', strtotime($ends));

	  		// Check for empty fields
			/*if ($arr['staffid'] == "" || $arr['surname'] == "" || $arr['firstname'] == "" || $arr['middle'] == "" || $arr['addr'] == "" || $arr['email'] == "" || $arr['phone'] == "" || $data['school'] == "" || $arr['designation'] == "" || $arr['nxtofkin'] == "" || $arr['nxtphone'] == "" || $arr['nxtaddr'] == "" || $arr['gender'] == "" || $arr['yearjoined'] == "" || $arr['salary'] == "" || $arr['status'] == "" || $arr['basic_salary'] == "" || $arr['housing'] == "" || $arr['transport'] == "" || $arr['meal'] == "" || $arr['entertainment'] == "" || $arr['internet'] == ""){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php

				return "<div class='alert alert-danger text-white' style='font-size: 15px;'>Field cannot be empty</div>";
			}*/

	  		$permit = array('jpg','jpeg','png');
	        $file_name = $file['image']['name'];
	        $file_size = $file['image']['size'];
	        $file_temp = $file['image']['tmp_name'];

	        if (empty($file_name)) {
	        	
	        }else{
	        	$sourceProperties = getimagesize($file_temp);
	        }

	        $folder = "employeeImg/$staffid/";

	        if(!file_exists($folder)) {
	        	mkdir($folder, 0777, true);
	        }

	        $div = explode('.', $file_name);
	        $file_ext = strtolower(end($div));

	        if (empty($file_name)) {
	        	$arr['image'] = '';
	        }else{
	        	$arr['image'] = $folder . substr(md5(time()), 0, 10).'.'.$file_ext;
	        }
	        

	        if (empty($file_name)) {
	        	$uploadImageType = '';
	        	$sourceImageWidth = '';
	        	$sourceImageHeight = '';
	        }else{
	        	$uploadImageType = $sourceProperties[2];
	        	$sourceImageWidth = $sourceProperties[0];
	        	$sourceImageHeight = $sourceProperties[1];
	        }
	        

	        switch ($uploadImageType) {
	            case IMAGETYPE_JPEG:
	                $resourceType = imagecreatefromjpeg($file_temp); 
	                $imageLayer = $this->format->resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,"300");
	                imagejpeg($imageLayer,$arr['image']);
	                break;
	 
	            case IMAGETYPE_GIF:
	                $resourceType = imagecreatefromgif($file_temp); 
	                $imageLayer = $this->format->resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,"300");
	                imagegif($imageLayer,$arr['image']);
	                break;
	 
	            case IMAGETYPE_PNG:
	                $resourceType = imagecreatefrompng($file_temp); 
	                $imageLayer = $this->format->resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,"300");
	                imagepng($imageLayer,$arr['image']);
	                break;
	 
	            default:
	                $imageProcess = 0;
	                break;
	        }

	        if($file_size > 5054589){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	        	return "<div class='alert alert-danger text-white' style='font-size: 14px;'>Image size should be less than 1MB.</div>";
	        }

			/*if(in_array($file_ext, $permit) === false){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-danger text-white' style='font-size: 14px;'>You can upload only ".implode(', ', $permit)."</div>";
	        }*/
	  		

			// 
	        /*if (empty($arr['surname']) || !preg_match('/^[a-zA-Z]+$/', $arr['surname'])) {?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            
	            return "<div class='alert alert-danger text-white' style='font-size: 15px;'>Only letters allowed in surname</div>";

	        }*/

	        //
	        /*if (empty($arr['firstname']) || !preg_match('/^[a-zA-Z]+$/', $arr['firstname'])) {?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            
	            return "<div class='alert alert-danger text-white' style='font-size: 15px;'>Only letters allowed in first name</div>";

	        }*/

	        //
	        /*if (empty($arr['middle']) || !preg_match('/^[a-zA-Z]+$/', $arr['middle'])) {?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            
	            return "<div class='alert alert-danger text-white' style='font-size: 15px;'>Only letters allowed in middle name</div>";

	        }*/

	        // Check for email
	        /*if (!filter_var($arr['email'], FILTER_VALIDATE_EMAIL)) {?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            
	            return "<div class='alert alert-danger text-white' style='font-size: 15px;'>Email is not valid</div>";

	        }*/
	        // Check if Email Exists
	        /*$mailquery = "SELECT * FROM employee WHERE email = '$email' LIMIT 1 ";
	        $mailcheck = $this->con->select($mailquery);
	        if($mailcheck != false){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-danger text-white' style='font-size: 15px;'>Employee Email Exist!</div>";
	        }*/


	        // Check if Staff ID Exists
	        $staffquery = "SELECT * FROM employee WHERE staff_id = '$staffid' LIMIT 1 ";
	        $idcheck = $this->con->select($staffquery);
	        if($idcheck != false){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-danger text-white' style='font-size: 15px;'>Staff ID Exist!</div>";
	        }else{

	        	move_uploaded_file($file_ext, $arr['image']);

				$query = "INSERT INTO employee (staff_id,surname,firstname,middle,addr,email,phone,school,designation,nxtofkin,nxtphone,nxtaddr,gender,yearjoined,image,basic_salary,housing,transport,meal,entertainment,internet,salary,allowance,status) VALUES(:staffid,:surname,:firstname,:middle,:addr,:email,:phone,:school,:designation,:nxtofkin,:nxtphone,:nxtaddr,:gender,:yearjoined,:image,:basic_salary,:housing,:transport,:meal,:entertainment,:internet,:salary,:allowance,:status)";
				$insert_row = $this->con->insert($query,$arr);


				if ($insert_row) {?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-success text-white'>Employee Created Successfully!</div>";

				}else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-danger text-white'>Error</div>";
				}
			}

		}

		public function getEmployees(){

			$search = $_GET['search'] ?? null;

			if($search){

				$query = "SELECT * FROM employee WHERE school = '$search' ORDER BY id DESC ";
				return $this->con->select($query);

			}

			$query = "SELECT * FROM employee ORDER BY id DESC ";
			return $this->con->select($query);
		}


		public function feesDeduct($data){

			$arr = array();
			$arr['staffid'] = addslashes($data['staff_id']);
			$staffid = $arr['staffid'];

			$arr['fullname'] = addslashes($data['fullname']);
			$fname = $arr['fullname'];

			$arr['amount'] = addslashes($data['amount']);
			$amount = $arr['amount'];
			date_default_timezone_set('Africa/Lagos');

			$date_from = htmlentities($data['date_from']);
  			$arr['date_from'] = date('Y-m-d', strtotime($date_from));

  			$date_to = htmlentities($data['date_to']);
  			$arr['date_to'] = date('Y-m-d', strtotime($date_to));

			if ($arr['staffid'] == "" || $arr['fullname'] == "" || $arr['amount'] == "" || $arr['date_from'] == "" || $arr['date_to'] == ""){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php

				return "<div class='alert alert-danger text-white' style='font-size: 15px;'>Field cannot be empty</div>";

			}else{

				$query = "INSERT INTO fees_deduct (staff_id,fullname,amount,date_from,date_to) VALUES(:staffid,:fullname,:amount,:date_from,:date_to)";
				$insert_row = $this->con->insert($query,$arr);


				if ($insert_row) {?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-success text-white'>Added Successfully!</div>";

				}else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-danger text-white'>Error</div>";
				}
			}
		}

		public function getFeesDeduct(){

			$query = "SELECT * FROM fees_deduct ORDER BY fees_id DESC ";
			return $this->con->select($query);
		}

		public function rentDeduct($data){

			$arr = array();
			$arr['staffid'] = addslashes($data['staff_id']);
			$staffid = $arr['staffid'];

			$arr['fullname'] = addslashes($data['fullname']);
			$fname = $arr['fullname'];

			$arr['amount'] = addslashes($data['amount']);
			$amount = $arr['amount'];

			// date_default_timezone_set('Africa/Lagos');

			// $date_from = htmlentities($data['date_from']);
  	// 		$arr['date_from'] = date('Y-m-d', strtotime($date_from));

  	// 		$date_to = htmlentities($data['date_to']);
  	// 		$arr['date_to'] = date('Y-m-d', strtotime($date_to));

			if ($arr['staffid'] == "" || $arr['fullname'] == "" || $arr['amount'] == ""){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php

				return "<div class='alert alert-danger text-white' style='font-size: 15px;'>Field cannot be empty</div>";

			}else{

				$query = "INSERT INTO rent_deduct (staff_id,fullname,amount) VALUES(:staffid,:fullname,:amount)";
				$insert_row = $this->con->insert($query,$arr);


				if ($insert_row) {?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-success text-white'>Added Successfully!</div>";

				}else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-danger text-white'>Error</div>";
				}
			}
		}

		public function getRentDeduct(){

			$query = "SELECT * FROM rent_deduct ORDER BY rent_id DESC ";
			return $this->con->select($query);
		}

		public function leaveBonus($data){

			$arr = array();
			$arr['staffid'] = addslashes($data['staff_id']);
			$staffid = $arr['staffid'];

			$arr['fullname'] = addslashes($data['fullname']);
			$fname = $arr['fullname'];

			$arr['amount'] = addslashes($data['amount']);
			$amount = $arr['amount'];
			
			$date_joined = htmlentities($data['date_joined']);
  			$arr['date_joined'] = date('Y-m-d', strtotime($date_joined));

			if ($arr['staffid'] == "" || $arr['fullname'] == "" || $arr['amount'] == "" || $arr['date_joined'] == ""){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php

				return "<div class='alert alert-danger text-white' style='font-size: 15px;'>Field cannot be empty</div>";

			}else{

				$query = "INSERT INTO leave_bonus (staff_id,fullname,amount,date_joined) VALUES(:staffid,:fullname,:amount,:date_joined)";
				$insert_row = $this->con->insert($query,$arr);


				if ($insert_row) {?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-success text-white'>Added Successfully!</div>";

				}else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-danger text-white'>Error</div>";
				}
			}
		}

		
		public function getLeaveBonus(){

			$query = "SELECT * FROM leave_bonus ORDER BY id DESC ";
			return $this->con->select($query);
		}

		public function getBonus($add){
		    
		    $month = date('m');

			$query = "SELECT * FROM leave_bonus WHERE MONTH(date_joined) = '$month' AND staff_id = '$add' ";
			return $this->con->select($query);
		}

		public function loanDeduct($data){

			$arr = array();
			$arr['staffid'] = addslashes($data['staff_id']);
			$staffid = $arr['staffid'];

			$arr['fullname'] = addslashes($data['fullname']);
			$fname = $arr['fullname'];

			$arr['amount'] = addslashes($data['amount']);
			$amount = $arr['amount'];
			date_default_timezone_set('Africa/Lagos');

			$date_from = htmlentities($data['date_from']);
  			$arr['date_from'] = date('Y-m-d', strtotime($date_from));

  			$date_to = htmlentities($data['date_to']);
  			$arr['date_to'] = date('Y-m-d', strtotime($date_to));

			if ($arr['staffid'] == "" || $arr['fullname'] == "" || $arr['amount'] == "" || $arr['date_from'] == "" || $arr['date_to'] == ""){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php

				return "<div class='alert alert-danger text-white' style='font-size: 15px;'>Field cannot be empty</div>";

			}else{

				$query = "INSERT INTO loan_deduct (staff_id,fullname,amount,date_from,date_to) VALUES(:staffid,:fullname,:amount,:date_from,:date_to)";
				$insert_row = $this->con->insert($query,$arr);


				if ($insert_row) {?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-success text-white'>Added Successfully!</div>";

				}else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-danger text-white'>Error</div>";
				}
			}
		}

		public function getLoanDeduct(){

			$query = "SELECT * FROM loan_deduct ORDER BY loan_id DESC ";
			return $this->con->select($query);
		}

		public function upfrontDeduct($data){

			$arr = array();
			$arr['staffid'] = addslashes($data['staff_id']);
			$staffid = $arr['staffid'];

			$arr['fullname'] = addslashes($data['fullname']);
			$fname = $arr['fullname'];

			$arr['amount'] = addslashes($data['amount']);
			$amount = $arr['amount'];
			date_default_timezone_set('Africa/Lagos');

			$date_from = htmlentities($data['date_from']);
  			$arr['date_from'] = date('Y-m-d', strtotime($date_from));

  			$date_to = htmlentities($data['date_to']);
  			$arr['date_to'] = date('Y-m-d', strtotime($date_to));

			if ($arr['staffid'] == "" || $arr['fullname'] == "" || $arr['amount'] == "" || $arr['date_from'] == "" || $arr['date_to'] == ""){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php

				return "<div class='alert alert-danger text-white' style='font-size: 15px;'>Field cannot be empty</div>";

			}else{

				$query = "INSERT INTO upfront_deduct (staff_id,fullname,amount,date_from,date_to) VALUES(:staffid,:fullname,:amount,:date_from,:date_to)";
				$insert_row = $this->con->insert($query,$arr);


				if ($insert_row) {?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-success text-white'>Added Successfully!</div>";

				}else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-danger text-white'>Error</div>";
				}
			}
		}

		public function getUpfrontDeduct(){

			$query = "SELECT * FROM upfront_deduct ORDER BY upfront_id DESC ";
			return $this->con->select($query);
		}

		public function taxDeduct($data){

			$arr = array();
			$arr['staffid'] = addslashes($data['staff_id']);
			$staffid = $arr['staffid'];

			$arr['fullname'] = addslashes($data['fullname']);
			$fname = $arr['fullname'];

			$arr['amount'] = addslashes($data['amount']);
			$amount = $arr['amount'];
			date_default_timezone_set('Africa/Lagos');

			// $date_from = htmlentities($data['date_from']);
  	// 		$arr['date_from'] = date('Y-m-d', strtotime($date_from));

  	// 		$date_to = htmlentities($data['date_to']);
  	// 		$arr['date_to'] = date('Y-m-d', strtotime($date_to));

			if ($arr['staffid'] == "" || $arr['fullname'] == "" || $arr['amount'] == ""){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php

				return "<div class='alert alert-danger text-white' style='font-size: 15px;'>Field cannot be empty</div>";

			}else{

				$query = "INSERT INTO tax_deduct (staff_id,fullname,amount) VALUES(:staffid,:fullname,:amount)";
				$insert_row = $this->con->insert($query,$arr);


				if ($insert_row) {?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-success text-white'>Added Successfully!</div>";

				}else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-danger text-white'>Error</div>";
				}
			}
		}

		public function getTaxDeduct(){

			$month = date('m');
			$year = date('Y');

			$search = $_GET['search'] ?? null;
			$years = $_GET['year'] ?? null;

			if($search){

				$styear = date("Y", strtotime($search));
				$stmonth = date("m", strtotime($search));

				$query = "SELECT * FROM tax_deduct WHERE YEAR(date_added) = '$styear' AND MONTH(date_added) = '$stmonth' ORDER BY tax_id DESC ";
				return $this->con->select($query);

			}

			if($years){

				$query = "SELECT * FROM tax_deduct WHERE YEAR(date_added) = '$years' ORDER BY tax_id DESC ";
				return $this->con->select($query);

			}

			$query = "SELECT * FROM tax_deduct WHERE YEAR(date_added) = '$year' AND MONTH(date_added) = '$month' ORDER BY tax_id DESC ";
			return $this->con->select($query);
		}

		public function getTaxDeducts(){

			$query = "SELECT * FROM tax_deduct ORDER BY date_added DESC ";
			return $this->con->select($query);
		}

		public function pensionDeduct($data){

			$arr = array();
			$arr['staffid'] = addslashes($data['staff_id']);
			$staffid = $arr['staffid'];

			$arr['fullname'] = addslashes($data['fullname']);
			$fname = $arr['fullname'];

			$arr['amount'] = addslashes($data['amount']);
			$amount = $arr['amount'];
			date_default_timezone_set('Africa/Lagos');

			// $date_from = htmlentities($data['date_from']);
  	// 		$arr['date_from'] = date('Y-m-d', strtotime($date_from));

  	// 		$date_to = htmlentities($data['date_to']);
  	// 		$arr['date_to'] = date('Y-m-d', strtotime($date_to));

			if ($arr['staffid'] == "" || $arr['fullname'] == "" || $arr['amount'] == ""){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php

				return "<div class='alert alert-danger text-white' style='font-size: 15px;'>Field cannot be empty</div>";

			}else{

				$query = "INSERT INTO pension_deduct (staff_id,fullname,amount) VALUES(:staffid,:fullname,:amount)";
				$insert_row = $this->con->insert($query,$arr);


				if ($insert_row) {?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-success text-white'>Added Successfully!</div>";

				}else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-danger text-white'>Error</div>";
				}
			}
		}

		public function getPensionDeduct(){

			$month = date('m');
			$year = date('Y');

			$search = $_GET['search'] ?? null;
			$years = $_GET['year'] ?? null;

			if($search){

				$styear = date("Y", strtotime($search));
				$stmonth = date("m", strtotime($search));

				$query = "SELECT * FROM pension_deduct WHERE YEAR(date_added) = '$styear' AND MONTH(date_added) = '$stmonth' ORDER BY pension_id DESC ";
				return $this->con->select($query);

			}

			if($years){

				$query = "SELECT * FROM pension_deduct WHERE YEAR(date_added) = '$years' ORDER BY pension_id DESC ";
				return $this->con->select($query);

			}

			$query = "SELECT * FROM pension_deduct WHERE YEAR(date_added) = '$year' AND MONTH(date_added) = '$month' ORDER BY pension_id DESC ";
			return $this->con->select($query);
		}

		public function getEmployee($add){
	    	$arr = array();
	    	$arr['add'] = $add;

	        $query = "SELECT * FROM employee WHERE staff_id = :add ";
	        return $this->con->select($query,$arr);
	        
	    }

	    public function getLoan($add){
	    	$arr = array();
	    	$arr['add'] = $add;
	    	$arr['dates'] = date('Y-m-d');

	        $query = "SELECT * FROM loan_deduct WHERE staff_id = :add AND date_to >= :dates ";
	        return $this->con->select($query,$arr);
	        
	    }

	    public function getFees($add){
	    	$arr = array();
	    	$arr['add'] = $add;
	    	$arr['dates'] = date('Y-m-d');

	        $query = "SELECT * FROM fees_deduct WHERE staff_id = :add AND date_to >= :dates ";
	        return $this->con->select($query,$arr);
	        
	    }

	    public function getRent($add){
	    	$arr = array();
	    	$arr['add'] = $add;

	        $query = "SELECT * FROM rent_deduct WHERE staff_id = :add ";
	        return $this->con->select($query,$arr);
	        
	    }

	    public function getUpfront($add){
	    	$arr = array();
	    	$arr['add'] = $add;
	    	$arr['dates'] = date('Y-m-d');

	        $query = "SELECT * FROM upfront_deduct WHERE staff_id = :add AND date_to >= :dates ";
	        return $this->con->select($query,$arr);
	        
	    }

	    public function getTax($add){
	    	$arr = array();
	    	$arr['add'] = $add;

	        $query = "SELECT * FROM tax_deduct WHERE staff_id = :add ";
	        return $this->con->select($query,$arr);
	        
	    }

	    public function getPension($add){
	    	$arr = array();
	    	$arr['add'] = $add;

	        $query = "SELECT * FROM pension_deduct WHERE staff_id = :add ";
	        return $this->con->select($query,$arr);
	        
	    }

	    public function addPayroll($data){

			$arr = array();

			$arr['email'] = addslashes($data['email']);
			$email = $arr['email'];

			$arr['role'] = addslashes($data['role']);
			$role = $arr['role'];

			$school = "OGUNLADE SCHOOLS";
			$address = "14 OGUNFUNMI STREET OFF AKOBI CRESCENT, SURULERE, LAGOS";
			$num = "+ 234 809 518 7799";
			

			$arr['staffid'] = addslashes($data['staff_id']);
			$staffid = $arr['staffid'];

			$arr['surname'] = addslashes($data['surname']);
			$sname = $arr['surname'];

			$arr['firstname'] = addslashes($data['firstname']);
			$fname = $arr['firstname'];

			$arr['middle'] = addslashes($data['middle']);
			$mname = $arr['middle'];

			$arr['designation'] = addslashes($data['designation']);
			$dsg = $arr['designation'];

			$arr['school'] = addslashes($data['school']);
			$sch = $arr['school'];

			$arr['salary'] = addslashes($data['salary']);
			$gross = number_format($arr['salary']);

			$arr['allowance'] = addslashes($data['allowance']);
			$allowance = number_format((int)$arr['allowance']);

			$arr['basic_salary'] = addslashes($data['basic_salary']);

			$arr['housing'] = addslashes($data['housing']);

			$arr['transport'] = addslashes($data['transport']);

			$arr['meal'] = addslashes($data['meal']);

			$arr['entertainment'] = addslashes($data['entertainment']);

			$arr['internet'] = addslashes($data['internet']);

			$arr['loan'] = addslashes($data['loan']);
			$loan = number_format($arr['loan']);

			$arr['fees'] = addslashes($data['fees']);
			$fee = number_format($arr['fees']);

			$arr['rent'] = addslashes($data['rent']);
			$rent = number_format($arr['rent']);

			$arr['upfront'] = addslashes($data['upfront']);
			$upfront = number_format($arr['upfront']);

			$arr['tax'] = addslashes($data['tax']);
			$tax = number_format($arr['tax']);

			$arr['pension'] = addslashes($data['pension']);
			$pension = number_format($arr['pension']);

			// $arr['pension_contribution'] = addslashes($data['pension_contribution']);
			// $pension_contribution = number_format($arr['pension_contribution']);

			$arr['netpay'] = addslashes($data['netpay']);
			$netpay = number_format($arr['netpay']);

			$arr['payroll_session'] = addslashes($data['payroll_session']);
			$sess = $arr['payroll_session'];

			$arr['leave_bonus'] = addslashes($data['leave_bonus']);
			$leave_bonus = number_format($arr['leave_bonus']);

			$arr['special_deduction'] = addslashes($data['special_deduction']);

			$special_deduction = number_format($arr['special_deduction']);

			$total_deduct = 0;

			$total_ded = $arr['loan'] + $arr['fees'] + $arr['rent'] + $arr['upfront'] + $arr['tax'] + $arr['pension'];

			$total_deduct = number_format($total_ded);

			date_default_timezone_set('Africa/Lagos');

			$rawdate = htmlentities($data['payroll_month']);

	  		$arr['payroll_month'] = date('Y-m-d', strtotime($rawdate));

	  		$mth = date('Y-m-d', strtotime($rawdate));
	  		
	  		$month = date('M, Y', strtotime($rawdate));


	  		$querys = "SELECT * FROM payroll WHERE email = '$email' AND payroll_month = '$mth' AND payroll_session = '$sess' AND status = 'Sent' LIMIT 1 ";
			$results = $this->con->select($querys);

			

	  		if ($rawdate == "" || $arr['payroll_session'] == "") {?>

            <script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                }
            </script>
            <?php
	  			return "<div class='alert alert-danger'>Fields Required!</div>";
	  		}
	  		if($results){?>

	            <script>
	                if ( window.history.replaceState ) {
	                    window.history.replaceState( null, null, window.location.href );
	                }
	            </script>
	            <?php
				return "<div class='alert alert-danger'>Payslip Already Sent to Employee!</div>";
            }else{

				$query = "INSERT INTO payroll (staff_id,email,surname,firstname,middle,designation,school,salary,allowance,basic_salary,housing,transport,meal,entertainment,internet,loan,fees,rent,upfront,tax,pension,leave_bonus,special_deduction,netpay,payroll_month,payroll_session,status,role) VALUES(:staffid,:email,:surname,:firstname,:middle,:designation,:school,:salary,:allowance,:basic_salary,:housing,:transport,:meal,:entertainment,:internet,:loan,:fees,:rent,:upfront,:tax,:pension,:leave_bonus,:special_deduction,:netpay,:payroll_month,:payroll_session,'Unsent',:role)";
				$insert_row = $this->con->insert($query,$arr);


				if ($insert_row) {?>

	            <script>
	                if ( window.history.replaceState ) {
	                    window.history.replaceState( null, null, window.location.href );
	                }
	            </script>
	            <?php

	            	$_SESSION['message'] = "<div class='alert alert-success text-white'>Payroll Added Successfully!</div>";
					header("Location: /a1zmhdssxs/add-employee-payroll");

				}else{?>

	            <script>
	                if ( window.history.replaceState ) {
	                    window.history.replaceState( null, null, window.location.href );
	                }
	            </script>
	            <?php
					return "<div class='alert alert-danger text-white'>Error</div>";
				}
			}
			

		}

		public function getPayroll(){

			// $arr = array();
			// $arr['dates'] = date('Y-m-d');
			$month = date('m');
			$year = date('Y');

			$search = $_GET['search'] ?? null;

			if($search){

				$styear = date("Y", strtotime($search));
				$stmonth = date("m", strtotime($search));

				$query = "SELECT * FROM payroll WHERE YEAR(payroll_month) = '$styear' AND MONTH(payroll_month) = '$stmonth' AND status = 'Unsent' ORDER BY payroll_id DESC ";
				return $this->con->select($query);

			}

			$query = "SELECT * FROM payroll WHERE MONTH(payroll_month) = '$month' AND YEAR(payroll_month) = '$year' AND status = 'Unsent' ORDER BY payroll_id DESC ";
			return $this->con->select($query);
		}

		public function getPayrolls(){

			// $arr = array();
			// $arr['dates'] = date('Y-m-d');
			$month = date('m');
			$year = date('Y');

			$search = $_GET['search'] ?? null;

			$years = $_GET['year'] ?? null;

			$school = $_GET['school'] ?? null;
			
			if(isset($school) && isset($search)){

				$styear = date("Y", strtotime($search));
				$stmonth = date("m", strtotime($search));

				$query = "SELECT * FROM payroll WHERE school = '$school' AND YEAR(payroll_month) = '$styear' AND MONTH(payroll_month) = '$stmonth' ORDER BY payroll_id DESC ";
				return $this->con->select($query);

			}

			if(isset($school)){

				$querys = "SELECT * FROM payroll WHERE school = '$school' ORDER BY payroll_id DESC ";
				return $this->con->select($querys);

			}

			if(isset($search)){

				$styear = date("Y", strtotime($search));
				$stmonth = date("m", strtotime($search));

				$query = "SELECT * FROM payroll WHERE YEAR(payroll_month) = '$styear' AND MONTH(payroll_month) = '$stmonth' ORDER BY payroll_id DESC ";
				return $this->con->select($query);

			}

			if($years){

				$query = "SELECT * FROM payroll WHERE YEAR(payroll_month) = '$years' ORDER BY payroll_id DESC ";
				return $this->con->select($query);

			}

			$query = "SELECT * FROM payroll WHERE MONTH(payroll_month) = '$month' AND YEAR(payroll_month) = '$year' ORDER BY payroll_id DESC ";
			return $this->con->select($query);
		}

		public function getEmployeePayroll($edit){

			$query = "SELECT * FROM payroll WHERE staff_id = '$edit' ";
			return $this->con->select($query);
		}

		public function getEmployeeID($id){
	    	$arr = array();
	    	$arr['id'] = $id;

	        $query = "SELECT * FROM employee WHERE staff_id = :id ";
	        return $this->con->select($query,$arr);
	        
	    }

	    public function editEmployee($data, $file, $id){
	        $arr = array();

	        $arr['id'] = $id;

			$arr['staffid'] = addslashes($data['staff_id']);
			$staffid = $arr['staffid'];

			$arr['surname'] = addslashes($data['surname']);

			$arr['firstname'] = addslashes($data['firstname']);

			$arr['middle'] = addslashes($data['middle']);

			$arr['addr'] = addslashes($data['addr']);

			$arr['email'] = addslashes($data['email']);

			$arr['phone'] = addslashes($data['phone']);

			$arr['school'] = addslashes($data['school']);

			$arr['designation'] = addslashes($data['designation']);

			$arr['nxtofkin'] = addslashes($data['nxtofkin']);

			$arr['nxtphone'] = addslashes($data['nxtphone']);

			$arr['nxtaddr'] = addslashes($data['nxtaddr']);

			$arr['salary'] = addslashes($data['salary']);

			$arr['status'] = addslashes($data['status']);

			$arr['basic_salary'] = addslashes($data['basic_salary']);

			$arr['allowance'] = addslashes($data['allowance']);

			$arr['housing'] = addslashes($data['housing']);

			$arr['transport'] = addslashes($data['transport']);

			$arr['meal'] = addslashes($data['meal']);

			$arr['entertainment'] = addslashes($data['entertainment']);

			$arr['internet'] = addslashes($data['internet']);
			date_default_timezone_set('Africa/Lagos');
			$rawdate = htmlentities($data['yearjoined']);
	  		$arr['yearjoined'] = date('Y-m-d', strtotime($rawdate));

	        
            $query ="UPDATE employee 
            SET
            staff_id = :staffid,
            surname = :surname,
            firstname = :firstname,
            middle = :middle,
            addr = :addr,
            email = :email,
            phone = :phone,
            school = :school,
            designation = :designation,
            nxtofkin = :nxtofkin,
            nxtphone = :nxtphone,
            nxtaddr = :nxtaddr,
            basic_salary = :basic_salary,
            housing = :housing,
            transport = :transport,
            meal = :meal,
            entertainment = :entertainment,
            internet = :internet,
            salary = :salary,
            allowance = :allowance,
            status = :status,
            yearjoined= :yearjoined

            WHERE staff_id = :id ";

            $update_row = $this->con->update($query, $arr);

            if($update_row){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
                return "<div class='alert alert-success text-white'>Employee Data Updated Successfully <a style='text-decoration: none;color: #fff;' href='/a1zmhdssxs/employee' class='btn btn-primary btn-sm'>Go back</a></div>";
            }else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
                return "<div class='alert alert-danger text-white'>Error Updating Data.</div>";
            }
        	
	        
	    }

	    public function delStaff($id){

	    	$arr = array();
	    	$arr['id'] = $id;

	        $query = "SELECT * FROM employee WHERE staff_id = :id ";
	        $getData = $this->con->select($query,$arr);
	        if($getData){
	            foreach($getData as $delImg){
	                unlink($delImg['image']);
	            }
	                
	        }
	    	

	        $delquery = "DELETE FROM employee WHERE staff_id = :id LIMIT 1 ";
	        $deldata = $this->con->delete($delquery, $arr);
	        if($deldata){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-success text-white'>Employee Deleted Successfully.</div>";
	            
	        }else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-danger text-white'>Employee Not Deleted.</div>";
	        } 
	    }

	    public function delRent($id){

	    	$arr = array();
	    	$arr['id'] = $id;

	        $delquery = "DELETE FROM rent_deduct WHERE staff_id = :id LIMIT 1 ";
	        $deldata = $this->con->delete($delquery, $arr);
	        if($deldata){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-success text-white'>Rent Deduction Deleted Successfully.</div>";
	            
	        }else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-danger text-white'>Rent Deduction Not Deleted.</div>";
	        } 
	    }

	    public function delLoan($id){

	    	$arr = array();
	    	$arr['id'] = $id;

	        $delquery = "DELETE FROM loan_deduct WHERE staff_id = :id LIMIT 1 ";
	        $deldata = $this->con->delete($delquery, $arr);
	        if($deldata){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-success text-white'>Loan Deduction Deleted Successfully.</div>";
	            
	        }else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-danger text-white'>Loan Deduction Not Deleted.</div>";
	        } 
	    }

	    public function delFees($id){

	    	$arr = array();
	    	$arr['id'] = $id;

	        $delquery = "DELETE FROM fees_deduct WHERE staff_id = :id LIMIT 1 ";
	        $deldata = $this->con->delete($delquery, $arr);
	        if($deldata){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-success text-white'>Fees Deduction Deleted Successfully.</div>";
	            
	        }else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-danger text-white'>Fees Deduction Not Deleted.</div>";
	        } 
	    }

	    public function delUpfront($id){

	    	$arr = array();
	    	$arr['id'] = $id;

	        $delquery = "DELETE FROM upfront_deduct WHERE staff_id = :id LIMIT 1 ";
	        $deldata = $this->con->delete($delquery, $arr);
	        if($deldata){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-success text-white'>Upfront Deduction Deleted Successfully.</div>";
	            
	        }else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-danger text-white'>Upfront Deduction Not Deleted.</div>";
	        } 
	    }

	    public function delTax($id){

	    	$arr = array();
	    	$arr['id'] = $id;

	        $delquery = "DELETE FROM tax_deduct WHERE staff_id = :id LIMIT 1 ";
	        $deldata = $this->con->delete($delquery, $arr);
	        if($deldata){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-success text-white'>Tax Deduction Deleted Successfully.</div>";
	            
	        }else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-danger text-white'>Tax Deduction Not Deleted.</div>";
	        } 
	    }

	    public function delPension($id){

	    	$arr = array();
	    	$arr['id'] = $id;

	        $delquery = "DELETE FROM pension_deduct WHERE staff_id = :id LIMIT 1 ";
	        $deldata = $this->con->delete($delquery, $arr);
	        if($deldata){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-success text-white'>Pension Deduction Deleted Successfully.</div>";
	            
	        }else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-danger text-white'>Pension Deduction Not Deleted.</div>";
	        } 
	    }

	    public function changePass($data){  

            $current_pass = $this->format->validation(md5($data['cpass']));
        	$new_pass = $this->format->validation(md5($data['npass']));
        	$confirm_pass = $this->format->validation(md5($data['copass']));          

            

            $id = Session::get("account_id");

            $query = "SELECT password FROM account_officer WHERE account_id = '{$id}' ";
            $result = $this->con->select($query);
            if($result){
                foreach($result as $value){
                    $oldpassword = $value['password'];
                }
            }
            

            if($current_pass == $oldpassword){
                if ($new_pass == $confirm_pass) {


                    $query = "UPDATE account_officer SET 
                    password = '$new_pass' 

                    WHERE account_id = '$id' ";

                    $update_query = $this->con->update($query);
                    if($update_query){
                        return "<div class='alert alert-success'>Password Changed Successfully.</div>";
                    }else{
                        return "<div class='alert alert-danger'>Password Change Not Successful.</div>";
                    }

                }else{
                    return "<div class='alert alert-danger'>New & Confirm Password Don't Match.</div>";
                }

            }else{
                return "<div class='alert alert-danger'>Old Password Don't Match.</div>";
            }


        }

        public function numRowEmployees(){
	        $query = "SELECT count(id) as total FROM employee ";
	        $myemployee = $this->con->select($query);
			
	        if($myemployee){
	            $totalemployee = $myemployee[0]['total'];
	            echo $totalemployee;
	        }elseif (empty($myemployee)) {
	            echo 0;
	        }           
	                           
	    }

	    public function sendPayroll(){

	    	$month = date('m');
			$year = date('Y');

			$query = "SELECT * FROM payroll WHERE MONTH(payroll_month) = '$month' AND YEAR(payroll_month) = '$year' AND status = 'Unsent' ";
			$result = $this->con->select($query);

			if ($result) {

				require "Mail/phpmailer/PHPMailerAutoload.php";

				foreach($result as $row){

					$school = "OGUNLADE SCHOOLS";
					$address = "14 OGUNFUNMI STREET OFF AKOBI CRESCENT, SURULERE, LAGOS";
					$num = "+ 234 809 518 7799";

					$staffid = $row['staff_id'];

					$email = $row['email'];

					$sname = $row['surname'];

					$fname = $row['firstname'];

					$mname = $row['middle'];

					$dsg = $row['designation'];

					$sch = $row['school'];

					$role = $row['role'];

					$gross = number_format($row['salary']);

					$allowance = number_format($row['allowance']);

					$basic_salary = number_format($row['basic_salary']);

					$housing = number_format($row['housing']);

					$transport = number_format($row['transport']);

					$meal = number_format($row['meal']);

					$entertainment = number_format($row['entertainment']);

					$internet = number_format($row['internet']);

					$loan = number_format($row['loan']);

					$fee = number_format($row['fees']);

					$rent = number_format($row['rent']);

					$upfront = number_format($row['upfront']);

					$tax = number_format($row['tax']);

					$pension = number_format($row['pension']);

					$special_deduction = number_format($row['special_deduction']);

					// $pension_contribution = number_format($row['pension_contribution']);

					$leave_bonus = number_format($row['leave_bonus']);

					$netpay = number_format($row['netpay']);

					$sess = $row['payroll_session'];

					$total_deduct = 0;

					$total_ded = $row['loan'] + $row['fees'] + $row['rent'] + $row['upfront'] + $row['tax'] + $row['pension'];

					$total_deduct = number_format($total_ded);

					date_default_timezone_set('Africa/Lagos');

					$rawdate = htmlentities($row['payroll_month']);

			  		$payroll_month = date('Y-m-d', strtotime($rawdate));
			  		$month = date('M, Y', strtotime($rawdate));

		            $mail = new PHPMailer;

		            $mail->isSMTP();
		            $mail->Host='server274.web-hosting.com';
		            $mail->Port=465;
		            $mail->SMTPAuth=true;
		            $mail->SMTPSecure='ssl';

		            $mail->Username='payroll@ogunladeschools.com';
		            $mail->Password='NI.bdmX9P&hy';

		            $mail->setFrom('payroll@ogunladeschools.com', ' Payslip');

		            $mail->addAddress($email);

		            $mail->isHTML(true);
		            $mail->Subject="Your Monthly Payment Slip";
		            $mail->Body="<!DOCTYPE html>
		                <html lang='en'>
		                <head>
		                    <meta charset='UTF-8'>
		                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
		                    <title></title>

		                    <style>

		                        h1,h2,h3,h4,h5,h6{
								  margin: 0;
								  padding: 0;
								}
								p{
								  margin: 0;
								  padding: 0;
								}

								.brand-section{
								 background-color: #013891;
								 padding: 10px 40px;
								}
								.brand-section h1{
								  font-size: 28px;
								  color: #fff;
								}
								.brand-section p{
								  padding: 10px 0 0 0;
								  color: #fff;
								}

								.body-section .row{
								  display: flex;
								  flex-wrap: wrap;
								}
								.body-section .col-6{
								  width: 50%;
								  flex: 0 0 auto;
								}
								.body-section .text-white{
								  color: #fff;
								}
								.company-details{
								  float: right;
								  text-align: right;
								  margin: 20px 0 0 0;
								}
								.body-section{
								  padding: 16px;
								  border: 1px solid gray;
								}
								.heading{
								  font-size: 16px;
								  margin-bottom: 08px;
								}
								.body-section .sub-heading{
								  color: #262626;
								  margin-bottom: 05px;
								}
								.body-section table{
								  background-color: #fff;
								  width: 100%;
								  border-collapse: collapse;
								}
								.body-section table thead tr{
								  border: 1px solid #111;
								  background-color: #000;
								  color: #fff;
								}
								.body-section table td {
								  vertical-align: middle !important;
								  text-align: center;
								}
								.body-section table th, table td {
								  padding-top: 08px;
								  padding-bottom: 08px;
								}

								.body-section .table-bordered td, .table-bordered th {
								  border: 1px solid #dee2e6;
								}
								.body-section .text-right{
								  text-align: end;
								}
								.body-section .w-20{
								  width: 50%;
								}
								.body-section .float-right{
								  float: right;
								}

		                    </style>
		                </head>
		                <body>
		                    
		                    <div class='brand-section'>
		                        <div class='row'>
		                            <div class='col-6'>
		                            	<img src='/img/logo.png' width='180px' height='50px' />
		                                <h1 class='text-white'>$school</h1>
		                                <p class='text-white'>$address</p>
		                                <p class='text-white'>$num</p>
		                            </div>
		                        </div>
		                    </div>

		                    <div class='body-section'>
		                        <div class='row'>
		                            <div class='col-6'>
		                                <h2 class='heading'>Month: $month</h2>
		                                <h2 class='heading'>Session: $sess </p>
		                                <h2 class='heading'>School: $sch </p>
		                                
		                            </div>
		                            <div class='col-6'>
		                                <p class='sub-heading'><strong>STAFF ID</strong>: $staffid</p>
		                                <p class='sub-heading'><strong>SURNAME</strong>:  $sname</p>
		                                <p class='sub-heading'><strong>FIRST NAME</strong>:  $fname</p>
		                                <p class='sub-heading'><strong>MIDDLE NAME</strong>:  $mname</p>
		                                <p class='sub-heading'><strong>DESIGNATION</strong>:  $dsg</p>
		                            </div>
		                        </div>
		                    </div>

		                    <div class='body-section'>
		                        <br>
		                        <table class='table-bordered text-center'>
		                            <thead>
		                                <tr>
		                                    <th class='w-20'>DEDUCTIONS</th>
		                                    <th class='w-20'>AMOUNT</th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <tr>
		                                    <td>LOAN</td>
		                                    <td>&#8358;$loan</td>
		                                </tr>
		                                <tr>
		                                    <td>SCHOOL FEES</td>
		                                    <td>&#8358;$fee</td>
		                                </tr>
		                                <tr>
		                                    <td>RENT</td>
		                                    <td>&#8358;$rent</td>
		                                </tr>
		                                <tr>
		                                    <td>UPFRONT</td>
		                                    <td>&#8358;$upfront</td>
		                                </tr>
		                                <tr>
		                                    <td>TAX</td>
		                                    <td>&#8358;$tax</td>
		                                </tr>
		                                <tr>
		                                    <td>PENSION</td>
		                                    <td>&#8358;$pension</td>
		                                </tr>
		                                    <td>SPECIAL DEDUCTION</td>
		                                    <td>&#8358;$special_deduction</td>
		                                </tr>
		                                <tr>
		                                    <td></td>
		                                    <td></td>
		                                </tr>
		                                
		                                <tr>
		                                	<td class='text-right'>Leave Bonus ($role)</td>
		                                	<td> &#8358;$leave_bonus</td>
		                                </tr>
		                                <tr>
		                                    <td class='text-right'>Basic Salary</td>
		                                    <td> &#8358;$basic_salary</td>
		                                </tr>
		                                <tr>
		                                    <td class='text-right'>Housing</td>
		                                    <td> &#8358;$housing</td>
		                                </tr>
		                                <tr>
		                                    <td class='text-right'>Transport</td>
		                                    <td> &#8358;$transport</td>
		                                </tr>
		                                <tr>
		                                    <td class='text-right'>Meal</td>
		                                    <td> &#8358;$meal</td>
		                                </tr>
		                                <tr>
		                                    <td class='text-right'>Entertainment</td>
		                                    <td> &#8358;$entertainment</td>
		                                </tr>
		                                <tr>
		                                    <td class='text-right'>Internet</td>
		                                    <td> &#8358;$internet</td>
		                                </tr>
		                                <tr>
		                                    <td class='text-right'>Gross Salary</td>
		                                    <td> &#8358;$gross</td>
		                                </tr>
		                                <tr>
		                                    <td class='text-right'>Allowance</td>
		                                    <td> &#8358;$allowance</td>
		                                </tr>
		                                <tr>
		                                    <td class='text-right'>Total Deductions</td>
		                                    <td> &#8358;$total_deduct</td>
		                                </tr>
		                                <tr>
		                                    <td class='text-right'>Net Pay</td>
		                                    <td> &#8358;$netpay</td>
		                                </tr>
		                            </tbody>
		                        </table>
		                        <br>
		                        
		                    </div>


		                </body>
		                </html>
		            ";
		            if(!$mail->send()){
		                ?>
		                    <script>
		                        alert("<?php echo "Email not sent "?>");
		                    </script>
		                <?php
		            }else{?>

		                <script>
		                    if ( window.history.replaceState ) {
		                        window.history.replaceState( null, null, window.location.href );
		                    }
		                </script>
		                
		                <script>
		                        
		                </script>

		                <?php
		                $updatePay = "UPDATE payroll SET status = 'Sent' WHERE email = '$email' ";
					    $this->con->update($updatePay);
		            }

				}

				return "<div class='alert alert-success' style='width: 100px;padding: 8px !important;text-align: center !important;'>Sent</div>";
				
			}else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
				return "<div class='alert alert-danger>Payroll Already Sent to Employee!</div>";
			}

	    }

	    public function editPayroll($data, $edit){
	        $arr = array();

	        $arr['edit'] = $edit;

			date_default_timezone_set('Africa/Lagos');

			$rawdate = htmlentities($data['payroll_month']);

	  		$arr['payroll_month'] = date('Y-m-d', strtotime($rawdate));

			$arr['payroll_session'] = addslashes($data['payroll_session']);

			$arr['school'] = addslashes($data['school']);

	        
            $query ="UPDATE payroll 
            SET
            payroll_month = :payroll_month,
            payroll_session = :payroll_session,
            school = :school

            WHERE staff_id = :edit ";

            $update_row = $this->con->update($query, $arr);

            if($update_row){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
                return "<div class='alert alert-success text-white'>Updated Successfully.</div>";
            }else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
                return "<div class='alert alert-danger text-white'>Error Updating Data.</div>";
            }
        	
	        
	    }

	    public function penContri($data){

			$arr = array();
			$arr['staffid'] = addslashes($data['staff_id']);
			$staffid = $arr['staffid'];

			$arr['fullname'] = addslashes($data['fullname']);
			$fname = $arr['fullname'];

			$arr['amounts'] = addslashes($data['amounts']);
			$amount = $arr['amounts'];

			if ($arr['staffid'] == "" || $arr['fullname'] == "" || $arr['amounts'] == ""){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php

				return "<div class='alert alert-danger text-white' style='font-size: 15px;'>Field cannot be empty</div>";

			}else{

				$query = "INSERT INTO pension_contribution (staff_id,fullname,amounts) VALUES(:staffid,:fullname,:amounts)";
				$insert_row = $this->con->insert($query,$arr);


				if ($insert_row) {?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-success text-white'>Added Successfully!</div>";

				}else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-danger text-white'>Error</div>";
				}
			}
		}

		public function getPenContri(){

			$query = "SELECT * FROM pension_contribution ORDER BY id DESC ";
			return $this->con->select($query);
		}

	    public function getPenReport(){

			$query = "SELECT * FROM pension_contribution LEFT JOIN pension_deduct ON pension_contribution.staff_id = pension_deduct.staff_id ORDER BY id DESC ";
			return $this->con->select($query);
		}

		public function specialDeduct($data){

			$arr = array();
			$arr['staffid'] = addslashes($data['staff_id']);
			$staffid = $arr['staffid'];

			$arr['fullname'] = addslashes($data['fullname']);
			$fname = $arr['fullname'];

			$arr['amount'] = addslashes($data['amount']);
			$amount = $arr['amount'];
			date_default_timezone_set('Africa/Lagos');

			$date_from = htmlentities($data['date_from']);
  			$arr['date_from'] = date('Y-m-d', strtotime($date_from));

  			$date_to = htmlentities($data['date_to']);
  			$arr['date_to'] = date('Y-m-d', strtotime($date_to));

			if ($arr['staffid'] == "" || $arr['fullname'] == "" || $arr['amount'] == "" || $arr['date_from'] == "" || $arr['date_to'] == ""){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php

				return "<div class='alert alert-danger text-white' style='font-size: 15px;'>Field cannot be empty</div>";

			}else{

				$query = "INSERT INTO special_deduction (staff_id,fullname,amount,date_from,date_to) VALUES(:staffid,:fullname,:amount,:date_from,:date_to)";
				$insert_row = $this->con->insert($query,$arr);


				if ($insert_row) {?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-success text-white'>Added Successfully!</div>";

				}else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
					return "<div class='alert alert-danger text-white'>Error</div>";
				}
			}
		}

		public function getSpecialDeduct(){

			$query = "SELECT * FROM special_deduction ORDER BY id DESC ";
			return $this->con->select($query);
		}

		public function getSpecialDed($add){
	    	$arr = array();
	    	$arr['add'] = $add;
	    	$arr['dates'] = date('Y-m-d');

	        $query = "SELECT * FROM special_deduction WHERE staff_id = :add AND date_to >= :dates ";
	        return $this->con->select($query,$arr);
	        
	    }
	    
	    public function delSpecialDed($id){

	    	$arr = array();
	    	$arr['id'] = $id;

	        $delquery = "DELETE FROM special_deduction WHERE staff_id = :id LIMIT 1 ";
	        $deldata = $this->con->delete($delquery, $arr);
	        if($deldata){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-success text-white'>Special Deduction Deleted Successfully.</div>";
	            
	        }else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-danger text-white'>Special Deduction Not Deleted.</div>";
	        } 
	    }
	    
	    public function editImage($file, $id){
			$arr = array();

	        $arr['id'] = $id;

	        $queryy = "SELECT * FROM employee WHERE staff_id = '$id' ";
	        $result = $this->con->select($queryy);

	        if ($result) {
	        	
	        	foreach($result as $value){
                    $staffid = $value['staff_id'];
                }

	        }

	        $staffid = isset($staffid) ? $staffid: '';

			$permit = array('jpg','jpeg','png');
	        $file_name = $file['image']['name'];
	        $file_size = $file['image']['size'];
	        $file_temp = $file['image']['tmp_name'];


	        if(empty($file_name)){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	        	return "<div class='alert alert-danger text-white' style='font-size: 16px;'>Please choose an image</div>";
	        	
	        }else{
	        	$sourceProperties = getimagesize($file_temp);
	        }

	        

	        $folder = "employeeImg/$staffid/";

	        if(!file_exists($folder)) {
	        	mkdir($folder, 0777, true);
	        }

	        $div = explode('.', $file_name);
	        $file_ext = strtolower(end($div));


	        if(empty($file_name)){
	        	$arr['image'] = '';
	        }else{
	        	$arr['image'] = $folder . substr(md5(time()), 0, 10).'.'.$file_ext;
	        }


	        if(empty($file_name)){
	        	$uploadImageType = '';
	        	$sourceImageWidth = '';
	        	$sourceImageHeight = '';
	        }else{
	        	$uploadImageType = $sourceProperties[2];
	        	$sourceImageWidth = $sourceProperties[0];
	        	$sourceImageHeight = $sourceProperties[1];
	        }

	        switch ($uploadImageType) {
	            case IMAGETYPE_JPEG:
	                $resourceType = imagecreatefromjpeg($file_temp); 
	                $imageLayer = $this->format->resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,"300");
	                imagejpeg($imageLayer,$arr['image']);
	                break;
	 
	            case IMAGETYPE_GIF:
	                $resourceType = imagecreatefromgif($file_temp); 
	                $imageLayer = $this->format->resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,"300");
	                imagegif($imageLayer,$arr['image']);
	                break;
	 
	            case IMAGETYPE_PNG:
	                $resourceType = imagecreatefrompng($file_temp); 
	                $imageLayer = $this->format->resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,"300");
	                imagepng($imageLayer,$arr['image']);
	                break;
	 
	            default:
	                $imageProcess = 0;
	                break;
	        }

	        if($file_size > 5054589){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	        	return "<div class='alert alert-danger text-white' style='font-size: 14px;'>Image size should be less than 1MB.</div>";
	        }

			if(in_array($file_ext, $permit) === false && !empty($file_name)){?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
	            return "<div class='alert alert-danger text-white' style='font-size: 14px;'>You can upload only ".implode(', ', $permit)."</div>";
	        }else{

	        	move_uploaded_file($file_ext, $arr['image']);


	        	$query ="UPDATE employee 
	            SET
	            image = :image
	            WHERE staff_id = :id ";

	            $update_row = $this->con->update($query, $arr);

	            if($update_row){?>

	                <script>
	                    if ( window.history.replaceState ) {
	                        window.history.replaceState( null, null, window.location.href );
	                    }
	                </script>
	                <?php
	                return "<div class='alert alert-success text-white'>Image Updated Successfully.</div>";
	            }else{?>

	                <script>
	                    if ( window.history.replaceState ) {
	                        window.history.replaceState( null, null, window.location.href );
	                    }
	                </script>
	                <?php
	                return "<div class='alert alert-danger text-white'>Error Updating Image.</div>";
	            }
	        }

		}
		
		public function rentEdit($data, $id){

			$arr = array();

	        $arr['id'] = $id;
	        $arr['amount'] = addslashes($data['amount']);

	        $query = " UPDATE rent_deduct 
            SET
            amount = :amount
            WHERE staff_id = :id ";

            $update_rent = $this->con->update($query, $arr);

            if($update_rent){

            	$_SESSION['messages'] = "<div class='alert alert-success text-white'>Updated Successfully</div>";
					header("Location: /a1zmhdssxs/add-rent");

            }else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
                return "<div class='alert alert-danger text-white'>Error Updating.</div>";
            }
		}

		public function getRentDeductID($id){

			$query = "SELECT * FROM rent_deduct WHERE staff_id = '$id' ";
			return $this->con->select($query);
		}
		
		public function taxEdit($data, $id){

			$arr = array();

	        $arr['id'] = $id;
	        $arr['amount'] = addslashes($data['amount']);

	        $query = " UPDATE tax_deduct 
            SET
            amount = :amount
            WHERE staff_id = :id ";

            $update_rent = $this->con->update($query, $arr);

            if($update_rent){

            	$_SESSION['tax_message'] = "<div class='alert alert-success text-white'>Updated Successfully</div>";
					header("Location: /a1zmhdssxs/add-tax");

            }else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
                return "<div class='alert alert-danger text-white'>Error Updating.</div>";
            }
		}

		public function getTaxDeductID($id){

			$query = "SELECT * FROM tax_deduct WHERE staff_id = '$id' ";
			return $this->con->select($query);
		}
		
		public function leaveEdit($data, $id){

			$arr = array();

	        $arr['id'] = $id;
	        $arr['amount'] = addslashes($data['amount']);

	        $query = " UPDATE leave_bonus 
            SET
            amount = :amount
            WHERE staff_id = :id ";

            $update_rent = $this->con->update($query, $arr);

            if($update_rent){

            	$_SESSION['leave_message'] = "<div class='alert alert-success text-white'>Updated Successfully</div>";
					header("Location: /a1zmhdssxs/leave-bonus");

            }else{?>

                <script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
                <?php
                return "<div class='alert alert-danger text-white'>Error Updating.</div>";
            }
		}

		public function getLeaveDeductID($id){

			$query = "SELECT * FROM leave_bonus WHERE staff_id = '$id' ";
			return $this->con->select($query);
		}

	    
	}
























