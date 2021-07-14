<?php
	//mysql connection
	define('DB_NAME','eyecare');
	define('DB_USER','root');
	define('DB_PASSWORD','');
	define('DB_HOST','localhost');

	$link = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
	if(!$link)
	{
		die('could not connect:'.mysql_error());
	}
	$db_selected=mysql_select_db(DB_NAME,$link);
	if(!$db_selected)
	{
		die('can\'t use'.DB_NAME.':'.mysql_error());
	}
	//select query
	$sql = "DELETE FROM appointment1 WHERE id='$_GET[id]'";
	
	//exe query 
	if(mysql_query($sql,$link))
	
		header("refresh:1; url=reports.php");
	else
		echo "not deleted";
?>