<?= $this->extend('layouts/template.php') ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Pegawai</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pegawai</li>
    </ol>
    <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                    Table Pegawai
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>No Telp</th>
                    <th>ID Lever User</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>No Telp</th>
                    <th>ID Lever User</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($pegawai as $p) : ?>
                <tr>
                    <td><?= $p->NAMA ?></td>
                    <td><?= $p->NIP ?></td>
                    <td><?= $p->TELP ?></td>
                    <td><?= $p->USERLEVELID ?></td>
                    <td>
                        <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbah" 
                        data-nama="<?= $p->NAMA ?>" data-no="<?= $p->NO ?>" id="btn-ubah">
                            <l class="fas fa-edit"></l>
                        </a>
                        <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus" 
                        data-nama="<?= $p->NAMA ?>" data-id="<?= $p->NO ?>" id="btn-hapus">
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
                <label for="nama_pegawai">Nama Pegawai</label>
                <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" required readonly>
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
        const nama = $(this).data('nama');
        console.log(nama)
        $('#modalHapus .modal-body #no').val(no);
        $('#modalHapus .modal-body #nama_pegawai').val(nama);
    });
</script>
<?= $this->endSection() ?>