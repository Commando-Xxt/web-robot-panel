<?php
require_once("db.php");
$id = isset($_POST["id"]) ? (int)$_POST["id"] : 1;
$stmt = $conn->prepare("UPDATE status SET val=0, updated_at=NOW() WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();
echo "ok";
?>
