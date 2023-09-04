<?= $this->extend('layouts/template.php') ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Core</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Core</li>
    </ol>
    <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                    Table Core
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>SHIP</th>
                    <th>Cruies</th>
                    <th>Sampel Number</th>
                    <th>Sum</th>
                    <th>Date</th>
                    <th>Depth</th>
                    <th>Length</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>SHIP</th>
                    <th>Cruies</th>
                    <th>Sampel Number</th>
                    <th>Sum</th>
                    <th>Date</th>
                    <th>Depth</th>
                    <th>Length</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($core as $c) : ?>
                <tr>
                    <td><?= $c->SHIP ?></td>
                    <td><?= $c->CRUISE_ ?></td>
                    <td><?= $c->SAMPEL_NUM ?></td>
                    <td><?= $c->SUM ?></td>
                    <td><?= $c->DATE ?></td>
                    <td><?= $c->DEPTH ?></td>   
                    <td><?= $c->LENGTH ?></td>
                    <td><?= $c->LOCATION ?></td>
                    <td>
                        <a href="<?= base_url('core/detail') ?>" class="btn btn-outline-primary btn-sm">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbah" 
                        data-sampel="<?= $c->SAMPEL_NUM ?>" data-no="<?= $c->No ?>" id="btn-ubah">
                            <l class="fas fa-edit"></l>
                        </a>
                        <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus" 
                        data-sampel="<?= $c->SAMPEL_NUM ?>" data-id="<?= $c->No ?>" id="btn-hapus">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ====================================================================== -->
<!--                            MODAL BOX -->
<!-- ====================================================================== -->
<!-- MODAL HAPUS -->
<div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">
            <i class="fa-duotone fa-octagon-plus"></i>Yakin Hapus Data Berikut ?
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('pegawai/hapus') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="no" value="" id="no">
                <label for="sampel_num">Sampel Num</label>
                <input type="text" name="sampel_num" id="sampel_num" class="form-control" required readonly>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">YA</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<!-- END MODAL HAPUS -->


<script>
    $(document).on('click', '#btn-hapus', function(){
        const no = $(this).data('no');
        const sampel = $(this).data('sampel');

        $('#modalHapus .modal-body #no').val(no);
        $('#modalHapus .modal-body #sampel_num').val(sampel);
    });
</script>
<?= $this->endSection() ?>