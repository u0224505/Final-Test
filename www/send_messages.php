<?php
  header("Content-Type:text/html; charset=utf-8");
  include 'connect.php';
  session_start();
  $_SESSION['MESSAGES'] = trim($_POST['messages']);
  $_SESSION['TIME'] = trim($_POST['time']);
  $_SESSION['ID'] = trim($_POST['id']);

  $response = 1;


  $searchid = sqlsrv_query($conn, "SELECT COUNT(id) FROM Message;");

  if($searchid !== false){
    //先查出目前已經有發送幾則訊息了，再將此數加1，作為下一則messages的id
    sqlsrv_free_stmt($searchid);
    $searchid = sqlsrv_query($conn, "SELECT id FROM Message ORDER BY id DESC;");
    $row = sqlsrv_fetch_array($searchid);
    $id = (int)$row['id'] + 1;

    //"使用者(fromwhom)" 在 "幾點幾分(time)" 發送 "訊息(message)" 給 "他人(username)"
    //要查出我自己的"realname"在insert到message中，因為之後要顯示 XXX 說 XXX (time)
  	$connect = sqlsrv_query($conn, "INSERT INTO Message(id, username, message, time, fromwhom) 
  				VALUES ('".$id."', '".$_SESSION['RESULT_USERNAME'][$_SESSION['ID']]."', '".$_SESSION['MESSAGES']."', '".$_SESSION['TIME']."', 
  				(SELECT realname FROM Information WHERE username = '".$_SESSION['IUSERNAME']."'));");

    sqlsrv_free_stmt($searchid);

  	if($connect == false){
  		$response = 0;
  	}
    sqlsrv_free_stmt($connect);
	
  }
  else{
  	$response = 0;
  }

  echo $response;
  unset($_SESSION['MESSAGES']);
  unset($_SESSION['TIME']);
  unset($_SESSION['ID']);
  sqlsrv_close($conn);
?>