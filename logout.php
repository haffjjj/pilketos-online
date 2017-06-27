<?php
require_once("lib/user.php");
$user->logout();
header("location: index.php");
?>