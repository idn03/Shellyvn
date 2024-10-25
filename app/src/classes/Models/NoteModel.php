<?php
namespace App\models;
use PDO;
use Config\db\PDOFactory;

class NoteModel {
    private PDO $pdo;
    
    public function __construct() {
		$this->pdo = PDOFactory::connect();
	}

    public function getAll(String $subjectCode): array {
		$preparedStmt = 'call getAllGhiChuInMon(:ma_mon)';
		$statement = $this->pdo->prepare($preparedStmt);
        $statement->bindParam(':ma_mon', $subjectCode, PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

    public function create(array $data) {
        $preparedStmt = 'call addGhiChu(:noidung_ghichu, :ma_mon)';
		$statement = $this->pdo->prepare($preparedStmt);
		$statement->bindParam(':noidung_ghichu', $data['noidung_ghichu'], PDO::PARAM_STR);
		$statement->bindParam(':ma_mon', $data['ma_mon'], PDO::PARAM_STR);
		$statement->execute();
    }

    public function delete(String $subjectcode, int $seq) {
        $preparedStmt = 'call deleteGhiChu(:stt_ghichu)';
		$statement = $this->pdo->prepare($preparedStmt);
		$statement->bindParam(':stt_ghichu', $seq, PDO::PARAM_STR);
        $statement->execute();
    }
}