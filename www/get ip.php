<?php
$myip;

if(!empty($_SERVER['HTTP_CLIENT_IP'])){
   $myip = $_SERVER['HTTP_CLIENT_IP'];
}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   $myip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else if(!empty($_SERVER['HTTP_X_FORWARDEDED'])){
	$myip = $SERVER['HTTP_X_FORWAEDED'];
}
else if(!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])){
	$myip = $SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
}
else if(!empty($_SERVER['HTTP_FORWARDED_FOR'])){
	$myip = $SERVER['HTTP_FORWARDED_FOR'];
}
else if(!empty($_SERVER['HTTP_FORWARDED'])){
	$myip = $SERVER['HTTP_FORWARDED'];
}
else{
   $myip= $_SERVER['REMOTE_ADDR'];
}
?>