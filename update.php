<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");
include_once '../../config/database.php';
include_once '../../models/employee.php';
$database = new Database();
$db = $database->getConnection();
$item = new employee($db);
$data = json_decode(file_get_contents("php://input"));
$item->id = $data->id;
$item->nama = $data->nama;
$item->Tanggal_Pinjam = $data->Tanggal_Pinjam;
$item->No_Hp = $data->No_Hp;
$item->created = date('Y-m-d H:i:s');
if($item->updateemployee()){
    echo json_encode(['message'=>'peminjaman_ruangan update successfully.']);
} else{
    echo json_encode(['message'=>'peminjaman_ruangan could not be created.']);
}
?>