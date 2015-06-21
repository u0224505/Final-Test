<?php
  //啟用session
  include 'connect.php';
  session_start();
  header('Content-type: text/html; charset=utf-8');
  if($_SESSION['IUSERNAME'] == null){
      header("Location:index.html");
  }
  $username = $_SESSION['IUSERNAME'];

  /*
    開起 php.ini
    session.save_path = "C:\wamp\tmp"; -> 表示 session 儲在的位址
    session.gc_maxlifetime = 1440; -> 表示 session 的存活時間為 1440(秒) = 24(分)，時間一到會被自動清除
  */

?>

<!--doctype html-->
<html>
<head>
<meta charset="utf-8">
<link href='http://fonts.googleapis.com/css?family=Lobster|Pacifico|Gloria+Hallelujah' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans|Arvo' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="style/style.css">
<script src="./js/import.js"></script>
<title>ULife</title>
</head>


<body>
	<div id="wraper" class="wraper">
      
      <div id="head" class="head">
        <div>
          <table style="border:0px #FFFFFF solid;" width=100% height=100%>
            <tr>
              <td width=2.5%></td>

              <td width=6%>
                <div id="logo">
                  <a href="./main.php" class="logo">
                  ULife
                  </a>
                </div>
              </td>

              <td width=63%></td>

              <td width=9%>
                <div id="button_informaion">
                  <a href="./information.php"  class="button_head_small">
                  Information
                 </a>
                </div>
              </td>

              <td width=2%</td>

              <td width=9%>
                <div id="button_my messages">
                  <a href="./my_messages.php"  class="button_head_small">
                  My messages
                 </a>
                </div>
              </td>

              <td width=2%</td>

              <td width=9%>
                <div id="button_sign out">
                  <input type="button" class="button_head" value="Sign out" onclick="signout();" />
                </div>
              </td>

            </tr>
          </table>
        </div>
      </div>
      
      
      <div id="content" class="content" align=center>

        <div height=20%>
          <center>
            <?php
              header("Content-Type:text/html; charset=utf-8");
              include 'connect.php';

              //撈登入時間、IP，用ORDER BY id 作排序 DESC -> 由大到小   ASC -> 由小到大
              $connect = sqlsrv_query($conn, "SELECT id, signintime, ip FROM SignRecord 
                WHERE username='".$username."' 
                ORDER BY id DESC;");

              $row = sqlsrv_fetch_array($connect);
              $day = substr($row['signintime'], 11, 3); //取得星期幾
              $hour = substr($row['signintime'], 15, 2);  //取得時間
              $minute = substr($row['signintime'], 18, 2);  //取得分鐘
              $interval = "";
              //$day = "Wed";
              //$hour = "15";
              //$minute = "51";

              //判斷目前時間位於哪一個區塊
              switch($hour){
                case "08":{
                  if((int)$minute >= 10){
                    $interval = "_1";
                  }
                  break;
                }
                case "09":{
                  if((int)$minute == 0){
                    $interval = "_1";
                  }
                  else if((int)$minute >= 10){
                    $interval = "_2";
                  }
                  break;
                }
                case "10":{
                  if((int)$minute == 0){
                    $interval = "_2";
                  }
                  else if((int)$minute >= 10){
                    $interval = "_3";
                  }
                  break;
                }
                case "11":{
                  if((int)$minute == 0){
                    $interval = "_3";
                  }
                  else if((int)$minute >= 10){
                    $interval = "_4";
                  }
                  break;
                }
                case "12":{
                  if((int)$minute == 0){
                    $interval = "_4";
                  }
                  else if((int)$minute >= 10){
                    $interval = "_Y";
                  }
                  break;
                }
                case "13":{
                  if((int)$minute <= 20){
                    $interval = "_Y";
                  }
                  else if((int)$minute >= 30){
                    $interval = "_5";
                  }
                  break;
                }
                case "14":{
                  if((int)$minute <= 20){
                    $interval = "_5";
                  }
                  else if((int)$minute >= 30){
                    $interval = "_6";
                  }
                  break;
                }
                case "15":{
                  if((int)$minute <= 20){
                    $interval = "_6";
                  }
                  else if((int)$minute >= 30){
                    $interval = "_7";
                  }
                  break;
                }
                case "16":{
                  if((int)$minute <= 20){
                    $interval = "_7";
                  }
                  else if((int)$minute >= 30){
                    $interval = "_8";
                  }
                  break;
                }
                case "17":{
                  if((int)$minute <= 20){
                    $interval = "_8";
                  }
                  else if((int)$minute >= 30){
                    $interval = "_A";
                  }
                  break;
                }
                case "18":{
                  if((int)$minute <= 20){
                    $interval = "_A";
                  }
                  else if((int)$minute >= 30){
                    $interval = "_B";
                  }
                  break;
                }
                case "19":{
                  if((int)$minute <= 20){
                    $interval = "_B";
                  }
                  break;
                }

              }

              echo "<div id=\"last_login_ip\" style=\"font-size:24px;\">Login IP：".$row['ip']."</div>";

              echo "<div id=\"last_login_time\" style=\"font-size:24px;\">Login Time：".$row['signintime']."</div>";

              if($interval == ""){
                //若不在時間表所定的時間內，則顯示None
                echo "<div id=\"current_course\" style=\"font-size:24px;\">Your Current Course：None</div>";
                //將這個<div> tag 隱藏起來
                echo "<div id=\"current_course_time\" style=\"font-size:24px; display:none;\">".$day.$interval."</div>";
              }
              else{
                //找到目前所對應的行程並顯示出來
                $connect = sqlsrv_query($conn, "SELECT ".$day.$interval. " FROM Schedule 
                WHERE username='".$username."';");
                $row = sqlsrv_fetch_array($connect);
                $course = explode("@@@", $row[$day.$interval]);

                if(count($course) > 1){
                  echo "<div id=\"current_course\" style=\"font-size:24px;\">Your Current Course：".$course[1]."</div>";
                }
                else{
                  echo "<div id=\"current_course\" style=\"font-size:24px;\">Your Current Course：".$course[0]."</div>";
                }
                //將這個<div> tag 隱藏起來
                echo "<div id=\"current_course_time\" style=\"font-size:24px; display:none;\">".$day.$interval."</div>";
                
              }

              

              sqlsrv_free_stmt($connect);
              sqlsrv_close($conn);

            ?>

          </center>
        </div>

        <p></p>

        <table name="main_table" style="border:4px #CCCCCC solid; color:white" rules="all" bgcolor="#1793d1" width=70%>
          <tr align="center" valign="center" style="font-size:24px;" bgcolor="#CC6666">
          <td width=8%>Period/Week</td>
          <td width=8%>Sunday</td>
          <td width=8%>Monday</td>
          <td width=8%>Tuesday</td>
          <td width=8%>Wednesday</td>
          <td width=8%>Thursday</td>
          <td width=8%>Friday</td>
          <td width=8%>Saturday</td>                   
        </tr>



        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>1st Period (08:10~09:00)</td>
          <?php
            header("Content-Type:text/html; charset=utf-8");
            include 'connect.php';

            //將每個row的課表撈出來
            $tmpt = array("Sun_1", "Mon_1", "Tue_1", "Wed_1", "Thu_1", "Fri_1", "Sat_1");
            $index = array('TA0', 'TA11', 'TA22', 'TA33', 'TA44', 'TA55', 'TA66');


            for($x = 0; $x < 7; $x++){

              $connect = sqlsrv_query($conn, "SELECT ".$tmpt[$x]. " FROM Schedule 
              WHERE username='".$username."';");

              $row = sqlsrv_fetch_array($connect);

              if($row[$tmpt[$x]] != "None"){
                $course = explode("@@@", $row[$tmpt[$x]]);

                //判斷目前時間是否位於此時間間格內，若有則此欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\"><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea_current\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                  else{
                    echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                  name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                }
                               
              }
              else{
                ////若為None，也要判斷是否有欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\">
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea_current\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                  else{
                    echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                }
              }
            }
          ?>
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>2st Period (09:10~10:00)</td>
          <?php
            
            header("Content-Type:text/html; charset=utf-8");
            include 'connect.php';

            $tmpt = array('Sun_2', 'Mon_2', 'Tue_2', 'Wed_2', 'Thu_2', 'Fri_2', 'Sat_2',);
            $index = array('TA1', 'TA12', 'TA23', 'TA34', 'TA45', 'TA56', 'TA67');

            for($x = 0; $x < 7; $x++){

              $connect = sqlsrv_query($conn, "SELECT ".$tmpt[$x]. " FROM Schedule 
              WHERE username='".$username."';");

              $row = sqlsrv_fetch_array($connect);

              if($row[$tmpt[$x]] != "None"){
                $course = explode("@@@", $row[$tmpt[$x]]);

                //判斷目前時間是否位於此時間間格內，若有則此欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\"><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea_current\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                  else{
                    echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                  name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                }
                               
              }
              else{
                ////若為None，也要判斷是否有欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\">
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea_current\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                  else{
                    echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                }
              }
            }
          ?>
          
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>3st Period (10:10~11:00)</td>
          <?php
            header("Content-Type:text/html; charset=utf-8");
            include 'connect.php';

            $tmpt = array('Sun_3', 'Mon_3', 'Tue_3', 'Wed_3', 'Thu_3', 'Fri_3', 'Sat_3');
            $index = array('TA2', 'TA13', 'TA24', 'TA35', 'TA46', 'TA57', 'TA68');

            for($x = 0; $x < 7; $x++){

              $connect = sqlsrv_query($conn, "SELECT ".$tmpt[$x]. " FROM Schedule 
              WHERE username='".$username."';");

              $row = sqlsrv_fetch_array($connect);

              if($row[$tmpt[$x]] != "None"){
                $course = explode("@@@", $row[$tmpt[$x]]);

                //判斷目前時間是否位於此時間間格內，若有則此欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\"><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea_current\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                  else{
                    echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                  name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                }
                               
              }
              else{
                ////若為None，也要判斷是否有欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\">
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea_current\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                  else{
                    echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                }
              }
            }
            
          ?>
          
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>4st Period (11:10~12:00)</td>
          <?php
            header("Content-Type:text/html; charset=utf-8");
            include 'connect.php';

            $tmpt = array('Sun_4', 'Mon_4', 'Tue_4', 'Wed_4', 'Thu_4', 'Fri_4', 'Sat_4');
            $index = array('TA3', 'TA14', 'TA25', 'TA36', 'TA47', 'TA58', 'TA69');

            for($x = 0; $x < 7; $x++){

              $connect = sqlsrv_query($conn, "SELECT ".$tmpt[$x]. " FROM Schedule 
              WHERE username='".$username."';");

              $row = sqlsrv_fetch_array($connect);

              if($row[$tmpt[$x]] != "None"){
                $course = explode("@@@", $row[$tmpt[$x]]);

                //判斷目前時間是否位於此時間間格內，若有則此欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\"><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea_current\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                  else{
                    echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                  name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                }
                               
              }
              else{
                ////若為None，也要判斷是否有欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\">
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea_current\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                  else{
                    echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                }
              }
            }
            
          ?>
          
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>Y Period (12:10~13:20)</td>
          <?php
            header("Content-Type:text/html; charset=utf-8");
            include 'connect.php';

            $tmpt = array('Sun_Y', 'Mon_Y', 'Tue_Y', 'Wed_Y', 'Thu_Y', 'Fri_Y', 'Sat_Y');
            $index = array('TA4', 'TA15', 'TA26', 'TA37', 'TA48', 'TA59', 'TA70');

            for($x = 0; $x < 7; $x++){

              $connect = sqlsrv_query($conn, "SELECT ".$tmpt[$x]. " FROM Schedule 
              WHERE username='".$username."';");

              $row = sqlsrv_fetch_array($connect);

              if($row[$tmpt[$x]] != "None"){
                $course = explode("@@@", $row[$tmpt[$x]]);

                //判斷目前時間是否位於此時間間格內，若有則此欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\"><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea_current\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                  else{
                    echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                  name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                }
                               
              }
              else{
                ////若為None，也要判斷是否有欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\">
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea_current\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                  else{
                    echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                }
              }
            }
            
          ?>
          
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>5st Period (13:30~14:20)</td>
          <?php
            header("Content-Type:text/html; charset=utf-8");
            include 'connect.php';

            $tmpt = array('Sun_5', 'Mon_5', 'Tue_5', 'Wed_5', 'Thu_5', 'Fri_5', 'Sat_5');
            $index = array('TA5', 'TA16', 'TA27', 'TA38', 'TA49', 'TA60', 'TA71');

            for($x = 0; $x < 7; $x++){

              $connect = sqlsrv_query($conn, "SELECT ".$tmpt[$x]. " FROM Schedule 
              WHERE username='".$username."';");

              $row = sqlsrv_fetch_array($connect);

              if($row[$tmpt[$x]] != "None"){
                $course = explode("@@@", $row[$tmpt[$x]]);

                //判斷目前時間是否位於此時間間格內，若有則此欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\"><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea_current\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                  else{
                    echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                  name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                }
                               
              }
              else{
                //若為None，也要判斷是否有欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8.75% bgcolor=\"#62AB37\">
                        <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea_current\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                  else{
                    echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                }
              }
            }
            
          ?>
         
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>6st Period (14:30~15:20)</td>
          <?php
            header("Content-Type:text/html; charset=utf-8");
            include 'connect.php';

            $tmpt = array('Sun_6', 'Mon_6', 'Tue_6', 'Wed_6', 'Thu_6', 'Fri_6', 'Sat_6');
            $index = array('TA6', 'TA17', 'TA28', 'TA39', 'TA50', 'TA61', 'TA72');

            for($x = 0; $x < 7; $x++){

              $connect = sqlsrv_query($conn, "SELECT ".$tmpt[$x]. " FROM Schedule 
              WHERE username='".$username."';");

              $row = sqlsrv_fetch_array($connect);

              if($row[$tmpt[$x]] != "None"){
                $course = explode("@@@", $row[$tmpt[$x]]);

                //判斷目前時間是否位於此時間間格內，若有則此欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\"><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea_current\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                  else{
                    echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                  name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                }
                               
              }
              else{
                ////若為None，也要判斷是否有欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\">
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea_current\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                  else{
                    echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                }
              }
            }
            
          ?>
         
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>7st Period (15:30~16:20)</td>
          <?php
            header("Content-Type:text/html; charset=utf-8");
            include 'connect.php';

            $tmpt = array('Sun_7', 'Mon_7', 'Tue_7', 'Wed_7', 'Thu_7', 'Fri_7', 'Sat_7');
            $index = array('TA7', 'TA18', 'TA29', 'TA40', 'TA51', 'TA62', 'TA73');

            for($x = 0; $x < 7; $x++){

              $connect = sqlsrv_query($conn, "SELECT ".$tmpt[$x]. " FROM Schedule 
              WHERE username='".$username."';");

              $row = sqlsrv_fetch_array($connect);

              if($row[$tmpt[$x]] != "None"){
                $course = explode("@@@", $row[$tmpt[$x]]);

                //判斷目前時間是否位於此時間間格內，若有則此欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\"><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea_current\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                  else{
                    echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                  name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                }
                               
              }
              else{
                ////若為None，也要判斷是否有欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\">
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea_current\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                  else{
                    echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                }
              }
            }
            
          ?>
         
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>8st Period (16:30~17:20)</td>
          <?php
            header("Content-Type:text/html; charset=utf-8");
            include 'connect.php';

            $tmpt = array('Sun_8', 'Mon_8', 'Tue_8', 'Wed_8', 'Thu_8', 'Fri_8', 'Sat_8');
            $index = array('TA8', 'TA19', 'TA30', 'TA41', 'TA52', 'TA63', 'TA74');

            for($x = 0; $x < 7; $x++){

              $connect = sqlsrv_query($conn, "SELECT ".$tmpt[$x]. " FROM Schedule 
              WHERE username='".$username."';");

              $row = sqlsrv_fetch_array($connect);

              if($row[$tmpt[$x]] != "None"){
                $course = explode("@@@", $row[$tmpt[$x]]);

                //判斷目前時間是否位於此時間間格內，若有則此欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\"><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea_current\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                  else{
                    echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                  name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                }
                               
              }
              else{
                ////若為None，也要判斷是否有欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\">
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea_current\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                  else{
                    echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                }
              }
            }
            
          ?>
          
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>A Period (17:30~18:20)</td>
          <?php
            header("Content-Type:text/html; charset=utf-8");
            include 'connect.php';

            $tmpt = array('Sun_A', 'Mon_A', 'Tue_A', 'Wed_A', 'Thu_A', 'Fri_A', 'Sat_A');
            $index = array('TA9', 'TA20', 'TA31', 'TA42', 'TA53', 'TA64', 'TA75');

            for($x = 0; $x < 7; $x++){

              $connect = sqlsrv_query($conn, "SELECT ".$tmpt[$x]. " FROM Schedule 
              WHERE username='".$username."';");

              $row = sqlsrv_fetch_array($connect);

              if($row[$tmpt[$x]] != "None"){
                $course = explode("@@@", $row[$tmpt[$x]]);

                //判斷目前時間是否位於此時間間格內，若有則此欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\"><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea_current\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                  else{
                    echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                  name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                }
                               
              }
              else{
                ////若為None，也要判斷是否有欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\">
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea_current\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                  else{
                    echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                }
              }
            }
            
          ?>
          
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>B Period (18:30~19:20)</td>
          <?php
            header("Content-Type:text/html; charset=utf-8");
            include 'connect.php';

            $tmpt = array('Sun_B', 'Mon_B', 'Tue_B', 'Wed_B', 'Thu_B', 'Fri_B', 'Sat_B');
            $index = array('TA10', 'TA21', 'TA32', 'TA43', 'TA54', 'TA65', 'TA76');

            for($x = 0; $x < 7; $x++){

              $connect = sqlsrv_query($conn, "SELECT ".$tmpt[$x]. " FROM Schedule 
              WHERE username='".$username."';");

              $row = sqlsrv_fetch_array($connect);

              if($row[$tmpt[$x]] != "None"){
                $course = explode("@@@", $row[$tmpt[$x]]);

                //判斷目前時間是否位於此時間間格內，若有則此欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\"><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea_current\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                  else{
                    echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                    name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                  name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                }
                               
              }
              else{
                ////若為None，也要判斷是否有欄位變色
                if (array_search($day.$interval, $tmpt) !== false){
                  if($x == array_search($day.$interval, $tmpt)){
                    echo "<td width=8% bgcolor=\"#62AB37\">
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea_current\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                  else{
                    echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                  }
                }
                else{
                  echo "<td width=8%>
                      <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." readonly=\"readonly\"></textarea></td>";
                }
              }
            }
            
          ?>
          
        </tr>
          
        </table>

        <div height=10%>
          <center>
            <div id="showerror" style="font-size:20px; color:red;"></div>
          </center>
        </div>

        <p id="showerror_search" style="font-size:24px; color:red;">&nbsp;</p>


        <div height=10%>
          <center>
            <div id="search" style="font-size:24px; color:black;">
              <table style="border:0px #CCCCCC solid;" width=10%>
                <tr align="center" valign="center">
                  <td>
                    <input type="text" class="input_special" name="search_schedule" style="width: 444px; height:44px; text-align:center;" placeholder="Please enter whom you want to search...">
                  </td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr align="center" valign="center">
                  <td>
                    <button style="width:200px;height:40px" class="content_signup_Bcra" onClick="search_schedule();">Search</button>
                  </td>
                </tr>
              </table>
              
            </div>
          </center>
        </div>

        <p style="font-size:24px; color:black;">&nbsp;</p>
        

      </div>
      
      <!--div id="footer" class="footer">
        <div id="footer_container">
          <table style='border:0px #FFFFFF solid;' class="footer_container">
            <tr>
              <td height=100% width=100% align=center>
                <a href="./index.html" class="footer_logo_transparent">
                  ULife
                </a>
              </td>
            </tr>
          </table>
          
        </div>
      </div-->

    </div>
	

</body>
</html>
