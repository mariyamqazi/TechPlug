<?php
session_start();
session_destroy();
header("location:http://localhost/TechPlug/admin/admin_logout.php");
?>