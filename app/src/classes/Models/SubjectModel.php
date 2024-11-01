<?php
namespace App\models;
use PDO;
use Config\db\PDOFactory;

class SubjectModel {
    private PDO $pdo;
    
    public function __construct() {
		$this->pdo = PDOFactory::connect();
	}

    public function getAll(): array {
		$preparedStmt = 'call getAllMonHoc()';
		$statement = $this->pdo->prepare($preparedStmt);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getBySomeOne(string $taikhoan): array|bool {
		$preparedStmt = 'call getAllMonHocBySomeOne(:taikhoan)';
		$statement = $this->pdo->prepare($preparedStmt);

		$statement->bindParam(':taikhoan', $taikhoan, PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

    public function getOne(string|null $subjetKey): array|bool {
		$preparedStmt = 'call getOneMonHoc(:ma_mon)';
		$statement = $this->pdo->prepare($preparedStmt);
        
        $statement->bindParam(':ma_mon', $subjetKey, PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetch(PDO::FETCH_ASSOC);
	}

    public function create(array $data) {
        $preparedStmt = 'call addMonHoc(:ma_mon, :tenmon, :ngaybd, :ngaykt, :cover, :taikhoan)';
		$statement = $this->pdo->prepare($preparedStmt);
		$statement->bindParam(':ma_mon', $data['ma_mon'], PDO::PARAM_STR);
		$statement->bindParam(':tenmon', $data['tenmon'], PDO::PARAM_STR);
		$statement->bindParam(':ngaybd', $data['ngaybd'], PDO::PARAM_STR);
        $statement->bindParam(':ngaykt', $data['ngaykt'], PDO::PARAM_STR);
        $statement->bindParam(':cover', $data['cover'], PDO::PARAM_STR);
        $statement->bindParam(':taikhoan', $data['taikhoan'], PDO::PARAM_STR);
		$statement->execute();
    }

    public function edit(array $data) {
        $preparedStmt = 'call editMonHoc(:ma_mon, :tenmon, :ngaybd, :ngaykt, :taikhoan)';
		$statement = $this->pdo->prepare($preparedStmt);
		$statement->bindParam(':ma_mon', $data['ma_mon'], PDO::PARAM_STR);
		$statement->bindParam(':tenmon', $data['tenmon'], PDO::PARAM_STR);
		$statement->bindParam(':ngaybd', $data['ngaybd'], PDO::PARAM_STR);
        $statement->bindParam(':ngaykt', $data['ngaykt'], PDO::PARAM_STR);
        $statement->bindParam(':taikhoan', $data['taikhoan'], PDO::PARAM_STR);
		$statement->execute();
    }

	public function mark(array $data) {
		$preparedStmt = 'call markMonHoc(:ma_mon, :ghim)';
		$statement = $this->pdo->prepare($preparedStmt);
		$statement->bindParam(':ma_mon', $data['ma_mon'], PDO::PARAM_STR);
		$statement->bindParam(':ghim', $data['ghim'], PDO::PARAM_STR);
		$statement->execute();
	}

    public function delete(): array {
		$preparedStmt = 'call getOneMonHoc()';
		$statement = $this->pdo->prepare($preparedStmt);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
}