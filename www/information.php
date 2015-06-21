<?php
  session_start();
  header('Content-type: text/html; charset=utf-8');
  if($_SESSION['IUSERNAME'] == null){
      header("Location:index.html");
  }
  $username = $_SESSION['IUSERNAME'];
?>
<!--<!doctype html>-->
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
                  <a href="./main.php"  class="button_head_small">
                  Main
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

        <table name="information_table" style='border:0px #000000 solid;' class='content_information_table1'>
          
          <tr height=7.5%>
            <td width=32%></td>
            
            <?php
              //撈後臺的 "realname"、"gender" 資料
              header("Content-Type:text/html; charset=utf-8");
              include 'connect.php';


              $connect = sqlsrv_query($conn, "SELECT realname FROM Information WHERE (username='".$username."') ;");

              //因為查詢出來的資料是row(列)，所以要用sqlsrv_fetch_array();將之存入陣列中
              $row = sqlsrv_fetch_array($connect);

              //php 的 echo 後可以直接接html語法，但要用""括起來
              echo "<td width=33% align=center valign=bottom>Name：".trim($row['realname'])."</td>";

              sqlsrv_free_stmt($connect);
              sqlsrv_close($conn);

            ?>

            <td width=35%></td>
          </tr>


          <tr height=7.5%>
            <td width=32%></td>
            
            <?php
              header("Content-Type:text/html; charset=utf-8");
              include 'connect.php';

              $connect = sqlsrv_query($conn, "SELECT gender FROM Information WHERE (username='".$username."') ;");

              $row = sqlsrv_fetch_array($connect);

              echo "<td width=33% align=center>Gender：".trim($row['gender'])."</td>";

              sqlsrv_free_stmt($connect);
              sqlsrv_close($conn);
            ?>

            <td width=35%></td>
          </tr>


          <tr height=7.5%>
            <td width=32%></td>
            
            <?php
              header("Content-Type:text/html; charset=utf-8");
              include 'connect.php';

              $connect = sqlsrv_query($conn, "SELECT studentid FROM Information WHERE (username='".$username."') ;");

              $row = sqlsrv_fetch_array($connect);

              echo "<td width=33% align=center>Student ID：".trim($row['studentid'])."</td>";

              sqlsrv_free_stmt($connect);
              sqlsrv_close($conn);
            ?>

            <td width=35%></td>
          </tr>


          <tr height=7.5%>
            <td width=32%></td>
            
            <?php
              header("Content-Type:text/html; charset=utf-8");
              include 'connect.php';

              $connect = sqlsrv_query($conn, "SELECT email FROM Information WHERE (username='".$username."') ;");

              $row = sqlsrv_fetch_array($connect);

              echo "<td width=33% align=center>E-mail：".trim($row['email'])."</td>";

              sqlsrv_free_stmt($connect);
              sqlsrv_close($conn);
            ?>

            <td width=35%></td>
          </tr>

          <tr height=15%>            
            <td width=32%></td>
            <td width=33% align=center>
              <button style="width:200px;height:40px" class="content_signup_Bcra" onClick="locationgref_schedule();">Update My Schedule</button>
            </td>
            <td width=35%></td>
          </tr>

          <tr height=5%>            
            <td width=32%></td>
            <td width=33% align=center valign=bottom><font style="color:red">Change Password</font></td>
            <td width=35%></td>
          </tr>

         
        </table>

        <table name="information_table" style='border:0px #000000 solid;' class='content_information_table2'>

          <tr height=8%>            
            <td width=31%></td>
            <td width=17% align=right>
              Old password：              
            </td>
            <td width=17% align=center>
              <input name="Ioldpwd" type="password" class="input_special" style="height: 27px;" placeholder="Your old password...." />
            </td>
            <td width=35%></td>
          </tr>


          <tr height=8%>            
            <td width=30%></td>
            <td width=17% align=right>
              New password：              
            </td>
            <td width=17% align=center>
              <input name="Inewpwd" type="password" class="input_special" style="height: 27px;" placeholder="At least five words..." />
            </td>
            <td width=35%></td>
          </tr>


          <tr height=8%>            
            <td width=30%></td>
            <td width=17% align=right>
              Confirm password：             
            </td>
            <td width=17% align=center>
              <input name="Iconfirmpwd" type="password" class="input_special" style="height: 27px;" placeholder="At least five words..." />
            </td>
            <td width=35%></td>
          </tr>
         
        </table>


        <table name="information_table" style='border:0px #000000 solid;' class='content_information_table3'>

          <tr height=15%>            
            <td width=32%></td>
            <td width=33% align=center>
              <button id="change_pwd" style="width:200px;height:40px" class="content_signup_Bcra" onClick="changepassword();">Change Password</button>
            </td>
            <td width=35%></td>
          </tr>
         
        </table>


        <div height=10%>
          <center>
            <div id="showerror" style="font-size:20px; color:red;"></div>
          </center>
        </div>
        

      </div>
      
      <div id="footer" class="footer">
        <div id="footer_container">
          <table style='border:0px #FFFFFF solid;' class="footer_container">
            <tr>
              <td height=100% width=100% align=center>
                <a href="./main.php" class="footer_logo_transparent">
                  ULife
                </a>
              </td>
            </tr>
          </table>
          
        </div>
      </div>

    </div>
	

</body>
</html>
