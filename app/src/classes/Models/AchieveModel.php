<?php
namespace App\models;
use PDO;
use Config\db\PDOFactory;

class AchieveModel {
    private PDO $pdo;
    
    public function __construct() {
		$this->pdo = PDOFactory::connect();
	}

    public function getBySomeOne(string $username): array {
		$preparedStmt = 'call getAllThanhTuuBySomeOne(:taikhoan)';
		$statement = $this->pdo->prepare($preparedStmt);

		$statement->bindParam(':taikhoan', $username, PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

    public function getOne(string|null $username): array|bool {
		$preparedStmt = 'call getOneThanhTuu()';
		$statement = $this->pdo->prepare($preparedStmt);
        
        $statement->bindParam(':taikhoan', $username, PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

    public function create(array $data) {
        $preparedStmt = 'call addThanhTuu(:tenthanhtuu, :ngaycap, :mota, :icon, :taikhoan)';
		$statement = $this->pdo->prepare($preparedStmt);
		$statement->bindParam(':tenthanhtuu', $data['tenthanhtuu'], PDO::PARAM_STR);
		$statement->bindParam(':ngaycap', $data['ngaycap'], PDO::PARAM_STR);
        $statement->bindParam(':mota', $data['mota'], PDO::PARAM_STR);
        $statement->bindParam(':icon', $data['icon'], PDO::PARAM_STR);
        $statement->bindParam(':taikhoan', $data['taikhoan'], PDO::PARAM_STR);
		$statement->execute();
    }

	public function edit(array $data): void {
		$preparedStmt = 'call editTTTaiKhoan(:stt_thanhtuu, :tenthanhtuu, :ngaycap, :mota, :icon);';
		$statement = $this->pdo->prepare($preparedStmt);
		$statement->bindParam(':stt_thanhtuu', $data['stt_thanhtuu'], PDO::PARAM_INT);
		$statement->bindParam(':tenthanhtuu', $data['tenthanhtuu'], PDO::PARAM_STR);
		$statement->bindParam(':ngaycap', $data['ngaycap'], PDO::PARAM_STR);
		$statement->bindParam(':mota', $data['mota'], PDO::PARAM_STR);
		$statement->bindParam(':icon', $data['icon'], PDO::PARAM_STR);
		$statement->execute();
	}

	public function delete(int $seq) {
        $preparedStmt = 'call deleteThanhTuu(:stt_thanhtuu)';
		$statement = $this->pdo->prepare($preparedStmt);
		$statement->bindParam(':stt_thanhtuu', $seq, PDO::PARAM_INT);
        $statement->execute();
    }
}