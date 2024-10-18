<?php
session_start();
session_destroy();
header('Location: ../OOP/login.php');
exit();
