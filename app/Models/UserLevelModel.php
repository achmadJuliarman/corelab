<?php

namespace App\Models;

use CodeIgniter\Model;

class UserLevelModel extends Model
{
    protected $table            = 'user_levels';
    protected $primaryKey       = 'id_level';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_level', 'nama_level'];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

}
