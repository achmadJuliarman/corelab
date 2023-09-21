<?php 
    use CodeIgniter\HTTP\IncomingRequest;
    $db      = \Config\Database::connect();
    $request = request();
    $keywords = $request->getVar('keywords');
    $core = $db->query("SELECT * FROM db_corestorage2007 
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

    // QUERY WITH BUILDER (lambat)
    // $builder = $db->table('db_corestorage2007');
    // $builder->like('SHIP', $keywords);
    // $builder->orLike('CRUISE_', $keywords);
    // $builder->orLike('SAMPEL_NUM', $keywords);
    // $builder->orLike('DEVICE', $keywords);
    // $builder->orLike('DATE', $keywords);
    // $builder->orLike('DEPTH', $keywords);
    // $builder->orLike('SED_TYPE', $keywords);
    // $builder->orLike('REMARK', $keywords);
    // $builder->orLike('VOL', $keywords);
    // $builder->orLike('LATITUDE', $keywords);
    // $builder->orLike('LONGITUDE', $keywords);
    // $core = $builder->get()->getResultObject();
    
?>

<table class="table table-striped table-hover">
<thead>
    <tr>
        <th>NO</th>
        <th>SHIP</th>
        <th>Cruies</th>
        <th>Sampel Number</th>
        <th>Date</th>
        <th>Depth</th>
        <th>Length</th>
        <th>Location</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
<?php if(!empty($core)) : ?>
<?php foreach ($core as $c) : ?>
    <tr>
        <td><?= $c->No ?></td>
        <td><?= $c->SHIP ?></td>
        <td><?= $c->CRUISE_ ?></td>
        <td><?= $c->SAMPEL_NUM ?></td>
        <td><?= $c->DATE ?></td>
        <td><?= $c->DEPTH ?></td>
        <td><?= $c->LENGTH ?></td>
        <td><?= $c->LOCATION ?></td>
        <td>
        <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail" data-sampel="<?= $c->SAMPEL_NUM ?>" data-no="<?= $c->No ?>" data-ship="<?= $c->SHIP ?>" data-cruise="<?= $c->CRUISE_ ?>" data-device="<?= $c->DEVICE ?>" data-sum="<?= $c->SUM ?>" data-date="<?= $c->DATE ?>" data-depth="<?= $c->DEPTH ?>" data-length="<?= $c->LENGTH ?>" data-location="<?= $c->LOCATION ?>" data-sed="<?= $c->SED_TYPE ?>" data-storage="<?= $c->STORAGE ?>" data-remark="<?= $c->REMARK ?>" data-vol="<?= $c->VOL ?>" data-latitude="<?= $c->LATITUDE ?>" data-longitude="<?= $c->LONGITUDE ?>" data-foto="<?= $c->FOTO_SPESIMEN ?>" id="btn-detail">
        <i class="fa-solid fa-eye"></i>
        </a>
        <!--  -->
        <a href="" class="btn btn-success btn-sm <?= session('ID_LEVEL') == 3 ? 'd-none' : '' ?>" data-bs-toggle="modal" data-bs-target="#modalUbah" data-sampel="<?= $c->SAMPEL_NUM ?>" data-no="<?= $c->No ?>" data-ship="<?= $c->SHIP ?>" data-cruise="<?= $c->CRUISE_ ?>" data-device="<?= $c->DEVICE ?>" data-sum="<?= $c->SUM ?>" data-date="<?= $c->DATE ?>" data-depth="<?= $c->DEPTH ?>" data-length="<?= $c->LENGTH ?>" data-location="<?= $c->LOCATION ?>" data-sed="<?= $c->SED_TYPE ?>" data-storage="<?= $c->STORAGE ?>" data-remark="<?= $c->REMARK ?>" data-vol="<?= $c->VOL ?>" data-latitude="<?= $c->LATITUDE ?>" data-longitude="<?= $c->LONGITUDE ?>" data-foto="<?= $c->FOTO_SPESIMEN ?>" id="btn-ubah">
        <l class="fas fa-edit"></l>
        </a>


        <a href="#" class="btn btn-danger btn-sm <?= session('ID_LEVEL') == 3 ? 'd-none' : '' ?>" data-sampel="<?= $c->SAMPEL_NUM ?>" data-no="<?= $c->No ?>" id="btn-hapus">
            <i class="fas fa-trash-alt"></i>
        </a>

        </td>
    </tr>
<?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="9" align="center"><?= 'match not found'; ?></td>
    </tr>
<?php endif; ?>
</tbody>
</table>