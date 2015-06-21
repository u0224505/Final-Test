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
                  <a href="./gHostman.php" class="logo">
                  ULife
                  </a>
                </div>
              </td>

              <td width=68%></td>

              <td width=4%>
                <div id="button_informaion">
                  <!--a href="./main.php"  class="button_head">
                  Main
                 </a-->
                </div>
              </td>

              <td width=2%</td>

              <td width=9%>
                <div id="button_my messages">
                  <!--a href="./my_messages.php"  class="button_head">
                  My messages
                 </a-->
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

        <?php
              header("Content-Type:text/html; charset=utf-8");
              include 'connect.php';

              $connect = sqlsrv_query($conn, "SELECT id, signintime, ip FROM Admin_SignRecord
                WHERE username='".$username."' 
                ORDER BY id DESC;");

              $row = sqlsrv_fetch_array($connect);

              echo "<div id=\"last_login_ip\" style=\"font-size:44px;\">Welcome Administrator</div>";
              echo "<div id=\"last_login_ip\" style=\"font-size:24px;\">Login IP：".$row['ip']."</div>";
              echo "<div id=\"last_login_time\" style=\"font-size:24px;\">Login Time：".$row['signintime']."</div>";

              sqlsrv_free_stmt($connect);

              $connect = sqlsrv_query($conn, "SELECT username FROM Account");

              $namelist = array();
              $id = 0;

              echo "<p></p>";
              echo "<hr>";
              echo "<p></p>";
              echo "<div style=\"font-size:36px; color:red;\">Delete Users</div>";
              echo "<p></p>";

              echo "<table width=24% style=\"border:4px #CCCCCC solid; color:white\" rules=\"all\" bgcolor=\"#1793d1\">";
              echo "<tr bgcolor=\"#CC6666\"><td></td><td style=\"font-size:38px;\" align=center>Users</td></tr>";

              while($row = sqlsrv_fetch_array($connect)){
                //列出所有的username
                echo "<tr style=\"font-size:24px;\" width=100%><td width=3% align=right><input type=\"checkbox\" name=\"deletelist[]\" value=\"".$id."\"/></td>";
                echo "<td align=center>".$row['username']."</td></tr>";
                array_push($namelist, $row['username']);
                $id ++;
              }

              echo "</table>";
              echo "<p></p>";
              echo "<div id=\"showerror\" style=\"font-size:24px; color:red;\"></div>";
              echo "<p></p>";
              echo "<input id=\"checkaccount\" type=\"button\" style=\"width:171px;height:40px;color:white;\" class=\"content_signin_Bsignin\" onclick=\"deleteusers();\" value=\"Delete\" />";

              $_SESSION['DELETELIST'] = $namelist;  //將所有的username存到session中，以便日後能夠刪除

              sqlsrv_free_stmt($connect);
              sqlsrv_close($conn);

            ?>

      </div>
      
      <!--div id="footer" class="footer">
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

    </div-->
	

</body>
</html>
