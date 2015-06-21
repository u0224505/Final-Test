<?php
	//更新pwd
	header("Content-Type:text/html; charset=utf-8");
	session_start();
	include "connect.php";
	$_SESSION['INEWPWD'] = trim($_POST['Inewpwd']);
	$_SESSION['IOLDPWD'] = trim($_POST['Ioldpwd']);

	$username = $_SESSION['IUSERNAME'];
	$password = $_SESSION['IPASSWORD'];
	$Inewpwd = $_SESSION['INEWPWD'];
	$Ioldpwd = $_SESSION['IOLDPWD'];

	$response = 1;

	$connect = sqlsrv_query($conn, "SELECT * FROM Account WHERE username='".$username."';");

	if ($connect == false){
		echo ("Can't find table!");
		$response = 0;
	}
	else{
		while ($row = sqlsrv_fetch_array($connect)){
			//兩個條件一定要放一起，若分二個if他會無法判斷....
			if(trim($row['username']) == $username && trim($row['password']) == $Ioldpwd){
				$update = sqlsrv_query($conn, "UPDATE Account SET password=('".$Inewpwd."') WHERE username=('".$username."');");
				break;
			}
			else{
				$response = 0;
			}
		}

	}

	echo $response;
	unset($_SESSION['INEWPWD']);
	unset($_SESSION['IOLDPWD']);
	sqlsrv_free_stmt($connect);
	sqlsrv_close($conn);
?>