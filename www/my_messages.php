<?php
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
                  <a href="./information.php"  class="button_head">
                  Information
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
      
      
      <div id="content" class="message">
        <div style="color:1793d1; font-size:54px;">My Messages</div>
        <hr>

        <?php

          include 'connect.php';

          $connect = sqlsrv_query($conn, "SELECT * FROM Message WHERE username='".$username."' ORDER BY id ASC;");

          if($connect == false){
            echo "<div style=\"color:1793d1; font-size:28px;\">Query fails！</div>";
          }
          else{
            $searchcount = sqlsrv_query($conn, "SELECT COUNT(id) FROM Message WHERE username='".$username."';");

            if($searchcount == false){
              echo "<div style=\"color:1793d1; font-size:28px;\">You have no messages！</div>";
            }
            else{
              while($row = sqlsrv_fetch_array($connect)){
                echo "<div style=\"color:1793d1; font-size:28px;\">".$row['fromwhom'].
                "&nbsp;&nbsp;&nbsp; said &nbsp;&nbsp;&nbsp;".$row['message']."&nbsp;(".$row['time'].")</div>";
              }
            }
            sqlsrv_free_stmt($searchcount);
          }

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
      </div-->

    </div>
	

</body>
</html>
