function checkaccount(){//Sign in.php 登入檢查
  document.getElementById("checkaccount").disabled = true;
  document.getElementById("checkaccount").readOnly = true;

  var http_request;
  var dt = getTime();

	if(document.getElementsByName('Iusername')[0].value.length == 0 || document.getElementsByName('Ipassword')[0].value.length == 0){
      document.getElementById("showerror").innerHTML = "Username or Password couldn't be empty!!";
      document.getElementById("checkaccount").disabled = false;
      document.getElementById("checkaccount").readOnly = false;
  	}
  	else if(document.getElementsByName('Iusername')[0].value.length < 5 || document.getElementsByName('Ipassword')[0].value.length < 5){
      document.getElementById("showerror").innerHTML = "Username and Password must be longer than 5 characters!";
      document.getElementById("checkaccount").disabled = false;
      document.getElementById("checkaccount").readOnly = false;
  	}
  	else if(document.getElementsByName('Iusername')[0].value.length > 15 || document.getElementsByName('Ipassword')[0].value.length > 15){	
      document.getElementById("showerror").innerHTML = "Username and Password must be smaller than 15 characters!";
      document.getElementById("checkaccount").disabled = false;
      document.getElementById("checkaccount").readOnly = false;
  	}
  	else{
  		//以JS的方式呼叫 name=Fsignin 的form.submit()事件
  		//document.Fsignin.submit();
      


      /*
      下面的語法是用 AJAX 的概念寫的，AJAX 是用在：
      前臺將資料傳到後臺作處理or查詢，運算完後，再將結果傳回前臺
      */

      if (window.XMLHttpRequest){ // code for IE7+, Firefox, Chrome, Opera, Safari
        http_request = new XMLHttpRequest();

        /*有些版本的 Mozilla 瀏覽器在伺服器送回的資料未含
        XML mime-type 檔頭（header）時會出錯。為了避免這個問題
        可用下列方法覆寫伺服器傳回的檔頭，以免傳回的不是 text/xml。*/
        http_request.overrideMimeType('text.xml');
      }
      else if (window.ActiveXObject){// code for IE6, IE5  
        http_request = new ActiveXObject("Microsoft.XMLHTTP");
      }

      http_request.open('POST', './usignin.php', true);

      /*不過如果你想要以 POST 方式傳送資料，則必須先將 MIME 型態改好
      否則伺服器就不會理你傳過來的資料了。*/
      http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      /*將資料傳到後臺作查詢。
      以下的send()中的 "Iusername"= 、"Ipassword"= 必須要跟 php 中的
      $_SESSION['Iusername]、$_POST['Iusername']一樣才行*/
      http_request.send("Iusername=" + document.getElementsByName('Iusername')[0].value + "&Ipassword=" + document.getElementsByName('Ipassword')[0].value + 
        "&Itime=" + dt);


      http_request.onreadystatechange = function(){
        /*
        readyState 所有可能的值如下：
        0 (還沒開始)
        1 (讀取中)
        2 (已讀取)
        3 (資訊交換中)
        4 (一切完成)
        */
        if (http_request.readyState == 4 && http_request.status == 200){
          //取得後臺的回傳值
          var check = http_request.responseText;

          if (check == 1){
            document.location.href = './main.php';
          }
          else if(check == 0){
            document.getElementById("checkaccount").disabled = false;
            document.getElementById("checkaccount").readOnly = false;
            document.getElementById("showerror").innerHTML = "Your username or password is wrong!";
          }

      }

  	}
  }
}




