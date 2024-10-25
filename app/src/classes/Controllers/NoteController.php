<?php

namespace App\controllers;
use App\models\{NoteModel};
use PDOException;


class NoteController {
    public function create() {
        $data = [];
        $data['noidung_ghichu'] = $_POST['noidung_ghichu'];
        $data['ma_mon'] = $_POST['ma_mon'];

		try {
			$noteModel = new NoteModel();
            $noteModel->create($data);
            redirectTo('/subjects/' . $_POST['ma_mon'], [
                'status' => 'success',
                'message' => 'A new note has been created'
            ]);
			
			
		} 
        catch (PDOException $e){
            redirectTo('/subjects/' . $_POST['ma_mon'], [
                'status' => 'failed',
                'message' => 'Failed to create note.'
            ]);
		}
			
	}

	public function delete(){
        $subjectCode = $_POST['ma_mon'];
        $noteSeq = (int)$_POST['stt_ghichu'];
		try {
			$noteModel = new NoteModel();
            $noteModel->delete($noteSeq);
            
			redirectTo('/subjects/' . $subjectCode, [
                'status' => 'success',
                'message' => 'Deleted note successfully'
            ]);

		} catch (PDOException $e) {
			redirectTo('/subjects/' . $subjectCode, [
                'status' => 'failed',
                'message' => 'Failed to delete note'
            ]);
		}
	}
}