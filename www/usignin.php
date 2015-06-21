<?php
	header("Content-Type:text/html; charset=utf-8");
	session_start();
	include 'connect.php';
	include 'get ip.php';
	$table = "Account";	
	$_SESSION['TABLE'] = $table;
	$_SESSION['IUSERNAME'] = trim($_POST['Iusername']);
	$_SESSION['IPASSWORD'] = trim($_POST['Ipassword']);
	$_SESSION['ITIME'] = trim($_POST['Itime']);

	//若POST[]中的字沒有加上''則會出現 "Notice: Use of undefined constant......"警告
	$username = trim($_POST['Iusername']);
	$password = trim($_POST['Ipassword']);
	$time = $_SESSION['ITIME'];

	//sqlsrv_query(連結DB的參數(name、auucoun、password), SQL查詢語法)
	//.$table 的 . 表示連結符號的意思
	$connect = sqlsrv_query($conn, "SELECT * FROM ".$table);
	$check = false;
	$response=0;

	if($connect == false){
		echo ("Can't find table!");
	}
	else{
		//sqlsrv_fetch_array()：Returns a row as an array 將所查詢的結果每次讀一個row(列)
		while($row = sqlsrv_fetch_array($connect)){
			//將每一列讀進後，一列一列找，直到找到有符合的username、password為止
			if(trim($row['username']) == $username && trim($row['password']) == $password){
				$check = true;
				break;
			}
		}

		if($check == true){
			$searchid = sqlsrv_query($conn, "SELECT COUNT(id) FROM SignRecord;");
			if($searchid != false){
				sqlsrv_free_stmt($searchid);
				$searchid = sqlsrv_query($conn, "SELECT id FROM SignRecord ORDER BY id DESC;");
				$row = sqlsrv_fetch_array($searchid);
				$id = (int)$row['id'] + 1;
				$signrecord = sqlsrv_query($conn, "INSERT INTO SignRecord (id, username, signintime, ip)
					VALUES ('".$id."', '".$username."', '".$time."', '".$myip."');");
				sqlsrv_free_stmt($searchid);
				$response = 1;
			}
			else{
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
	//sqlsrv_free_stmt()釋放SQL的資源
	sqlsrv_free_stmt($connect);
	//sqlsrv_close() 關閉所占用的連線
	sqlsrv_close($conn);

?>