<?php
session_start();

unset($_SESSION['username_user']);
unset($_SESSION['password_user']);
header("location: ../indexmain.php");
