<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../../config/database.php';
    include_once '../../models/employee.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new employee($db);
    $data = json_decode(file_get_contents("php://input"));
    $item->name = $data->name;
    $item->Tanggal_Pinjam = $data->Tanggal_Pinjam;
    $item->Jenis_Kelamin = $data->Jenis_Kelamin;
    $item->Alamat_Peminjam = $data->Alamat_Peminjam;
    $item->Kontak = $data->Kontak;
    $item->created = date('Y-m-d H:i:s');

    if($item->createemployee()){
        echo json_encode(['message'=>'Employee created successfully.']);
    } else{
        echo json_encode(['message'=>'Employee could not be created.']);
    }
?>