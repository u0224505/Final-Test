<?php
	header("Content-Type:text/html; charset=utf-8");
	session_start();
	include "connect.php";
	$_SESSION['LIST'] = explode("     ", trim($_POST['list']));
	$response = 1;

	if(trim($_POST['list']) !== ""){
		for($i = 0; $i < count($_SESSION['LIST']); $i++){
			//則除所選擇的使用者，因為外來鍵已經設定成 重疊顯示(連鎖) 所以所有有關的資料列都會一起被刪除
			$connect = sqlsrv_query($conn, "DELETE FROM Account WHERE username='".$_SESSION['DELETELIST'][(int)$_SESSION['LIST'][$i]]."';");

			if($connect == false){
				$response = 0;
				sqlsrv_free_stmt($connect);
				break;
			}
			else{
				sqlsrv_free_stmt($connect);
			}
	
		}
	}
	else{
		$response = 2;
	}

	


	unset($_SESSION['DELETELIST']);
	unset($_SESSION['LIST']);
	sqlsrv_close($conn);

	echo $response;

?>