<?php
namespace App\models;
use PDO;
use Config\db\PDOFactory;

class ContactModel {
    private PDO $pdo;
    
    public function __construct() {
		$this->pdo = PDOFactory::connect();
	}

    public function getAll(): array {
		$preparedStmt = 'call getAllLienHe()';
		$statement = $this->pdo->prepare($preparedStmt);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

    public function create(array $data) {
        $preparedStmt = 'call addLienHe(:noidunglh, :loailh, :taikhoan)';
		$statement = $this->pdo->prepare($preparedStmt);
		$statement->bindParam(':noidunglh', $data['noidunglh'], PDO::PARAM_STR);
		$statement->bindParam(':loailh', $data['loailh'], PDO::PARAM_STR);
		$statement->bindParam(':taikhoan', $data['taikhoan'], PDO::PARAM_STR);
		$statement->execute();
    }
}