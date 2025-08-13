<?php
$h = "localhost";
$u = "root";
$p = "";
$d = "robot_panel";
$conn = new mysqli($h,$u,$p,$d);
if ($conn->connect_error) { http_response_code(500); die("db"); }
$conn->set_charset("utf8mb4");
?>
