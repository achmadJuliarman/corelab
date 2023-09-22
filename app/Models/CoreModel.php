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

    public function tampilDataAjax($keywords = null, $start=0, $length=0)
    {
        $builder = $this->table('db_corestorage2007');
        if($keywords){
            $arr = explode(" ", $keywords);
            for ($i=0; $i < count($arr) ; $i++) { 
                $builder->like('SHIP', $arr[$i]);
                $builder->orLike('CRUISE_', $arr[$i]);
                $builder->orLike('SAMPEL_NUM', $arr[$i]);
                $builder->orLike('DEVICE', $arr[$i]);
                $builder->orLike('DEPTH', $arr[$i]);
                $builder->orLike('SED_TYPE', $arr[$i]);
                $builder->orLike('REMARK', $arr[$i]);
                $builder->orLike('LATITUDE', $arr[$i]);
                $builder->orLike('LONGITUDE', $arr[$i]);
                $builder->orLike('LOCATION', $arr[$i]);
            }
        }

        // limitation
        if($start != 0 || $length != 0)
        {
            $builder = $builder->limit($length, $start);
        }

        return $builder->orderBy('No', 'ASC')->get()->getResult();
    }

}
