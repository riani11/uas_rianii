<?php
class employee{
// Connection
private $conn;
// Table
private $db_table = "employee";
// Columns
public $id;
public $nama;
public $Tanggal_Pinjam;
public $No_Hp;
public $created;
// Db connection
public function __construct($db){
$this->conn = $db;
}
// GET ALL
public function getemployee(){
$sqlQuery = "SELECT id, nama, Tanggal_Pinjam, No_hp, created FROM "
. $this->db_table . "";
$stmt = $this->conn->prepare($sqlQuery);
$stmt->execute();
return $stmt;
}
// CREATE
public function createemployee(){
$sqlQuery = "INSERT INTO
". $this->db_table ."
SET
name = :nama, 
email = :Tanggal_Pinjam, 
age = :No_Hp,  
created = :created";
$stmt = $this->conn->prepare($sqlQuery);
// sanitize
$this->nama=htmlspecialchars(strip_tags($this->nama));
$this->Tanggal_Pinjam=htmlspecialchars(strip_tags($this->Tanggal_Pinjam));
$this->No_Hp=htmlspecialchars(strip_tags($this->No_Hp));
$this->created=htmlspecialchars(strip_tags($this->created));
// bind data
$stmt->bindParam(":nama", $this->nama);
$stmt->bindParam(":Tanggal_Pinjam", $this->Tanggal_Pinjam);
$stmt->bindParam(":No_Hp", $this->No_hp);
$stmt->bindParam(":created", $this->created);
if($stmt->execute()){
    return true;
}
return false;
}
// READ single
public function getSingleemployee(){
$sqlQuery = "SELECT
id, 
nama, 
Tanggal_Pinjam, 
No_Hp, 
created
FROM
". $this->db_table ."
WHERE 
id = ?
LIMIT 0,1";
$stmt = $this->conn->prepare($sqlQuery);
$stmt->bindParam(1, $this->id);
$stmt->execute();
$dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
$this->nama = $dataRow['nama'];
$this->Tanggal_Pinjam = $dataRow['Tanggal_Peminjaman'];
$this->No_Hp = $dataRow['No_Hp'];
$this->created = $dataRow['created'];
} 
// UPDATE
public function updateemployee(){
$sqlQuery = "UPDATE
". $this->db_table ."
SET
nama = :nama, 
Tanggal_Pinjam = :Tanggal_Pinjam, 
No_Hp = :No_Hp, 
created = :created
WHERE 
id = :id";
$stmt = $this->conn->prepare($sqlQuery);
$this->nama=htmlspecialchars(strip_tags($this->nama));
$this->Tangal_Pinjam=htmlspecialchars(strip_tags($this->Tangal_Pinjam));
$this->No_Hp=htmlspecialchars(strip_tags($this->No_Hp));
$this->created=htmlspecialchars(strip_tags($this->created));
$this->id=htmlspecialchars(strip_tags($this->id));
// bind data
$stmt->bindParam(":nama", $this->nama);
$stmt->bindParam(":Tangal_Pinjam", $this->Tangal_Pinjam);
$stmt->bindParam(":No_Hp", $this->No_Hp);
$stmt->bindParam(":created", $this->created);
$stmt->bindParam(":id", $this->id);
if($stmt->execute()){
return true;
}
return false;
}
// DELETE
function deleteemployee(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
$stmt = $this->conn->prepare($sqlQuery);
$this->id=htmlspecialchars(strip_tags($this->id));
$stmt->bindParam(1, $this->id);
if($stmt->execute()){
return true;
}
return false;
}
}
?>
