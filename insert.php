<?php
require "db.php";
$data = json_decode(file_get_contents('php://input'),true);
$kelembapan = $data['esp_kelembapan']?? null;
$query = "INSERT INTO datasensor (esp_kelembapan) VALUES ('$kelembapan')";

if($koneksi->query($query)){
    echo json_encode("Data masuk - Kelembapan : $kelembapan");
}else{
    echo json_encode("Error DB : ". $koneksi->error);
}
?>