<?php
namespace App\models;
use PDO;
use Config\db\PDOFactory;

class UserModel {
    private PDO $pdo;
    
    public function __construct() {
		$this->pdo = PDOFactory::connect();
	}

  public function getAll(): array {
		$preparedStmt = 'call getAllTaiKhoan()';
		$statement = $this->pdo->prepare($preparedStmt);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

  public function getFullName(string $username): string {
    $preparedStmt = 'call getFullName(:username)';
    $statement = $this->pdo->prepare($preparedStmt);
		$statement->bindParam(':username', $username, PDO::PARAM_STR);
		$statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  public function getOne(string|null $username): array|bool {
		$preparedStmt = 'call getOne(:username)';
		$statement = $this->pdo->prepare($preparedStmt);
		
		$statement->bindParam(':username', $username, PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetch(PDO::FETCH_ASSOC);
	}

  public function create(array $data): void {
		$preparedStmt = 'call addTaiKhoan(:taikhoan, :matkhau, :hoten, :gioitinh, :ngaysinh, :chuyennganh, :loaitk)';
		$statement = $this->pdo->prepare($preparedStmt);
		$statement->bindParam(':taikhoan', $data['taikhoan'], PDO::PARAM_STR);
		$statement->bindParam(':matkhau', $data['matkhau'], PDO::PARAM_INT);
		$statement->bindParam(':hoten', $data['hoten'], PDO::PARAM_STR);
		$statement->bindParam(':gioitinh', $data['gioitinh'], PDO::PARAM_STR);
		$statement->bindParam(':ngaysinh', $data['ngaysinh'], PDO::PARAM_STR);
		$statement->bindParam(':chuyennganh', $data['chuyennganh'], PDO::PARAM_STR);
    $statement->bindParam(':loaitk', $data['loaitk'], PDO::PARAM_STR);
		$statement->execute();
	}

  public function edit(array $data): void {
		$preparedStmt = 'call edit_user(:taikhoan, :matkhau, :hoten, :gioitinh, :ngaysinh, :chuyennganh, :loaitk);';
		$statement = $this->pdo->prepare($preparedStmt);
		$statement->bindParam(':taikhoan', $data['taikhoan'], PDO::PARAM_STR);
		$statement->bindParam(':matkhau', $data['matkhau'], PDO::PARAM_INT);
		$statement->bindParam(':hoten', $data['hoten'], PDO::PARAM_STR);
		$statement->bindParam(':gioitinh', $data['gioitinh'], PDO::PARAM_STR);
		$statement->bindParam(':ngaysinh', $data['ngaysinh'], PDO::PARAM_STR);
		$statement->bindParam(':chuyennganh', $data['chuyennganh'], PDO::PARAM_STR);
    $statement->bindParam(':loaitk', $data['loaitk'], PDO::PARAM_STR);
		$statement->execute();
	}

  public function delete(string $username): void {
		$preparedStmt = 'call deleteTaiKhoan(:username)';
		$statement = $this->pdo->prepare($preparedStmt);
		$statement->bindParam(':username', $username, PDO::PARAM_STR);
		$statement->execute();
	}
}