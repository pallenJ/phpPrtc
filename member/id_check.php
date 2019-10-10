<?php
include("../include/dbconnect.php");
$register_id = $_POST["register_id"];
$query = "SELECT COUNT(*) FROM members A WHERE A.id= '{$register_id}'";
$stmt = $db->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_NUM);
echo json_encode(array("cnt"=>$result[0][0]));
