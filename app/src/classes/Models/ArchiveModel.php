<?php
namespace App\models;
use PDO;
use Config\db\PDOFactory;

class ArchiveModel {
    private PDO $pdo;
    
    public function __construct() {
		$this->pdo = PDOFactory::connect();
	}

    public function getBySomeOne(string $taikhoan): array {
		$preparedStmt = 'call getAllThanhTuuBySomeOne(:taikhoan)';
		$statement = $this->pdo->prepare($preparedStmt);

		$statement->bindParam(':taikhoan', $taikhoan, PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

    public function getOne(string|null $subjetKey): array|bool {
		$preparedStmt = 'call getOneThanhTuu()';
		$statement = $this->pdo->prepare($preparedStmt);
        
        $statement->bindParam(':taikhoan', $subjetKey, PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

    public function create(array $data) {
        $preparedStmt = 'call addThanhTuu(:tenthanhtuu, :ngaycap, :mota, :icon, :taikhoan)';
		$statement = $this->pdo->prepare($preparedStmt);
		$statement->bindParam(':tenthanhtuu', $data['tenthanhtuu'], PDO::PARAM_STR);
		$statement->bindParam(':tenmon', $data['tenmon'], PDO::PARAM_STR);
		$statement->bindParam(':ngaycap', $data['ngaycap'], PDO::PARAM_STR);
        $statement->bindParam(':mota', $data['mota'], PDO::PARAM_STR);
        $statement->bindParam(':icon', $data['icon'], PDO::PARAM_STR);
        $statement->bindParam(':taikhoan', $data['taikhoan'], PDO::PARAM_STR);
		$statement->execute();
    }
}