function checksignup(){//Sign up.php 註册帳號檢查
  document.getElementById("checksignup").disabled = true;
  document.getElementById("checksignup").readOnly = true;

  var http_request;
  var dt = getTime();

  var username = document.getElementsByName("Iusername")[0].value;
  var password = document.getElementsByName("Ipassword")[0].value;
  var conpwd = document.getElementsByName("Iconpwd")[0].value;
  var realname = document.getElementsByName("Irealname")[0].value;
  var studentid = document.getElementsByName("Istudentid")[0].value;
  var email = document.getElementsByName("Iemail")[0].value;
  var gender;

  reg = /^[^\s]+@[^\s]+\.[^\s]{2,3}$/;
  /*
  reg = Regulear Expression 正規化表示法
  首先 變數前不能加 "var"
  而且變數值頭尾都要加"/"，JavaScript才會認定它是regular expression
  ^放在開頭表示開頭後面"一定要有" ^ 後面的字元，^放在中間的位置表示「Not 否定」之意
  +表示至少要有1個~N個字元
  \.表示.這個字元，\為跳脫字元
  {2,3}表示{}前的字元要有2或3次
  $表示$前的一個字元一定要放在結尾

  ^[^\s]+@：開頭不能有空白，一定至少要有1~n個字元在@前面
  [^\s]+\.[^\s]{2,3}$：@後面不能有空白，有1~n個字元後加上"."，已這樣的格式呈現2~3次，並且是在結尾
  */


  if (username.length == 0 || password.length == 0 || conpwd.length == 0 || realname.length == 0 || studentid == 0 || email.length == 0){
    document.getElementById("showerror").innerHTML = "Each field must not have blank to fill！";
    document.getElementById("checksignup").disabled = false;
    document.getElementById("checksignup").readOnly = false;
  }
  else if(username.length < 5 || username.length > 15){
    document.getElementById("showerror").innerHTML = "Username must be 5 to 15 characters！"
    document.getElementById("checksignup").disabled = false;
    document.getElementById("checksignup").readOnly = false;
  }
  else if(password.length < 5 || password.length > 15){
    document.getElementById("showerror").innerHTML = "Password must be 5 to 15 characters！"
    document.getElementById("checksignup").disabled = false;
    document.getElementById("checksignup").readOnly = false;
  }
  else if(password != conpwd){
    document.getElementById("showerror").innerHTML = "Your password and confirm password are different！"
    document.getElementById("checksignup").disabled = false;
    document.getElementById("checksignup").readOnly = false;
  }
  else if(!reg.test(email)){
    document.getElementById("showerror").innerHTML = "Your E-mail format is wrong！"
    document.getElementById("checksignup").disabled = false;
    document.getElementById("checksignup").readOnly = false;
  }
  else{

    if(document.getElementsByName('gender')[0].checked == true){
      gender = "Male";
    }
    else{
      gender = "Female"
    }

    
    if(window.XMLHttpRequest){
      http_request = new XMLHttpRequest();
      http_request.overrideMimeType('text.xml');
    }
    else if(window.ActiveXObject){
      http_request = new ActiveXObject("Microsoft.XMLHTTP");
    }

    http_request.open('POST', "./usignup.php", true);

    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    http_request.send("Iusername=" + username + "&Ipassword=" + password + "&Irealname=" + realname + "&Istudentid=" + studentid + "&Iemail=" + email + "&Igender=" + gender + "&Itime=" + dt);



    http_request.onreadystatechange = function(){
        if (http_request.readyState == 4 && http_request.status == 200){
          var check = http_request.responseText;

          if (check == 1){
            document.location.href = './schedule.php';
          }
          else if(check == 0){
            document.getElementById("checksignup").disabled = false;
            document.getElementById("checksignup").readOnly = false;
            document.getElementById("showerror").innerHTML = "Registration Failed！";
          }

      }

    }

  }

}



function getTime(){//取得本地端時間
  var dt = new Date();
  var dat;

  //判斷今天是星期幾前作格式化轉換
  switch (dt.getDay()){
    case 0:
      dat = "Sun";
      break;
    case 1:
      dat = "Mon";
      break;
    case 2:
      dat = "Tue";
      break;
    case 3:
      dat = "Wed";
      break;
    case 4:
      dat = "Thu";
      break;
    case 5:
      dat = "Fri";
      break;
    case 6:
      dat = "Sat";
      break;
  }

  //簡短版的if，為了讓小於十的數字顯示二碼數字

  /*
    if(dt.getDate())
      print '0';
    else
      print '';
    -----------------
    dt.getDate() < 10 ? '0' : ''
  */
  var month = ((dt.getMonth() + 1)<10 ? '0' : '') + (dt.getMonth() + 1);  //因為一月是從0開始，所以要+1
  var date = (dt.getDate() < 10 ? '0' : '') + dt.getDate();
  var hours = (dt.getHours() < 10 ? '0' : '') + dt.getHours();
  var minutes = (dt.getMinutes() < 10 ? '0' : '') + dt.getMinutes();
  var seconds = (dt.getSeconds() < 10 ? '0' : '') + dt.getSeconds();

  //格式：xxxx/xx/xx 星期幾 xx:xx:xx
  var dtformat = dt.getFullYear() + "/" + month + "/" + date + " " + dat +
                  " " + hours + ":" + minutes + ":" + seconds;

  return dtformat;
}



