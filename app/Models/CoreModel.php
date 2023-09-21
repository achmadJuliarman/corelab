<?php

namespace App\Models;

use CodeIgniter\Model;

class CoreModel extends Model
{
    protected $table            = 'db_corestorage2007';
    protected $primaryKey       = 'No';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['No','SHIP','CRUISE_','SAMPEL_NUM','DEVICE','SUM','DATE','DEPTH','LENGTH','LOCATION','SED_TYPE','STORAGE','REMARK','VOL','LATITUDE','LONGITUDE','FOTO_SPESIMEN'];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';

    public function search($keywords)
    {

        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM db_corestorage2007 
            WHERE SHIP LIKE '%$keywords%' 
            OR CRUISE_ LIKE '%$keywords%' 
            OR SAMPEL_NUM LIKE '%$keywords%' 
            OR DEVICE LIKE '%$keywords%' 
            OR DATE LIKE '%$keywords%'  
            OR DEPTH LIKE '%$keywords%' 
            OR SED_TYPE LIKE '%$keywords%' 
            OR REMARK LIKE '%$keywords%' 
            OR VOL LIKE '%$keywords%' 
            OR LATITUDE LIKE '%$keywords%' 
            OR LONGITUDE LIKE '%$keywords%' 
            ")->getResultObject();

        return $query;
    }

}
