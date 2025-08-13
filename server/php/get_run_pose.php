<?php
header("Content-Type: application/json");
require_once("db.php");

$q = $conn->query("SELECT id,m1,m2,m3,m4,m5,m6,created_at FROM poses ORDER BY id DESC LIMIT 1");
if ($q && $q->num_rows>0) {
  $r = $q->fetch_assoc();
  echo json_encode([
    "pose"=>["m1"=>(int)$r["m1"],"m2"=>(int)$r["m2"],"m3"=>(int)$r["m3"],"m4"=>(int)$r["m4"],"m5"=>(int)$r["m5"],"m6"=>(int)$r["m6"]],
    "time"=>$r["created_at"]
  ]);
} else {
  echo json_encode(["pose"=>["m1"=>90,"m2"=>90,"m3"=>90,"m4"=>90,"m5"=>90,"m6"=>90],"time"=>null]);
}
?>
