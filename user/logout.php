<?php
session_start();
session_destroy();
header("location:http://localhost/TechPlug/user/register.php");
?>