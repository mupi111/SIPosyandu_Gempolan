<?php

namespace App\Models;

use CodeIgniter\Model;

class PuskesmasModel extends Model
{
    protected $table      = 'puskesmas';
    protected $primaryKey = 'idpuskesmas';
    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['puskesmas', 'alamat', 'nohp', 'posyandu', 'posalamat', 'posnohp'];

    protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function getAllData() 
    {
    	$builder = $this->db->table('puskesmas');
        $builder->select('idpuskesmas, puskesmas, alamat, nohp, posyandu, posalamat, posnohp');
        $builder->join('posyandu','puskesmas.idposyandu=posyandu.idposyandu');
        $query = $builder->get();
        return $query->getResult();
    }

    public function search($keyword)
    {
        return $this->table('puskesmas')->like('puskesmas', $keyword);
    }
}