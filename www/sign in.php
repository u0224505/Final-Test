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
                 <a href="./sign up.php"  class="button_head">
                  Sign up
                 </a>
                </div>
              </td>

              <td width=1.5%</td>

              <td width=6%>
                <div id="button_sign in">
                  <a href="./sign in.php"  class="button_head">
                   Sign in
                  </a>
                </div>
              </td>

            </tr>
          </table>
        </div>
      </div>
      
      
      <div id="content" class="content" align=center>

        <table name="signin_table" style='border:0px #000000 solid;' class='content_title_signup_signin'>
          
          <tr height=30%>
            <td width=30%></td>
            <td width=20%></td>
            <td width=20%></td>
            <td width=30%></td>
          </tr>

          <tr height=10% valign=center>
            <td width=30%></td>
            <td width=20% align=right>Username：</td>
            <td width=20% align=left>
              <input name="Iusername" type='text' class="input_special">
            </td>
            <td width=30%></td>
          </tr>

          <tr height=10% valign=center>
            <td width=30%></td>
            <td width=20% align=right>Password：</td>
            <td width=20% align=left>
              <input name="Ipassword" type='password' class="input_special">
            </td>
            <td width=30%></td>
          </tr>


          <tr height=20%>
            <td width=30%></td>
            <td width=20% valign=center align=right></td>
            <td width=20% valign=center align=left>
                <input id="checkaccount" type="button" style="width:171px;height:40px" class="content_signin_Bsignin" onclick="checkaccount();" value="Sign in" />
            </td>
            <td width=30%></td>
          </tr>

          <tr height=20%>
            <td width=30%></td>
            <td width=20% valign=top align=right></td>
            <td width=20%></td>
            <td width=30%></td>
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
