<?php

namespace App\Models;

use CodeIgniter\Model;

class KbModel extends Model
{
    protected $table      = 'kb';
    protected $primaryKey = 'idkb';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['tgl','jeniskb','ayahnama','ibunama'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function search($keyword)
    {
        return $this->table('kb')->like('jeniskb', $keyword)->orLike('ibunama', $keyword)->orLike('ayahnama', $keyword);
    }

    public function getAllData() 
    {
    	$builder = $this->db->table('kb');
        $builder->select('idkb, tgl, jeniskb, ayahnama, ibunama');
        $builder->join('keluarga','kb.nokk=keluarga.nokk');
        $query = $builder->get();
        return $query->getResult();
    }
}