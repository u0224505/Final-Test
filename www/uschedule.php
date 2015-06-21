<?php
	header("Content-Type:text/html; charset=utf-8");
	session_start();
	include "connect.php";
	$_SESSION['SCHEDULE'] = trim($_POST['schedule']);
	//把之前寫在伺服器端的session username設定給$username
	$username = $_SESSION['IUSERNAME'];

	$schedule = $_SESSION['SCHEDULE'];
	//在php中split()涵數的條件必須用正規化表示，故用explode()涵數作代替
	$schedule_array = explode("     ", $schedule);

	$response = 0;

	//N'".$schedule_array[0]."' N代表此欄位以Unicode表示
	$connect = sqlsrv_query($conn, "INSERT INTO Schedule (username, Sun_1, Sun_2, Sun_3, Sun_4, Sun_Y, Sun_5, Sun_6, Sun_7, Sun_8, Sun_A, Sun_B, 
		Mon_1, Mon_2, Mon_3, Mon_4, Mon_Y, Mon_5, Mon_6, Mon_7, Mon_8, Mon_A, Mon_B, 
		Tue_1, Tue_2, Tue_3, Tue_4, Tue_Y, Tue_5, Tue_6, Tue_7, Tue_8, Tue_A, Tue_B, 
		Wed_1, Wed_2, Wed_3, Wed_4, Wed_Y, Wed_5, Wed_6, Wed_7, Wed_8, Wed_A, Wed_B, 
		Thu_1, Thu_2, Thu_3, Thu_4, Thu_Y, Thu_5, Thu_6, Thu_7, Thu_8, Thu_A, Thu_B, 
		Fri_1, Fri_2, Fri_3, Fri_4, Fri_Y, Fri_5, Fri_6, Fri_7, Fri_8, Fri_A, Fri_B, 
		Sat_1, Sat_2, Sat_3, Sat_4, Sat_Y, Sat_5, Sat_6, Sat_7, Sat_8, Sat_A, Sat_B) 
		VALUES ('".$username."', N'".$schedule_array[0]."', N'".$schedule_array[1]."', N'".$schedule_array[2]."', N'".$schedule_array[3]."', N'".$schedule_array[4]."', 
			N'".$schedule_array[5]."', N'".$schedule_array[6]."', N'".$schedule_array[7]."', N'".$schedule_array[8]."', N'".$schedule_array[9]."', 
			N'".$schedule_array[10]."', N'".$schedule_array[11]."', N'".$schedule_array[12]."', N'".$schedule_array[13]."', N'".$schedule_array[14]."', 
			N'".$schedule_array[15]."', N'".$schedule_array[16]."', N'".$schedule_array[17]."', N'".$schedule_array[18]."', N'".$schedule_array[19]."', 
			N'".$schedule_array[20]."', N'".$schedule_array[21]."', N'".$schedule_array[22]."', N'".$schedule_array[23]."', N'".$schedule_array[24]."', 
			N'".$schedule_array[25]."', N'".$schedule_array[26]."', N'".$schedule_array[27]."', N'".$schedule_array[28]."', N'".$schedule_array[29]."', 
			N'".$schedule_array[30]."', N'".$schedule_array[31]."', N'".$schedule_array[32]."', N'".$schedule_array[33]."', N'".$schedule_array[34]."',
			N'".$schedule_array[35]."', N'".$schedule_array[36]."', N'".$schedule_array[37]."', N'".$schedule_array[38]."', N'".$schedule_array[39]."', 
			N'".$schedule_array[40]."', N'".$schedule_array[41]."', N'".$schedule_array[42]."', N'".$schedule_array[43]."', N'".$schedule_array[44]."', 
			N'".$schedule_array[45]."', N'".$schedule_array[46]."', N'".$schedule_array[47]."', N'".$schedule_array[48]."', N'".$schedule_array[49]."', 
			N'".$schedule_array[50]."', N'".$schedule_array[51]."', N'".$schedule_array[52]."', N'".$schedule_array[53]."', N'".$schedule_array[54]."', 
			N'".$schedule_array[55]."', N'".$schedule_array[56]."', N'".$schedule_array[57]."', N'".$schedule_array[58]."', N'".$schedule_array[59]."', 
			N'".$schedule_array[60]."', N'".$schedule_array[61]."', N'".$schedule_array[62]."', N'".$schedule_array[63]."', N'".$schedule_array[64]."', 
			N'".$schedule_array[65]."', N'".$schedule_array[66]."', N'".$schedule_array[67]."', N'".$schedule_array[68]."', N'".$schedule_array[69]."', 
			N'".$schedule_array[70]."', N'".$schedule_array[71]."', N'".$schedule_array[72]."', N'".$schedule_array[73]."', N'".$schedule_array[74]."', 
			N'".$schedule_array[75]."', N'".$schedule_array[76]."');");

	if($connect == true){
		$response = 1;
	}

	echo $response;
	unset($_SESSION['SCHEDULE']);
	sqlsrv_free_stmt($connect);
	sqlsrv_close($conn);
?>