function input_schedule(){//課表輸入處理
  document.getElementById("input_schedule").disabled = true;
  document.getElementById("input_schedule").readOnly = true;

 var http_request;
 var tmpt = "";

 //因課表數量龐大，故先用迴圈先將所有的值存在 tmpt 中，並用 "     " 作間格，之後只有要 tmpt 往後臺送及可
 for(i = 0; i < 77; i++){
  if (document.getElementsByName("TA" + i.toString())[0].value == "" || document.getElementsByName("TA" + i.toString())[0].value == null){
    tmpt += "None     ";  //若為空值就用"None代替
  }
  else{
    //String.fromCharCode(10)：換行的 ASCII Code 是 10，String.fromCharCode(10)就是將換行的 ASCII Code轉換成換行的"符號"
    //因為資料存到資料庫中，會自動將"換行"拿掉，所以在此要做判斷將換行符號換成 "@@@"，之後可用 split() 或 explode()做切割
    var tpt = (document.getElementsByName("TA" + i.toString())[0].value).split(String.fromCharCode(10));
    for(y = 0; y < tpt.length; y++){
      if(tpt[y] != ""){
        if(y == (tpt.length - 1)){
          tmpt += tpt[y];
        }
        else{
          tmpt += tpt[y] + "@@@";
        }
      }
    }
    tmpt += "     ";
  }
  
 }


  if(window.XMLHttpRequest){
      http_request = new XMLHttpRequest();
      http_request.overrideMimeType('text.xml');
    }
    else if(window.ActiveXObject){
      http_request = new ActiveXObject("Microsoft.XMLHTTP");
    }

    http_request.open('POST', "./uschedule.php", true);

    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    http_request.send("schedule=" + tmpt);



    http_request.onreadystatechange = function(){
        if (http_request.readyState == 4 && http_request.status == 200){
          var check = http_request.responseText;
          if (check == 1){
            document.location.href = './main.php';
          }
          else if(check == 0){
            document.getElementById("input_schedule").disabled = false;
            document.getElementById("input_schedule").readOnly = false;
            document.getElementById("showerror").innerHTML = "Loading error！";
          }
    }

  }
}



function signout(){//Sign out登出
  var http_request;

  if(window.XMLHttpRequest){
      http_request = new XMLHttpRequest();
      http_request.overrideMimeType('text.xml');
    }
    else if(window.ActiveXObject){
      http_request = new ActiveXObject("Microsoft.XMLHTTP");
    }

    http_request.open('POST', "./usignout.php", true);

    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    http_request.send("a=" + "1");//此行是多餘的，為了讓onreadystatechange()事件觸發

    http_request.onreadystatechange = function(){
        if (http_request.readyState == 4 && http_request.status == 200){
          var check = http_request.responseText;
          if (check == 1){
            document.location.href = './index.html';
          }
      }
    }
}


function changepassword(){//更新password檢查
  document.getElementById("change_pwd").disabled = true;
  document.getElementById("change_pwd").readOnly = true;

  var http_request;
  var oldpwd = document.getElementsByName("Ioldpwd")[0].value;
  var newpwd = document.getElementsByName("Inewpwd")[0].value;
  var confirmpwd = document.getElementsByName("Iconfirmpwd")[0].value;

 if (oldpwd.length == 0 || newpwd.length == 0 || confirmpwd.length == 0){
    document.getElementById("showerror").innerHTML = "Each field must not have blank to fill！";
    document.getElementById("change_pwd").disabled = false;
    document.getElementById("change_pwd").readOnly = false;
  }
  else if(newpwd != confirmpwd){
    document.getElementById("showerror").innerHTML = "Your password and confirm password are different！"
    document.getElementById("change_pwd").disabled = false;
    document.getElementById("change_pwd").readOnly = false;
  }
  else if(newpwd.length < 5 || newpwd.length > 15){
    document.getElementById("showerror").innerHTML = "Password must be 5 to 15 characters！"
    document.getElementById("change_pwd").disabled = false;
    document.getElementById("change_pwd").readOnly = false;
  }
  else{
    if(window.XMLHttpRequest){
      http_request = new XMLHttpRequest();
      http_request.overrideMimeType('text.xml');
    }
    else if(window.ActiveXObject){
      http_request = new ActiveXObject("Microsoft.XMLHTTP");
    }

    http_request.open('POST', "./uchangepwd.php", true);

    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    http_request.send("Ioldpwd=" + oldpwd + "&Inewpwd=" + newpwd);



    http_request.onreadystatechange = function(){
        if (http_request.readyState == 4 && http_request.status == 200){
          var check = http_request.responseText;
          if (check == 1){
            document.getElementById("showerror").innerHTML = "Update successful！";
            //兩秒後自動呼叫 locationgref() 涵數，此倒數計時器只會做 "1" 次，setInterval則會一直不斷重覆
            setTimeout("locationhref()", 2000); 
          }
          else if(check == 0){
            document.getElementById("showerror").innerHTML = "Original password error！";
            document.getElementById("change_pwd").disabled = false;
            document.getElementById("change_pwd").readOnly = false;
          }
        }

      }
    }
}



