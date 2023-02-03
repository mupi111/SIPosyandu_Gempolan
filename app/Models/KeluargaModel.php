<?php

namespace App\Models;

use CodeIgniter\Model;

class KeluargaModel extends Model
{
    protected $table      = 'keluarga';
    protected $primaryKey = 'nokk';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ayahnik', 'ayahnama', 'ayahtmptlhr', 'ayahtgllhr', 'ayahagama', 'ayahpendidikan', 'ayahpekerjaan', 'ayahnohp', 'ibunik', 'ibunama', 'ibutmptlhr', 'ibutgllhr', 'ibuagama', 'ibupendidikan', 'ibugoldar', 'ibupekerjaan', 'ibunohp', 'alamat', 'jmlhanak'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    
    public function search($keyword)
    {
        return $this->table('keluarga')->like('ayahnama', $keyword)->orLike('ibunama', $keyword)->orLike('alamat', $keyword);
    }
}