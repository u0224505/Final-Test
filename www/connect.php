<?php
/*資料庫的帳號密碼*/
//'CharacterSet'=>'UTF-8' 非常重要！！！ 設定以utf-8字元集傳送
$conInfo=array('Database'=>'ULife', 'UID'=>'sa', 'PWD'=>'@0Root0@', 'CharacterSet'=>'UTF-8');
$conn=sqlsrv_connect('127.0.0.1\DBTeam', $conInfo);

/*連結資料庫*/
if( $conn == false )
{
    die( print_r( sqlsrv_errors(), true));
}
else
{
    //echo("Succesed!!!<br>");
}
?>