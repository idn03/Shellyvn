<?php
namespace App\models;
use PDO;
use Config\db\PDOFactory;

class StudentModel {
    private PDO $pdo;
    
    public function __construct() {
		$this->pdo = PDOFactory::connect();
	}

  public function getAll(String $subjectCode): array {
		$preparedStmt = 'call getAllHocVienInMon(:ma_mon)';
		$statement = $this->pdo->prepare($preparedStmt);
        $statement->bindParam(':ma_mon', $subjectCode, PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

  public function create(array $data) {
    $preparedStmt = 'call addHocVien(:sdt_hocvien, :tenhocvien, :gioitinh_hocvien, :trinhdo_hocvien, :ma_mon)';
    $statement = $this->pdo->prepare($preparedStmt);
    $statement->bindParam(':sdt_hocvien', $data['sdt_hocvien'], PDO::PARAM_STR);
    $statement->bindParam(':tenhocvien', $data['tenhocvien'], PDO::PARAM_STR);
    $statement->bindParam(':gioitinh_hocvien', $data['gioitinh_hocvien'], PDO::PARAM_INT);
    $statement->bindParam(':trinhdo_hocvien', $data['trinhdo_hocvien'], PDO::PARAM_STR);
    $statement->bindParam(':ma_mon', $data['ma_mon'], PDO::PARAM_STR);
    $statement->execute();
  }

  public function edit(array $data) {
    $preparedStmt = 'call editHocVien(:sdt_hocvien, :tenhocvien, :gioitinh_hocvien, :trinhdo_hocvien)';
    $statement = $this->pdo->prepare($preparedStmt);
    $statement->bindParam(':sdt_hocvien', $data['sdt_hocvien'], PDO::PARAM_STR);
    $statement->bindParam(':tenhocvien', $data['tenhocvien'], PDO::PARAM_STR);
    $statement->bindParam(':gioitinh_hocvien', $data['gioitinh_hocvien'], PDO::PARAM_INT);
    $statement->bindParam(':trinhdo_hocvien', $data['trinhdo_hocvien'], PDO::PARAM_STR);
    $statement->execute();
  }

  public function delete(int $studentPhone) {
    $preparedStmt = 'call deleteGhiChu(:sdt_hocvien)';
    $statement = $this->pdo->prepare($preparedStmt);
    $statement->bindParam(':sdt_hocvien', $studentPhone, PDO::PARAM_STR);
    $statement->execute();
  }

  public function graded(array $data) {
    $preparedStmt = 'call graded(:sdt_hocvien, :ma_mon, :diem)';
    $statement = $this->pdo->prepare($preparedStmt);
    $statement->bindParam(':sdt_hocvien', $data['sdt_hocvien'], PDO::PARAM_STR);
    $statement->bindParam(':ma_mon', $data['ma_mon'], PDO::PARAM_STR);
    $statement->bindParam(':diem', $data['diem'], PDO::PARAM_INT);
    $statement->execute();
  }
}