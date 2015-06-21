<?php
	header("Content-Type:text/html; charset=utf-8");
	session_start();
	include 'connect.php';
	include 'get ip.php';
	$table = "Administrator";	
	$_SESSION['TABLE'] = $table;
	$_SESSION['IUSERNAME'] = trim($_POST['Iusername']);
	$_SESSION['IPASSWORD'] = trim($_POST['Ipassword']);
	$_SESSION['ITIME'] = trim($_POST['Itime']);

	$username = trim($_POST['Iusername']);
	$password = trim($_POST['Ipassword']);
	$time = $_SESSION['ITIME'];

	$connect = sqlsrv_query($conn, "SELECT * FROM ".$table);
	$check = false;
	$response=0;

	if($connect == false){
		echo ("Can't find table!");
	}
	else{
		while($row = sqlsrv_fetch_array($connect)){
			if(trim($row['username']) == $username && trim($row['password']) == $password){
				$check = true;
				break;
			}
		}

		if($check == true){
			$searchid = sqlsrv_query($conn, "SELECT COUNT(id) FROM Admin_SignRecord");
			if($searchid != false){
				sqlsrv_free_stmt($searchid);
				$searchid = sqlsrv_query($conn, "SELECT id FROM SignRecord ORDER BY id DESC;");
				$row = sqlsrv_fetch_array($searchid);
				$id = (int)$row['id'] + 1;
				$signrecord = sqlsrv_query($conn, "INSERT INTO Admin_SignRecord (id, username, signintime, ip)
					VALUES ('".$id."', '".$username."', '".$time."', '".$myip."');");
				$response = 1;
				sqlsrv_free_stmt($searchid);
			}
			else{
				sqlsrv_free_stmt($searchid);
				$response = 0;
				break;
			}
			
		}
		else{
			$response = 0;
		}

	}

	echo $response;
	unset($_SESSION['IPASSWORD']);
	unset($_SESSION['TABLE']);
	unset($_SESSION['ITIME']);	
	sqlsrv_free_stmt($connect);
	sqlsrv_close($conn);

?>