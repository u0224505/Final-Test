<?php
	//要先起重session 才能正確刪除session
	session_start();
	//清除所有的 session
	unset($_SESSION['IUSERNAME']);
	unset($_SESSION['IPASSWORD']);
	unset($_SESSION);
	//session_destroy();
	session_unset();
	echo 1;
?>