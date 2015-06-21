<?php
	header("Content-Type:text/html; charset=utf-8");
	session_start();
	include "connect.php";
	$_SESSION['SCHEDULE'] = trim($_POST['schedule']);
	$username = $_SESSION['IUSERNAME'];

	$schedule = $_SESSION['SCHEDULE'];
	$schedule_array = explode("     ", $schedule);

	$response = 0;

	$connect = sqlsrv_query($conn, "UPDATE Schedule
		SET Sun_1=N'".$schedule_array[0]."', Sun_2=N'".$schedule_array[1]."', Sun_3=N'".$schedule_array[2]."', Sun_4=N'".$schedule_array[3]."', Sun_Y=N'".$schedule_array[4]."',
		Sun_5=N'".$schedule_array[5]."', Sun_6=N'".$schedule_array[6]."', Sun_7=N'".$schedule_array[7]."', Sun_8=N'".$schedule_array[8]."', 
		Sun_A=N'".$schedule_array[9]."', Sun_B=N'".$schedule_array[10]."', Mon_1=N'".$schedule_array[11]."', Mon_2=N'".$schedule_array[12]."', 
		Mon_3=N'".$schedule_array[13]."', Mon_4=N'".$schedule_array[14]."', Mon_Y=N'".$schedule_array[15]."', Mon_5=N'".$schedule_array[16]."', 
		Mon_6=N'".$schedule_array[17]."', Mon_7=N'".$schedule_array[18]."', Mon_8=N'".$schedule_array[19]."', Mon_A=N'".$schedule_array[20]."', 
		Mon_B=N'".$schedule_array[21]."', Tue_1=N'".$schedule_array[22]."', Tue_2=N'".$schedule_array[23]."', Tue_3=N'".$schedule_array[24]."', 
		Tue_4=N'".$schedule_array[25]."', Tue_Y=N'".$schedule_array[26]."', Tue_5=N'".$schedule_array[27]."', Tue_6=N'".$schedule_array[28]."', 
		Tue_7=N'".$schedule_array[29]."', Tue_8=N'".$schedule_array[30]."', Tue_A=N'".$schedule_array[31]."', Tue_B=N'".$schedule_array[32]."', 
		Wed_1=N'".$schedule_array[33]."', Wed_2=N'".$schedule_array[34]."', Wed_3=N'".$schedule_array[35]."', Wed_4=N'".$schedule_array[36]."', 
		Wed_Y=N'".$schedule_array[37]."', Wed_5=N'".$schedule_array[38]."', Wed_6=N'".$schedule_array[39]."', Wed_7=N'".$schedule_array[40]."', 
		Wed_8=N'".$schedule_array[41]."', Wed_A=N'".$schedule_array[42]."', Wed_B=N'".$schedule_array[43]."', Thu_1=N'".$schedule_array[44]."', 
		Thu_2=N'".$schedule_array[45]."', Thu_3=N'".$schedule_array[46]."', Thu_4=N'".$schedule_array[47]."', Thu_Y=N'".$schedule_array[48]."', 
		Thu_5=N'".$schedule_array[49]."', Thu_6=N'".$schedule_array[50]."', Thu_7=N'".$schedule_array[51]."', Thu_8=N'".$schedule_array[52]."', 
		Thu_A=N'".$schedule_array[53]."', Thu_B=N'".$schedule_array[54]."', Fri_1=N'".$schedule_array[55]."', Fri_2=N'".$schedule_array[56]."', 
		Fri_3=N'".$schedule_array[57]."', Fri_4=N'".$schedule_array[58]."', Fri_Y=N'".$schedule_array[59]."', Fri_5=N'".$schedule_array[60]."', 
		Fri_6=N'".$schedule_array[61]."', Fri_7=N'".$schedule_array[62]."', Fri_8=N'".$schedule_array[63]."', Fri_A=N'".$schedule_array[64]."', 
		Fri_B=N'".$schedule_array[65]."', Sat_1=N'".$schedule_array[66]."', Sat_2=N'".$schedule_array[67]."', Sat_3=N'".$schedule_array[68]."', 
		Sat_4=N'".$schedule_array[69]."', Sat_Y=N'".$schedule_array[70]."', Sat_5=N'".$schedule_array[71]."', Sat_6=N'".$schedule_array[72]."', 
		Sat_7=N'".$schedule_array[73]."', Sat_8=N'".$schedule_array[74]."', Sat_A=N'".$schedule_array[75]."', Sat_B=N'".$schedule_array[76]."' 
		WHERE username='".$username."';");


	if($connect == true){
		$response = 1;
	}

	echo $response;
	unset($_SESSION['SCHEDULE']);
	sqlsrv_free_stmt($connect);
	sqlsrv_close($conn);
?>