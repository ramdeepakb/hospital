<?php

session_start();

if(isset($_SESSION['email']))
{
	$_SESSION['x']=0;
	unset($_SESSION['email']);

}

header("Location: temp.html");
die;
