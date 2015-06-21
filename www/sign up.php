<!--<!doctype html>-->
<html>
<head>
<meta charset="utf-8">
<link href='http://fonts.googleapis.com/css?family=Lobster|Pacifico|Gloria+Hallelujah' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans|Arvo' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="style/style.css">
<script type="text/javascript" src="./js/import.js"></script>
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
        <table style='border:0px #000000 solid;' class='content_title_signup_signin'>
          
          <tr height=15%></tr>

          <tr height=7.5%>
            <td width=30%></td>
            <td width=20% align=right>Username：</td>
            <td width=20%>
              <input type='text' name="Iusername" class="input_special" placeholder="At least five words..." style="font-size:18px;">
            </td>
            <td width=30%></td>
          </tr>

          <tr height=7.5%>
            <td width=30%></td>
            <td width=20% align=right>Password：</td>
            <td width=20%>
              <input type='password' name="Ipassword" class="input_special" placeholder="At least five words..." style="font-size:18px;">
            </td>
            <td width=30%></td>
          </tr>

          <tr height=7.5%>
            <td width=30%></td>
            <td width=20% align=right>Confirm Password：</td>
            <td width=20%>
              <input type='password' name="Iconpwd" class="input_special" placeholder="Confirm your password..." style="font-size:18px;">
            </td>
            <td width=30%></td>
          </tr>

          <tr height=7.5%>
            <td width=30%></td>
            <td width=20% align=right>Real name：</td>
            <td width=20%>
              <input type='text' name="Irealname" class="input_special" placeholder="Please enter your name..." style="font-size:18px;">
            </td>
            <td width=30%></td>
          </tr>

          <tr height=7.5%>
            <td width=30%></td>
            <td width=20% align=right>Student ID：</td>
            <td width=20%>
              <input type='text' name="Istudentid" class="input_special" placeholder="Enter your Student ID..." style="font-size:18px;">
            </td>
            <td width=30%></td>
          </tr>

          <tr height=7.5%>
            <td width=30%></td>
            <td width=20% align=right>E-mail：</td>
            <td width=20%>
              <input type='text' name="Iemail" class="input_special" placeholder="Format must be correctly..." style="font-size:18px;">
            </td>
            <td width=30%></td>
          </tr>

          <tr height=7.5%>
            <td width=30%></td>
            <td width=20% align=right>Gender：</td>
            <td width=20%>
              <input type="radio" name="gender" value="1" checked>Male
              /
              <input type="radio" name="gender" value="2">Female
            </td>
            <td width=30%></td>
          </tr>


          <tr height=15%>
            <td width=30%></td>
            <td width=20%></td>
            <td width=20% valign=center align=left>
              <button id="checksignup" style="width:200px;height:40px" class="content_signup_Bcra" onClick="checksignup();">Create an account</button>
            </td>
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
