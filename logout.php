<?php 
session_start();
session_destroy();
header("Location: http://localhost/TA2/index.php");
?>