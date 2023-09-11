<?= $this->extend('layouts/template.php') ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4">

    <h1 class="mt-4">Data Core</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Core</li>
    </ol>
    <!-- ================================================================ -->
    <!--                        NOTIFICATIONS -->
    <!-- ================================================================ -->
        <!-- NOTIFIKASI BERHASIL -->
        <?php if(session('success')) : ?>
        <div class="alert alert-info" role="alert">
          <i class="fa-solid fa-check"></i> <b><?= session('success') ?></b>
        </div>
        <?php endif; ?>
        <!-- END NOTIFICATION -->
        
        <!-- NOTIFIKASI GAGAl -->
        <?php if(session('validation')) : ?>
            <div class="alert alert-danger" role="alert">
                <i class="fa-solid fa-ban"></i> <b><?= session('validation')->listErrors() ?></b>
            </div>
        <?php endif; ?>
        <!-- END NOTIFIKASI GAGAL -->
    <!-- ================================================================ -->
    <!--                        END NOTIFICATIONS -->
    <!-- ================================================================ -->

    <!-- BUTTON TRIGGER MODAL TAMBAH -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
      <i class="fa-solid fa-plus"></i> Tambah Data Core
    </button>  

     <a href="<?=site_url('core/exportexcel')?>" class="btn btn-primary mb-3">
      <i class="fa-solid fa-file-excel"></i> Export Excel
    </a>  

    <a onclick="window.open(this.href,'_blank'); return false;" href="<?=site_url('core/exportpdf')?>"    class="btn btn-warning mb-3">
      <i class="fa-solid fa-file-pdf"></i> Export PDF
    </a>  

    <!-- END TRIGGER -->
    <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                    Table Core
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>NO</th>
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
                    <th>No</th>
                    <th>Ship</th>
                    <th>Cruise</th>
                    <th>Sample Number</th>
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
                    <td><?= $c->No ?></td>
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
                        data-sampel="<?= $c->SAMPEL_NUM ?>" data-no="<?= $c->No ?>" id="btn-hapus">
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
<!-- MODAL TAMBAH -->
<div class="modal fade modal-lg" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">
            <i class="fa-duotone fa-octagon-plus"></i>Tambah Data Core
        </h1>  
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('core/tambah') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="ship">Nama Pegawai</label>
                <input type="text" name="ship" id="ship" class="form-control" required value="<?= !empty(old('ship')) ? old('ship') : '' ?>">
            </div>
            <div class="mb-3">
                <label for="cruise">Cruise</label>
                <input type="text" name="cruise" id="cruise" class="form-control" required value="<?= !empty(old('cruise')) ? old('cruise') : '' ?>">
            </div>
            <div class="mb-3">
                <label for="sampel_num">Sampel NUM</label>
                <input type="text" name="sampel_num" id="sampel_num" class="form-control" required value="<?= !empty(old('sampel_num')) ? old('sampel_num') : '' ?>">
            </div>
            <div class="mb-3">
                <label for="device">Device</label>
                <input type="text" name="device" id="device" class="form-control" required value="<?= !empty(old('device')) ? old('device') : '' ?>">
            </div>
            <div class="mb-3">
                <label for="sum">Sum</label>
                <input type="number" name="sum" id="sum" class="form-control" required value="<?= !empty(old('sum')) ? old('sum') : '' ?>">
            </div>
            <div class="date mb-3" data-provide="datepicker">
                <label for="ship">Tanggal</label>
                <input type="date" class="form-control" placeholder="Tanggal" name="date" required> 
                <div class="input-group-addon">
                    <span class=""></span>
                </div>
            </div>
            <div class="mb-3">
                <label for="depth">Depth</label>
                <input type="text" name="depth" id="depth" class="form-control" required value="<?= !empty(old('depth')) ? old('depth') : '' ?>">
            </div>
            <div class="mb-3">
                <label for="length">Length</label>
                <input type="text" name="length" id="length" class="form-control" required value="<?= !empty(old('length')) ? old('length') : '' ?>">
            </div>
            <div class="mb-3">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" class="form-control" required value="<?= !empty(old('location')) ? old('location') : '' ?>">
            </div>
            <div class="mb-3">
                <label for="sed_type">SED Type</label>
                <input type="text" name="sed_type" id="sed_type" class="form-control" required value="<?= !empty(old('sed_type')) ? old('sed_type') : '' ?>">
            </div>
            <div class="mb-3">  
                <label for="storage">Storage</label>
                <input type="text" name="storage" id="storage" class="form-control" required value="<?= !empty(old('storage')) ? old('storage') : '' ?>">
            </div>
            <div class="mb-3">
                <label for="remark">Remark</label>
                <input type="text" name="remark" id="remark" class="form-control" required value="<?= !empty(old('remark')) ? old('remark') : '' ?>">
            </div>
            <div class="mb-3">
                <label for="vol">Vol</label>
                <input type="text" name="vol" id="vol" class="form-control" required value="<?= !empty(old('vol')) ? old('vol') : '' ?>">
            </div>
            <div class="mb-3">
                <label for="latitude">Latitude</label>
                <input type="number" name="latitude" id="latitude" class="form-control" required value="<?= !empty(old('latitude')) ? old('latitude') : '' ?>">
            </div>
            <div class="mb-3">
                <label for="longitude">Longitude</label>
                <input type="number" name="longitude" id="longitude" class="form-control" required value="<?= !empty(old('longitude')) ? old('longitude') : '' ?>">
            </div>
            <div class="row mb-3">
                    <label for="foto" class="col-sm-2 col-form-label">Foto Spesimen</label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="foto" name="foto" accept=".png,.jpg,.jpeg">
                        <label class="input-group-text" for="foto">Upload</label>
                    </div>
                    <div class="img">
                        <img class="img-thumbnail" id="uploadedImage" src="#" alt="Gambar yang diunggah" style="width:200px;"/>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<!-- END MODAL TAMBAH -->




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
        <form action="<?= base_url('core/hapus') ?>" method="post">
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
    // modal box hapus
    $(document).on('click', '#btn-hapus', function(){
        const no = $(this).data('no');
        const sampel = $(this).data('sampel');

        $('#modalHapus .modal-body #no').val(no);
        $('#modalHapus .modal-body #sampel_num').val(sampel);
    });

    // menampilkan file yang dipilih untuk diupload
    document.getElementById('foto').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const image = document.getElementById('uploadedImage');

        // Validasi bahwa file yang diunggah adalah gambar
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function() {
                image.src = reader.result;
            };

            reader.readAsDataURL(file);
        } else {
            alert('Harap unggah file gambar!');
        }
    }); 
</script>
<?= $this->endSection() ?>