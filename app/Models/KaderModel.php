<?php

namespace App\Models;

use CodeIgniter\Model;

class KaderModel extends Model
{
    protected $table      = 'kader';
    protected $primaryKey = 'idkader';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['namakader', 'jabatan', 'alamat', 'nohpn', 'username', 'email', 'password'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function search($keyword)
    {
        return $this->table('kader')->like('namakader', $keyword)->orLike('jabatan', $keyword)->orLike('alamat', $keyword);
    }
}