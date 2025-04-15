<?php
session_start();
session_destroy();

// Redirect ke login.html
header("Location: ../public/login.html");
exit;
