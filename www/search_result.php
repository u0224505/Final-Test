<?php
  //啟用session
  include 'connect.php';
  session_start();
  header('Content-type: text/html; charset=utf-8');
  if($_SESSION['IUSERNAME'] == null){
      header("Location:index.html");
  }
  $username = $_SESSION['IUSERNAME'];
  $realname = $_SESSION['SEARCH'];
  $current_course = $_SESSION['CURRENT_COURSE'];
  $_SESSION['RESULT_USERNAME'] = array(); //因為同姓名的人不只有一個，所以要用陣列儲存
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
                  <input type="button" class="button_head_small" value="Sign out" onclick="signout();" />
                </div>
              </td>

            </tr>
          </table>
        </div>
      </div>
      
      
      <div id="content" class="content" align=center>

        <p></p>

        <div height=20%>
          <center style="font-size:44px;">
            Search result：
            <hr style="width: 100%;">
          </center>
        </div>

        <?php
          include 'connect.php';
          header('Content-type: text/html; charset=utf-8');

          /*
            以下這句SQL用到的是 子查詢
            我先利用 "真實姓名(realname)" 查出是用此 "真實姓名" 註册的 "帳號(username)"
            再查出這些 "帳號" 所屬的 "課表(Schedule)"

            SELECT "欄位1" 
            FROM "表格" 
            WHERE "欄位2" [比較運算素] 
            (SELECT "欄位1" 
            FROM "表格"
            WHERE "條件");
          */
          $connect = sqlsrv_query($conn, "SELECT * From Schedule WHERE username IN 
                      (SELECT username FROM Information WHERE realname='".$realname."');");
          $separated = str_repeat('-', 70);


          if($connect == false){
            echo "<center><div id=showerror>Query fails！</div></center>";            
          }
          else{
            $a = sqlsrv_query($conn, "SELECT * From Schedule WHERE username IN 
                  (SELECT username FROM Information WHERE realname='".$realname."');");
            $b = sqlsrv_fetch_array($a);

            if(count($b) == 0){
              echo "<center><div id=showerror style=\"font-size:60px; color:red;\">The name can not be found！</div></center>";
              sqlsrv_free_stmt($a);
            }
            else{
              sqlsrv_free_stmt($a);

              $id = 0;

              $tmpt = array();
              $index = array();
              $r = 0;
              $c = 0;

              //以陣列及迴圈的方式將資料表欄位、課表欄位名稱建立好
              for($i = 1; $i < 12; $i++){
                $day = array("", "Sun_", "Mon_", "Tue_", "Wed_", "Thu_", "Fri_", "Sat_");
                $p = array("1", "2", "3", "4", "Y", "5", "6", "7", "8", "A", "B");
                $idx = array('', 'TA', 'TA', 'TA', 'TA', 'TA', 'TA', 'TA');
                $period = array("1st Period (08:10~09:00)", "2st Period (09:10~10:00)", "3st Period (10:10~11:00)", "4st Period (11:10~12:00)", 
                              "Y Period (12:10~13:20)", "5st Period (13:30~14:20)", "6st Period (14:30~15:20)", "7st Period (15:30~16:20)", 
                              "8st Period (16:30~17:20)", "A Period (17:30~18:20)", "B Period (18:30~19:20)");
                $c = $r;
                for($x = 1; $x < 9; $x++){
                  //字串相加一定要用"."
                  if($x != 1){
                    $day[$x - 1] .= $p[$i - 1];
                    $idx[$x - 1] .= (string)$c;
                    $c += 11;
                  }
                  else{
                    $day[$x - 1] = $period[$i - 1];
                    $idx[$x - 1] = '';
                  }
                  
                }
                $r += 1;
                $c = 0;
                $tmpt[$i - 1] = $day;
                $index[$i - 1] = $idx;
              }

              while($row = sqlsrv_fetch_array($connect)){

                //因為 "realname" 都一樣，若要發送訊息就需要 "username"，故使用$_SESSION['RESULT_USERNAME']這個session陣列，並依照順序儲存
                $_SESSION['RESULT_USERNAME'][$id] = $row['username'];
                $information = sqlsrv_query($conn, "SELECT * FROM Information WHERE username='".$_SESSION['RESULT_USERNAME'][$id]."';");
                $I_row = sqlsrv_fetch_array($information);
                
                $rn = $I_row['realname']; //先設定rn變數

                //判斷被捜尋的姓名是否為自己
                if($I_row['username'] == $username){
                  $rn .= " (Myself)";
                }

                //把詳細資料列出來，比較容易分辨是哪個人
                echo "<p></p>";
                echo "<table width=70%><tr>";
                echo "<td width=17.5%></td>";
                echo "<td width=35% align=center valign=center style=\"font-size:26px;\">".$rn."</td>";
                echo "<td width=17.5%><div height=10%><center><div id=\"showerror".$id."\" style=\"font-size:20px; color:red;\"></div></center></div></td></tr>";
                echo "<tr><td width=17.5%></td><td width=35%></td><td width=17.5%></td></tr>";
                echo "<tr><td width=17.5%></td>";
                echo "<td width=35% align=center valign=center style=\"font-size:26px;\">".$I_row['studentid']."</td>";
                echo "<td width=17.5% align=center><input name=\"realname".$id."\" type='text' class=\"input_special\" placeholder=\"Send Messages to him/her\" style=\"height: 50px; width: 300px; text-align: left; float:center\"></td></tr>";
                echo "<tr><td width=17.5%></td><td width=35%></td><td width=17.5%></td></tr>";
                echo "<tr><td width=17.5%></td>";
                echo "<td width=35% align=center valign=center style=\"font-size:26px;\">".$I_row['gender']."</td>";
                echo "<td width=17.5% align=center valign=center><input id=\"checkaccount\" type=\"button\" style=\"width:171px;height:40px\" class=\"content_signin_Bsignin\" onclick=\"send_messages(".$id.");\" value=\"Send Messages\" /></td></tr>";              
                echo "</table>";
                echo "<p></p>";

                $id++;


                echo "<table name=\"main_table\" style=\"border:4px #CCCCCC solid; color:white\" rules=\"all\" bgcolor=\"#1793d1\" width=70%>";
                echo "<tr align=\"center\" valign=\"center\" style=\"font-size:24px;\" bgcolor=\"#CC6666\">";
                echo "<td width=8.75%>Period/Week</td>";
                echo "<td width=8.75%>Sunday</td>";
                echo "<td width=8.75%>Monday</td>";
                echo "<td width=8.75%>Tuesday</td>";
                echo "<td width=8.75%>Wednesday</td>";
                echo "<td width=8.75%>Thursday</td>";
                echo "<td width=8.75%>Friday</td>";
                echo "<td width=8.75%>Saturday</td>";
                echo "</tr>";
              
              
                //以陣列及迴圈的方式將課表從後臺撈出來
                for($i = 0; $i < 11; $i++){
                  for($j = 0; $j < 8; $j++){
                    if($j == 0){
                      echo "<tr align=\"center\" valign=\"cente\" style=\"font-size:18px\">";
                      echo "<td width=8.75%>".$tmpt[$i][$j]."</td>";
                    }
                    else{
                      if($row[$tmpt[$i][$j]] != "None"){
                        $course = explode("@@@", $row[$tmpt[$i][$j]]);                      

                        if (array_search($current_course, $tmpt[$i]) !== false){
                          if($j == array_search($current_course, $tmpt[$i])){
                          echo "<td width=8.75% bgcolor=\"#62AB37\"><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea_current\" readonly=\"readonly\" 
                            name=".$index[$i][$j].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                          }
                        else{
                          echo "<td width=8.75%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                          name=".$index[$i][$j].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                        }
                      }
                      else{
                        echo "<td width=8.75%><textarea rows=\"3\" cols=\"18\" class=\"schedule_textarea\" readonly=\"readonly\" 
                        name=".$index[$i][$j].">".$course[0]."&#x0a".$course[1]."</textarea></td>";
                      }
                               
                      }
                      else{
                        if (array_search($current_course, $tmpt[$i]) !== false){
                          if($j == array_search($current_course, $tmpt[$i])){
                            echo "<td width=8.75% bgcolor=\"#62AB37\">
                            <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea_current\" name=".$index[$i][$j]." readonly=\"readonly\"></textarea></td>";
                          }
                          else{
                            echo "<td width=8.75%>
                            <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$i][$j]." readonly=\"readonly\"></textarea></td>";
                          }
                        }
                        else{
                          echo "<td width=8.75%>
                          <textarea rows=\"1\" cols=\"18\" class=\"schedule_textarea\" name=".$index[$i][$j]." readonly=\"readonly\"></textarea></td>";
                        }
                      }
                    }
                  
                  }
                  echo "</tr>";
                }
                echo "</table>";
                echo "<center><div style=\"font-size: 44px;\">".$separated."</div></center>";
              }            
              sqlsrv_free_stmt($information);
            }
          }

          //將姓名及目前的課程的session刪除
          unset($_SESSION['SEARCH']);
          unset($_SESSION['CURRENT_COURSE']);
          sqlsrv_free_stmt($connect);
          sqlsrv_close($conn);

        ?>


       
          
        </table>

        <div height=10%>
          <center>
            <div id="showerror" style="font-size:20px; color:red;"></div>
          </center>
        </div>

        <p id="showerror_search" style="font-size:24px; color:red;">&nbsp;</p>
        

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
