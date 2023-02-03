<?php

namespace App\Models;

use CodeIgniter\Model;

class BumilModel extends Model
{
    protected $table      = 'bumil';
    protected $primaryKey = 'nik';

    // protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['bumilnama', 'anakke', 'ibunohp', 'ayahnama', 'ayahnohp', 'alamat'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function search($keyword)
    {
        return $this->table('bumil')->like('bumilnama', $keyword)->orLike('ayahnama', $keyword)->orLike('alamat', $keyword);
    }

    public function getAllData() 
    {
    	$builder = $this->db->table('bumil');
        $builder->select('nik, bumilnama, anakke, ibunohp, ayahnama, ayahnohp, alamat');
        $builder->join('keluarga','bumil.nokk=keluarga.nokk');
        $query = $builder->get();
        return $query->getResult();
    }
}