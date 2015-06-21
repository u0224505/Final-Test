<!doctype html>
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
      
      
      <div id="content" align="center" width=100%>

        <p></p>

        <font size="20pt">Your Schedule：</font>

        <p></p>

        <table style="border:4px #CCCCCC solid; color:white" rules="all" bgcolor="#1793d1" width=70%>
          
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
          <!--在html內若要換行，除了<br>外，還可用 &#x0a 0xa在ASCII中代表換行，html則為：&#x0a 或 &#x10，Tab = &#x09-->
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA0" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA11" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA22" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA33" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA44" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA55" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA66" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>2st Period (09:10~10:00)</td>
          <!--在html內若要換行，除了<br>外，還可用 &#x0a 0xa在ASCII中代表換行，html則為：&#x0a 或 &#x10，Tab = &#x09-->
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA1" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA12" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA23" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA34" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA45" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA56" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA67" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>3st Period (10:10~11:00)</td>
          <!--在html內若要換行，除了<br>外，還可用 &#x0a 0xa在ASCII中代表換行，html則為：&#x0a 或 &#x10，Tab = &#x09-->
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA2" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA13" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA24" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA35" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA46" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA57" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA68" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>4st Period (11:10~12:00)</td>
          <!--在html內若要換行，除了<br>外，還可用 &#x0a 0xa在ASCII中代表換行，html則為：&#x0a 或 &#x10，Tab = &#x09-->
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA3" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA14" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA25" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA36" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA47" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA58" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA69" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>Y Period (12:10~13:20)</td>
          <!--在html內若要換行，除了<br>外，還可用 &#x0a 0xa在ASCII中代表換行，html則為：&#x0a 或 &#x10，Tab = &#x09-->
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA4" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA15" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA26" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA37" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA48" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA59" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA70" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>5st Period (13:30~14:20)</td>
          <!--在html內若要換行，除了<br>外，還可用 &#x0a 0xa在ASCII中代表換行，html則為：&#x0a 或 &#x10，Tab = &#x09-->
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA5" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA16" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA27" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA38" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA49" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA60" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA71" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>6st Period (14:30~15:20)</td>
          <!--在html內若要換行，除了<br>外，還可用 &#x0a 0xa在ASCII中代表換行，html則為：&#x0a 或 &#x10，Tab = &#x09-->
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA6" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA17" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA28" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA39" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA50" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA61" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA72" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>7st Period (15:30~16:20)</td>
          <!--在html內若要換行，除了<br>外，還可用 &#x0a 0xa在ASCII中代表換行，html則為：&#x0a 或 &#x10，Tab = &#x09-->
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA7" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA18" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA29" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA40" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA51" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA62" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA73" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>8st Period (16:30~17:20)</td>
          <!--在html內若要換行，除了<br>外，還可用 &#x0a 0xa在ASCII中代表換行，html則為：&#x0a 或 &#x10，Tab = &#x09-->
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA8" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA19" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA30" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA41" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA52" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA63" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA74" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>A Period (17:30~18:20)</td>
          <!--在html內若要換行，除了<br>外，還可用 &#x0a 0xa在ASCII中代表換行，html則為：&#x0a 或 &#x10，Tab = &#x09-->
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA9" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA20" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA31" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA42" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA53" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA64" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA75" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
        </tr>


        <tr align="center" valign="center" style="font-size:18px">
          <td width=8%>B Period (18:30~19:20)</td>
          <!--在html內若要換行，除了<br>外，還可用 &#x0a 0xa在ASCII中代表換行，html則為：&#x0a 或 &#x10，Tab = &#x09-->
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA10" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA21" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA32" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA43" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA54" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA65" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
          <td width=8%><textarea rows="2" cols="18" class="schedule_textarea" name="TA76" placeholder="Room:XXX&#x0a;Course Title:XXX"></textarea></td>
        </tr>

        </table>

        <p></p>

        <div id="showerror" style="font-size:20px; color:red;"></div>

        <p></p>

        <div>
          <input id="input_schedule" type="button" style="width:171px;height:40px" class="content_signin_Bsignin" onclick="input_schedule();" value="Finish" />
        </div>

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
