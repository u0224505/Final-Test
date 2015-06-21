<?php
	header("Content-Type:text/html; charset=utf-8");
	session_start();
	include "connect.php";
	include "get ip.php";
	$_SESSION['IUSERNAME'] = trim($_POST['Iusername']);
	$_SESSION['IPASSWORD'] = trim($_POST['Ipassword']);
	$_SESSION['REALNAME'] = trim($_POST['Irealname']);
	$_SESSION['STUDENTID'] = trim($_POST['Istudentid']);
	$_SESSION['EMAIL'] = trim($_POST['Iemail']);
	$_SESSION['IGENDER'] = trim($_POST['Igender']);
	$_SESSION['ITIME'] = trim($_POST['Itime']);
	$_SESSION['ITABLE'] = $_SESSION['IUSERNAME'];

	$table = $_SESSION['IUSERNAME'];
	$username = $_SESSION['IUSERNAME'];
	$password = $_SESSION['IPASSWORD'];
	$realname = $_SESSION['REALNAME'];
	$studentid = $_SESSION['STUDENTID'];
	$email = $_SESSION['EMAIL'];
	$gender = $_SESSION['IGENDER'];
	$time = $_SESSION['ITIME'];

	$response = 1;

	$connect = sqlsrv_query($conn, "SELECT * FROM Account");

	if ($connect == false){
		echo ("Can't find table!");
		$response = 0;
	}
	else{
		while ($row = sqlsrv_fetch_array($connect)){
			if(trim($row['username']) == $username){
				$response = 0;
				break;
			}
		}

		/*
			外部鍵
			1.外部鍵是一種限制，拿來表示要參照某表格中的某列，外部鍵所參照的欄位稱為父鍵，
			  其表格稱為父表格，而外部鍵所屬的表格稱為子表格
			2.父鍵的值必須為PRIMARY KEY 或UNIQUE
			3.外部鍵可設定連鎖更新、連鎖刪除，當父鍵的欄值有更動，或欄遭刪除，其對照的外部鍵也會一同變更
			4.注意：不可在刪除父表格前就刪除子表格
			
			create table 子Table名 (欄位名A 資料類型A, 欄位名B 資料類型B, foreign key (外部鍵欄位名) references 父Table名 ( 父鍵欄位名 )) 
			alter table 子Table名 addforeign key (外部鍵欄位名) references 父Table名 ( 父鍵欄位名 ) 
		*/

		if ($response == 1){
			//VALUES 裡面的值一定要用 '' 不能用 ""
			$account = sqlsrv_query($conn, "INSERT INTO Account (username, password)
				VALUES ('".$username."', '".$password."');");

			$information = sqlsrv_query($conn, "INSERT INTO Information (username, realname, studentid, email, gender)
				VALUES ('".$username."', N'".$realname."', '".$studentid."', '".$email."', '".$gender."');");

			if($information == true){
				//COUND(id) 表示尋找 id 這個欄位有幾個值
				$searchid = sqlsrv_query($conn, "SELECT COUNT(id) FROM SignRecord;");
				//因為查詢出來的資料為陣列，故要用sqlsrv_fetch_array()涵數儲存，因為查出來的只有一個數值，故index為0
				if($searchid != false){
					sqlsrv_free_stmt($searchid);
					$searchid = sqlsrv_query($conn, "SELECT id FROM SignRecord ORDER BY id DESC;");
					$row = sqlsrv_fetch_array($searchid);
					$id = (int)$row['id'] + 1;
					$signrecord = sqlsrv_query($conn, "INSERT INTO SignRecord (id, username, signintime, ip)
						VALUES ('".$id."', '".$username."', '".$time."', '".$myip."');");
					sqlsrv_free_stmt($searchid);
				}
				else{
					$response = 0;
					break;
				}
				
			}
			else{
				$delete = sqlsrv_query($conn, "DELETE FROM Account
					WHERE username='".$username."';");
			}
					

			if($account == false || $information == false || $signrecord == false){
				$response = 0;
			}
		}
	}

	echo $response;
	//將不用的session釋放掉
	unset($_SESSION['IPASSWORD']);
	unset($_SESSION['REALNAME']);
	unset($_SESSION['STUDENTID']);
	unset($_SESSION['EMAIL']);
	unset($_SESSION['IGENDER']);
	unset($_SESSION['ITABLE']);
	sqlsrv_free_stmt($connect);
	//sqlsrv_free_stmt($account);
	//sqlsrv_free_stmt($information);
	//sqlsrv_free_stmt($signrecord);
	sqlsrv_close($conn);
?>