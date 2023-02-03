<?php

namespace App\Models;

use CodeIgniter\Model;

class AnakModel extends Model
{
    protected $table      = 'anak';
    protected $primaryKey = 'nik';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['anaknama', 'tmptlhr', 'tgllhr', 'jk', 'namatmptlhr', 'ayahnama', 'ibunama'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function search($keyword)
    {
        return $this->table('anak')->like('anaknama', $keyword)->orLike('tmptlhr', $keyword)->orLike('ayahnama', $keyword)->orLike('ibunama', $keyword);
    }

    public function getAllData() 
    {
    	$builder = $this->db->table('anak');
        $builder->select('nik, anaknama, tmptlhr, tgllhr, jk, namatmptlhr, ayahnama, ibunama');
        $builder->join('keluarga','anak.nokk=keluarga.nokk');
        $query = $builder->get();
        return $query->getResult();
    }
}