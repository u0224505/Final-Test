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
                  <a href="./index.html" class="logo">
                  ULife
                  </a>
                </div>
              </td>

              <td width=78%></td>

              <td width=6%>
                <div id="button_sign up">
                 <!--a href="./sign up.php"  class="button_head">
                  Sign up
                 </a-->
                </div>
              </td>

              <td width=1.5%</td>

              <td width=6%>
                <div id="button_sign in">
                  <!--a href="./sign in.php"  class="button_head">
                   Sign in
                  </a-->
                </div>
              </td>

            </tr>
          </table>
        </div>
      </div>
      
      
      <div id="content" class='gHostman_content' align=center>
        <div height=11% style="font-size:120px;">&nbsp;</div>

        <div height=55%>
          <div id='title' height=10% align=center style="font-size:44px; font-family: 'Lobster', cursive;">Administrator</div>

        <table name="signin_table" style='border:0px #000000 solid;' class='gHostman_signin'>

          <tr height=5% valign=center></tr>

          <tr height=10% valign=center>
            <td width=20% align=right>Username：</td>
            <td width=20% align=left>
              <input name="Iusername" type='text' class="input_special">
            </td>
          </tr>

          <tr height=10% valign=center>
            <td width=20% align=right>Password：</td>
            <td width=20% align=left>
              <input name="Ipassword" type='password' class="input_special">
            </td>
          </tr>


          <tr height=20%>
            <td width=20% valign=center align=right></td>
            <td width=20% valign=center align=left>
                <input id="checkaccount" type="button" style="width:171px;height:40px" class="content_signin_Bsignin" onclick="gHostman_checkaccount();" value="Sign in" />
            </td>
          </tr>
        </table>
        </div>

       

        <div height=10%>
          <center>
            <div id="showerror" style="font-size:20px; color:red;"></div>
          </center>
        </div>
        

      </div>
      
      <div id="footer" class="gHostman_footer">
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
      </div>

    </div>
	

</body>
</html>
