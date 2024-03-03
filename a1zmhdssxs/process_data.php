<?php 
	
	//$q = $_GET['q'];

	//echo "q = $q";
	
	if (isset($_GET['q'])) {


		session_start();
		//session_destroy();

		$db['db_host'] = "localhost";
		$db['db_user'] = "ogunxatx_root";
		$db['db_pass'] = "#=N32f5g%C[!";
		$db['db_name'] = "ogunxatx_payroll";

		foreach($db as $key => $value){
		    define(strtoupper($key), $value);
		}

		$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		$query = "SET NAMES utf8";
		mysqli_query($connect, $query);

		if(!$connect) {
		    echo "We are not connected";
		}


		$q = $_GET['q'];

		$stmt = $connect->prepare("SELECT * FROM employee WHERE surname = '$q' ");

    	$stmt->execute();

    	$result = $stmt->get_result();
        
    	$fname = "";
    	$lname = "";

    	while($row = $result->fetch_assoc()):

    		$fname = $row['firstname'];

    		$lname = $row['surname'];

    	endwhile; 

    	echo "$lname $fname";
	
	}
	
	if (isset($_GET['qq'])) {


		session_start();
		//session_destroy();

		$db['db_host'] = "localhost";
		$db['db_user'] = "ogunxatx_root";
		$db['db_pass'] = "#=N32f5g%C[!";
		$db['db_name'] = "ogunxatx_payroll";

		foreach($db as $key => $value){
		    define(strtoupper($key), $value);
		}

		$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		$query = "SET NAMES utf8";
		mysqli_query($connect, $query);

		if(!$connect) {
		    echo "We are not connected";
		}


		$qq = $_GET['qq'];

		$stmt = $connect->prepare("SELECT * FROM employee WHERE surname = '$qq' ");

    	$stmt->execute();

    	$result = $stmt->get_result();
        
        $staffid = "";

    	while($row = $result->fetch_assoc()):
    	    
    	    $staffid = $row['staff_id'];

    	endwhile; 

    	echo "$staffid";
	
	}
	


