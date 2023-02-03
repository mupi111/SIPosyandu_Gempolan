<?php

// namespace App\Models;

// use CodeIgniter\Model;

// class UserModel extends Model
// {
//     protected $table      = 'users';

//     protected $returnType     = 'array';
//     protected $useSoftDeletes = true;

//     protected $allowedFields = ['username', 'email', 'password', 'fullname', 'nohp'];

//     protected $useTimestamps = true;
//     protected $createdField  = 'created_at';
//     protected $updatedField  = 'updated_at';
//     protected $deletedField  = 'deleted_at';

//     protected $validationRules    = [];
//     protected $validationMessages = [];
//     protected $skipValidation     = false;

//     public function search($keyword)
//     {
//         return $this->table('user')->like('username', $keyword)->orLike('fullname', $keyword);
//     }
// }