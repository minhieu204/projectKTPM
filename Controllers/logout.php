<?php
session_start();
session_destroy();
header("Location: loginController.php");
exit();
?>