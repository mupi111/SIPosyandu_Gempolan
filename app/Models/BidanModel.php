<?php

namespace App\Models;

use CodeIgniter\Model;

class BidanModel extends Model
{
    protected $table      = 'bidan';
    protected $primaryKey = 'idbidan';
    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['bidannama', 'alamat', 'foto', 'nohp'];

    protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function getBidan($bidannama = false)
    {
        if($bidannama == false){
            return $this->findAll();
        }
        return $this->where(['bidannama' => $bidannama])->first();
    }

    public function search($keyword)
    {
        return $this->table('bidan')->like('bidannama', $keyword)->orLike('alamat', $keyword);
    }

    // public function getDetailBidan($id)
    // {
    //     $builder = $this->db->table('bidan');
    //     $builder->select('idbidan, bidannama, alamat, foto, nohp');
    //     $builder->where('idbidan',$id);
    //     $query = $builder->get();
    //     return $query->getResult();
    // }
}