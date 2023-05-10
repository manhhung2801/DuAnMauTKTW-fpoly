<?php
include("../../config/database.php");

if(empty($_POST["insert"])) {
    try {
        $ten = $_POST["ten"];
        $tuoi = $_POST["tuoi"];

        $sql = "INSERT INTO employee (ten, tuoi) VALUES('$ten', '$tuoi')";
        $conn->exec($sql);
        echo "Insert successfully";
    }catch(PDOException $e) {
        echo $sql . "<br>" .$e->getMessage();
    }
}

?>