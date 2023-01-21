<?php 
include "config/db.php";

session_destroy();

redirect("login.php");

?>