<?php

namespace App\Models;

use CodeIgniter\Model;

class PosyanduModel extends Model
{
    protected $table      = 'posyandu';
    protected $primaryKey = 'idposyandu';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['posyandu','kategori','posalamat','posnohp','ketuapos','bidannama','kadernama'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function search($keyword)
    {
        return $this->table('posyandu')->like('posyandu', $keyword)->orLike('bidannama', $keyword)->orLike('kadernama', $keyword);
    }

    public function getAllData() 
    {
    	$builder = $this->db->table('posyandu');
        $builder->select('idposyandu, posyandu, kategori, posalamat, posnohp, ketuapos, bidannama, kadernama');
        $builder->join('bidan','posyandu.idbidan=bidan.idbidan');
        $builder->join('kader','posyandu.idkader=kader.idkader');
        $query = $builder->get();
        return $query->getResult();
    }
}