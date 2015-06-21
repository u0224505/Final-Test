<?php
  //啟用session
  include 'connect.php';
  session_start();
  header('Content-type: text/html; charset=utf-8');
  if($_SESSION['IUSERNAME'] == null){
      header("Location:index.html");
  }
  $username = $_SESSION['IUSERNAME'];
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

              <td width=68%></td>

              <td width=4%>
                <div id="button_informaion">
                  <a href="./main.php"  class="button_head">
                  Main
                 </a>
                </div>
              </td>

              <td width=2%</td>

              <td width=9%>
                <div id="button_my messages">
                  <a href="./my_messages.php"  class="button_head">
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
        <p></p>

        <div height=10%>
          <center><font size="20pt">Your Schedule：</font></center>
        </div>


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

                echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" 
                name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
              }
              else{
                echo "<td width=8%>
                <textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." placeholder=\"Room:XXX&#x0a;Course Title:XXX\"></textarea></td>";                
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

                echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" 
                name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
              }
              else{
                echo "<td width=8%>
                <textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." placeholder=\"Room:XXX&#x0a;Course Title:XXX\"></textarea></td>";                
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

                echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" 
                name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
              }
              else{
                echo "<td width=8%>
                <textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." placeholder=\"Room:XXX&#x0a;Course Title:XXX\"></textarea></td>";                
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

                echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" 
                name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
              }
              else{
                echo "<td width=8%>
                <textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." placeholder=\"Room:XXX&#x0a;Course Title:XXX\"></textarea></td>";                
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

                echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" 
                name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
              }
              else{
                echo "<td width=8%>
                <textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." placeholder=\"Room:XXX&#x0a;Course Title:XXX\"></textarea></td>";                
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

                echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" 
                name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
              }
              else{
                echo "<td width=8%>
                <textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." placeholder=\"Room:XXX&#x0a;Course Title:XXX\"></textarea></td>";                
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

                echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" 
                name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
              }
              else{
                echo "<td width=8%>
                <textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." placeholder=\"Room:XXX&#x0a;Course Title:XXX\"></textarea></td>";                
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

                echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" 
                name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
              }
              else{
                echo "<td width=8%>
                <textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." placeholder=\"Room:XXX&#x0a;Course Title:XXX\"></textarea></td>";                
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

                echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" 
                name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
              }
              else{
                echo "<td width=8%>
                <textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." placeholder=\"Room:XXX&#x0a;Course Title:XXX\"></textarea></td>";                
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

                echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" 
                name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
              }
              else{
                echo "<td width=8%>
                <textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." placeholder=\"Room:XXX&#x0a;Course Title:XXX\"></textarea></td>";                
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

                echo "<td width=8%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" 
                name=".$index[$x].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
              }
              else{
                echo "<td width=8%>
                <textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$x]." placeholder=\"Room:XXX&#x0a;Course Title:XXX\"></textarea></td>";                
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

        <p>&nbsp;</p>

        <div height=10%>
          <input id="update_schedule" type="button" style="width:171px;height:40px" class="content_signin_Bsignin" onclick="update_schedule();" value="Update" />
        </div>

        <p>&nbsp;</p>
        

      </div>
      
      <!--div id="footer" width=100% class="footer">
        <div id="footer_container" width=100%>
          <table style='border:0px #FFFFFF solid;' width=100%>
            <tr>
              <td width=100% align=center>
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
