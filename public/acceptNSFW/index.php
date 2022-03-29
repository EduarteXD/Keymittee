<?php
	session_start();
	$_SESSION["nsfw"] = 1;
	header("Location:" . $_GET["original"]);
?>