function locationhref(){//自動轉跳到main頁面
  document.location.href = './main.php';
}


function locationgref_schedule(){//自動轉跳到change schedule頁面
  document.location.href = './chschedule.php';
}


function update_schedule(){//更新Schedule
  //避免按鈕被重覆按，妻下後將他disabled、readonly
 document.getElementById("update_schedule").disabled = true;
 document.getElementById("update_schedule").readOnly = true;

 var http_request;
 var tmpt = "";

 //因課表數量龐大，故先用迴圈先將所有的值存在 tmpt 中，並用 "     " 作間格，之後只有要 tmpt 往後臺送及可
 for(i = 0; i < 77; i++){
  if (document.getElementsByName("TA" + i.toString())[0].value == "" || document.getElementsByName("TA" + i.toString())[0].value == null){
    tmpt += "None     ";
  }
  else{
    var tpt = (document.getElementsByName("TA" + i.toString())[0].value).split(String.fromCharCode(10));
    for(y = 0; y < tpt.length; y++){
      if(tpt[y] != ""){
        if(y == (tpt.length - 1)){
          tmpt += tpt[y];
        }
        else{
          tmpt += tpt[y] + "@@@";
        }
      }
    }
    tmpt += "     ";
  }
  
 }


  if(window.XMLHttpRequest){
      http_request = new XMLHttpRequest();
      http_request.overrideMimeType('text.xml');
    }
    else if(window.ActiveXObject){
      http_request = new ActiveXObject("Microsoft.XMLHTTP");
    }

    http_request.open('POST', "./update_schedule.php", true);

    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    http_request.send("schedule=" + tmpt);



    http_request.onreadystatechange = function(){
        if (http_request.readyState == 4 && http_request.status == 200){
          var check = http_request.responseText;
          if (check == 1){
             document.getElementById("showerror").innerHTML = "Update successful！";
            //兩秒後自動呼叫 locationgref() 涵數，此倒數計時器只會做 "1" 次，setInterval則會一直不斷重覆
            setTimeout("locationhref()", 2000); 
          }
          else if(check == 0){
            //很重要！！若從後臺傳回的值是false，要記得將按扭的disabled、readonly變flase，不然會不能按
            document.getElementById("update_schedule").disabled = false;
            document.getElementById("update_schedule").readOnly = false;
            document.getElementById("showerror").innerHTML = "Update failed！";
          }
    }

  }
}


function search_schedule(){//捜尋某人的行事曆
  var search = document.getElementsByName("search_schedule")[0].value;
  //因為 <div> 這個tag沒有"value"，所以必須要用 "innerHTML" or "innerText"
  var current_course = document.getElementById("current_course_time").innerText;

  if(search == "" || search == null){
    document.getElementById("showerror_search").innerHTML = "Please enter whom you want to search！";
  }else{
  var http_request;


  if(window.XMLHttpRequest){
      http_request = new XMLHttpRequest();
      http_request.overrideMimeType('text.xml');
    }
    else if(window.ActiveXObject){
      http_request = new ActiveXObject("Microsoft.XMLHTTP");
    }

    http_request.open('POST', "./search_result_tmpt.php", true);

    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    http_request.send("search=" + search + "&current_course=" + current_course);



    http_request.onreadystatechange = function(){
        if (http_request.readyState == 4 && http_request.status == 200){
          var check = http_request.responseText;
          if (check == 1){
             document.location.href = './search_result.php';
          }
          else if(check == 0){
            document.getElementById("showerror").innerHTML = "Search failed！";
          }
        }
    }
    
  }
}


