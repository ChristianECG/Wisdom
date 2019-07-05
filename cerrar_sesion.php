<?
	session_start();
	session_destroy();
	echo "<link rel=stylesheet type='text/css' href=loader.css><div class=loader id=loader>loading...</div>";
	echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'></html>";
?>