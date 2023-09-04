<?php

namespace App\Models;

use CodeIgniter\Model;

class CoreModel extends Model
{
    protected $table            = 'db_corestorage2007';
    protected $primaryKey       = 'No';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['SHIP','CRUISE_','SAMPEL_NUM','DEVICE','SUM','DATE','DEPTH','LENGTH','LOCATION','SED_TYPE','STORAGE','REMARK','VOL','LATITUDE','LONGITUDE'];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';

}