function send_messages(id){//發息給某人，id就是如果有二個以上相同姓名的人就用這個id來辨別要傳送給何人
  var aim = document.getElementsByName("realname" + id.toString())[0].value;
  var gt = getTime();

  if(aim == "" || aim == null){
    document.getElementById("showerror" + id.toString()).innerHTML = "Messages can not be empty！";
  }
  else{

    var http_request;


    if(window.XMLHttpRequest){
      http_request = new XMLHttpRequest();
      http_request.overrideMimeType('text.xml');
    }
    else if(window.ActiveXObject){
      http_request = new ActiveXObject("Microsoft.XMLHTTP");
    }

    http_request.open('POST', "./send_messages.php", true);

    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    http_request.send("messages=" + aim + "&time=" + gt + "&id=" + id);



    http_request.onreadystatechange = function(){
        if (http_request.readyState == 4 && http_request.status == 200){
          var check = http_request.responseText;
          if (check == 1){
            document.getElementById("showerror" + id.toString()).innerHTML = "Send successed！";
          }
          else if(check == 0){
            document.getElementById("showerror" + id.toString()).innerHTML = "Send failure！";
          }
        }
    }

  }
}



function gHostman_checkaccount(){//管理者登入
  document.getElementById("checkaccount").disabled = true;
  document.getElementById("checkaccount").readOnly = true;

  var http_request;
  var dt = getTime();

  if(document.getElementsByName('Iusername')[0].value.length == 0 || document.getElementsByName('Ipassword')[0].value.length == 0){
    document.getElementById("showerror").innerHTML = "Username or Password couldn't be empty!!";
    document.getElementById("checkaccount").disabled = false;
    document.getElementById("checkaccount").readOnly = false;
    }
  else{

    if (window.XMLHttpRequest){
      http_request = new XMLHttpRequest();

      http_request.overrideMimeType('text.xml');
    }
    else if (window.ActiveXObject){
      http_request = new ActiveXObject("Microsoft.XMLHTTP");
    }

    http_request.open('POST', './gHostman_usignin.php', true);

    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    http_request.send("Iusername=" + document.getElementsByName('Iusername')[0].value + "&Ipassword=" + document.getElementsByName('Ipassword')[0].value + 
      "&Itime=" + dt);


    http_request.onreadystatechange = function(){

      if (http_request.readyState == 4 && http_request.status == 200){

        var check = http_request.responseText;

        if (check == 1){
          document.location.href = './gHostman.php';
        }
        else if(check == 0){
          document.getElementById("checkaccount").disabled = false;
          document.getElementById("checkaccount").readOnly = false;
          document.getElementById("showerror").innerHTML = "Your username or password is wrong!";
        }

      }

    }
  }
}


function deleteusers(){//刪除使用者
  document.getElementById("checkaccount").disabled = true;
  document.getElementById("checkaccount").readOnly = true;

  var checkboxs = document.getElementsByName("deletelist[]");
  var list="";


  for(var i = 0; i < checkboxs.length; i++){
    if (checkboxs[i].checked == true){
      list += checkboxs[i].value + "     ";
    }
  }

  var http_request;


  if(window.XMLHttpRequest){
      http_request = new XMLHttpRequest();
      http_request.overrideMimeType('text.xml');
    }
    else if(window.ActiveXObject){
      http_request = new ActiveXObject("Microsoft.XMLHTTP");
    }

    http_request.open('POST', "./deleteusers.php", true);

    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    http_request.send("list=" + list);



    http_request.onreadystatechange = function(){
        if (http_request.readyState == 4 && http_request.status == 200){
          var check = http_request.responseText;
          if (check == 1){
            document.getElementById("checkaccount").disabled = false;
            document.getElementById("checkaccount").readOnly = false;
            document.getElementById("showerror").innerHTML = "Successed！";
            setTimeout("delete_locationhref()", 2000);
          }
          else if(check == 0){
            document.getElementById("checkaccount").disabled = false;
            document.getElementById("checkaccount").readOnly = false;           
            document.getElementById("showerror").innerHTML = "Delete failed！";
            setTimeout("delete_locationhref()", 2000);
          }
          else if(check == 2){
            document.getElementById("checkaccount").disabled = false;
            document.getElementById("checkaccount").readOnly = false;           
            document.getElementById("showerror").innerHTML = "You must select at least one！";
          }
        }
    }
}



function delete_locationhref(){
  document.location.href = './gHostman.php';
}