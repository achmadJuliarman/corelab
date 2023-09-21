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
    <?php if (session('success')) : ?>
        <div class="alert alert-info" role="alert">
            <i class="fa-solid fa-check"></i> <b><?= session('success') ?></b>
        </div>
    <?php endif; ?>
    <!-- END NOTIFICATION -->

    <!-- NOTIFIKASI GAGAl -->
    <?php if (session('validation')) : ?>
        <div class="alert alert-danger" role="alert">
            <i class="fa-solid fa-ban"></i> <b><?= session('validation')->listErrors() ?></b>
        </div>
    <?php endif; ?>
    <!-- END NOTIFIKASI GAGAL -->
    <!-- ================================================================ -->
    <!--                        END NOTIFICATIONS -->
    <!-- ================================================================ -->

    <!-- BUTTON TRIGGER MODAL TAMBAH -->

    <button type="button" class="btn btn-primary mb-3 <?= session('ID_LEVEL') == 3 ? 'd-none' : '' ?>" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fa-solid fa-plus"></i> Tambah Data Core
    </button>



    <a href="<?= site_url('core/exportexcel') ?>" class="btn btn-primary mb-3 <?= session('ID_LEVEL') == 3 ? 'd-none' : '' ?>">
        <i class="fa-solid fa-file-excel"></i> Export Excel
    </a>



    <a onclick="window.open(this.href,'_blank'); return false;" href="<?= site_url('core/exportpdf') ?>" class="btn btn-warning mb-3 <?= session('ID_LEVEL') == 3 ? 'd-none' : '' ?>">
        <i class="fa-solid fa-file-pdf"></i> Export PDF
    </a>


    <!-- END TRIGGER -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="input-group mb-3 mx-2 search">
                <div class="row">
                    <input type="text" class="form-control col-md-2" placeholder="Cari Disini .." aria-label="Recipient's username" aria-describedby="button-addon2" id="keywords">
                </div>
            </div>
            <div id="core-ajax">
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


                                <!--  -->
                              <!--  <a href="#" class="btn btn-danger btn-sm <?= session('ID_LEVEL') == 3 ? 'd-none' : '' ?>" data-bs-toggle="modal" data-bs-target="#modalHapus" data-sampel="<?= $c->SAMPEL_NUM ?>" data-no="<?= $c->No ?>" id="btn-hapus">
                                <i class="fas fa-trash-alt"></i> -->

                                 <a href="#" class="btn btn-danger btn-sm <?= session('ID_LEVEL') == 3 ? 'd-none' : '' ?>" data-sampel="<?= $c->SAMPEL_NUM ?>" data-no="<?= $c->No ?>" id="btn-hapus">
                                <i class="fas fa-trash-alt"></i>
                                </a>
                                </a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <!-- links('nama tabel', 'nama file pagination') -->
            <!-- nama table ini diambil sesuai dengan yang dikirimkan di controller didalam parameter paginate() -->
            <?= $pager->links('core', 'core_pagination') ?>
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
                        <label for="ship">Ship</label>
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
                        <input type="text" name="latitude" id="latitude" class="form-control" required value="<?= !empty(old('latitude')) ? old('latitude') : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="longitude">Longitude</label>
                        <input type="text" name="longitude" id="longitude" class="form-control" required value="<?= !empty(old('longitude')) ? old('longitude') : '' ?>">
                    </div>
                    <div class="row mb-3">
                        <label for="foto" class="col-sm-2 col-form-label">Foto Spesimen</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="foto" name="foto" accept=".png,.jpg,.jpeg">
                            <label class="input-group-text" for="foto">Upload</label>
                        </div>
                        <div class="img">
                            <img class="img-thumbnail" id="uploadedImage" src="#" alt="Gambar yang diunggah" style="width:200px;" />
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

<!-- MODAL EDIT -->
<div class="modal fade modal-lg" id="modalUbah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <i class="fa-duotone fa-octagon-plus"></i>Edit Data Core
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('core/edit') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="no" id="no" class="form-control" required value="<?= !empty(old('no')) ? old('no') : '' ?>">
                    <div class="mb-3">
                        <label for="ship">Ship</label>
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
                        <input type="date" class="form-control" placeholder="Tanggal" name="date" id="date" required>
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
                        <input type="text" name="latitude" id="latitude" class="form-control" required value="<?= !empty(old('latitude')) ? old('latitude') : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="longitude">Longitude</label>
                        <input type="text" name="longitude" id="longitude" class="form-control" required value="<?= !empty(old('longitude')) ? old('longitude') : '' ?>">
                    </div>
                    <div class="img-lama">
                        <label for="foto" class="col-sm-2 col-form-label">Foto Spesimen Lama</label>
                        <div class="div">
                            <img src="#" alt="Gambar Spesimen Lama" id="img-lama" style="width:200px;" />
                            <input type="hidden" name="foto-lama" id="foto-lama" class="form-control" required value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="foto" class="col-sm-2 col-form-label">Foto Spesimen Baru</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="foto-edit" name="foto" accept=".png,.jpg,.jpeg">
                            <label class="input-group-text" for="foto-edit">Upload</label>
                        </div>
                        <div class="img">
                            <img class="img-thumbnail" id="uploadedImage-edit" src="#" alt="Gambar yang diunggah" style="width:200px;" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- END MODAL EDIT -->

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
                <form id="hapusForm" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="no" id="no">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div> -->
<!-- END MODAL HAPUS -->


<!-- MODAL BOX DETAIL -->
<div class="modal fade modal-xl" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    Detail Data
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container d-flex justify-content-center mb-3">
                    <img src="https://i.ibb.co/3yRgLHv/esdm.png" alt="" align="center" id="foto">
                </div>
                <div>
                    <h4><span class="badge text-bg-info" id="date"></span></h4>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h3 id="sampel_num"></h3>
                        </li>
                        <li class="list-group-item" id="ship"></li>
                        <li class="list-group-item" id="cruise"></li>
                        <li class="list-group-item" id="device"></li>
                        <li class="list-group-item" id="depth"></li>
                        <li class="list-group-item" id="length"></li>
                        <li class="list-group-item" id="location"></li>
                        <li class="list-group-item" id="sed_type"></li>
                        <li class="list-group-item" id="storage"></li>
                        <li class="list-group-item" id="remark"></li>
                        <li class="list-group-item" id="vol"></li>
                        <li class="list-group-item" id="latitude"></li>
                        <li class="list-group-item" id="longitude"></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END MODAL BOX DETAIL -->

<!-- LIVE SEARCH AJAX -->
<script>
    // SEARCH EVENt
    $('#keywords').on('keyup', function(){
        const content = $('#core-ajax');
        const keywords = $(this).val();
        $.ajax({
            url: "<?= base_url('core/cari') ?>",
            type: "GET",
            data: {
                keywords: keywords
            },
            success : function(data){
                content.html(data)
            }
            
        })
        // content.load('hello berhasil');
        // content.load(<?= base_url() ?>+'ajax/core-search?keywords='+keywords);
    });
</script>
<!-- END LIVE SEARCH AJAX -->

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const successParam = urlParams.get('success');

    document.addEventListener('DOMContentLoaded', (event) => {
        if (successParam === 'true') {
            Swal.fire({
                title: "Added!",
                text: "Data berhasil ditambahkan.",
                icon: "success"
            });
        }
    });
</script>

<!-- <script>
    $(document).ready(function () {
        const updateSuccess = localStorage.getItem('updateSuccess');

        if (updateSuccess === 'true') {
            // Display SweetAlert notification
            Swal.fire({
                title: "Updated!",
                text: "Data berhasil diubah.",
                icon: "success"
            });

            // Clear the flag
            localStorage.removeItem('updateSuccess');
        }
    });

    // Function to handle the edit response
    function handleEditResponse(response) {
        if (response.success) {
            // Set the flag to indicate update success
            localStorage.setItem('updateSuccess', 'true');

            // Page reloads here
            window.location.reload();
        } else {
            Swal.fire({
                title: "Error!",
                text: "Gagal untuk update data.",
                icon: "error"
            });
        }
    }

    // AJAX request to edit data
    $('#modalUbah form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?= base_url('core/ubah') ?>',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                handleEditResponse(response);
            }
        });
    });
</script> -->

<script>


//modal box hapus
$(document).on('click', '#btn-hapus', function() {
    const no = $(this).data('no');
    const sampel = $(this).data('sampel');
 
    Swal.fire({
        title: 'Yakin ingin hapus data ini?',
        text: "Data yang dihapus tidak akan kembali lagi",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus data ini!',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#modalHapus .modal-body #no').val(no);
            const formAction = '<?= base_url('core/hapus/') ?>' + no;
            $('#modalHapus form').attr('action', formAction);

            // Submit the form
            $('#modalHapus form').submit();

            // Display SweetAlert2 notification for successful deletion
            Swal.fire({
                title: 'Deleted!',
                text: 'Data berhasil dihapus.',
                icon: 'success'
            });
        }
    });
});

    /*// modal box hapus
    $(document).on('click', '#btn-hapus', function() {
        const no = $(this).data('no');
        const sampel = $(this).data('sampel');

        $('#modalHapus .modal-body #no').val(no);
        $('#modalHapus .modal-body #sampel_num').val(sampel);
    });*/

    // modal box ubah
    $(document).on('click', '#btn-ubah', function() {
        const no = $(this).data('no');
        const ship = $(this).data('ship');
        const sampel = $(this).data('sampel');
        const cruise = $(this).data('cruise');
        const device = $(this).data('device');
        const sum = $(this).data('sum');
        const date = $(this).data('date');
        const depth = $(this).data('depth');
        const length = $(this).data('length');
        const location = $(this).data('location');
        const sed = $(this).data('sed');
        const storage = $(this).data('storage');
        const remark = $(this).data('remark');
        const vol = $(this).data('vol');
        const longitude = $(this).data('longitude');
        const latitude = $(this).data('latitude');
        const foto = $(this).data('foto');

        console.log(no);
        $('#modalUbah .modal-body #no').val(no);
        $('#modalUbah .modal-body #ship').val(ship);
        $('#modalUbah .modal-body #cruise').val(cruise);
        $('#modalUbah .modal-body #sampel_num').val(sampel);
        $('#modalUbah .modal-body #device').val(device);
        $('#modalUbah .modal-body #sum').val(sum);
        $('#modalUbah .modal-body #date').val(date);
        $('#modalUbah .modal-body #depth').val(depth);
        $('#modalUbah .modal-body #sampel_num').val(sampel);
        $('#modalUbah .modal-body #length').val(length);
        $('#modalUbah .modal-body #location').val(location);
        $('#modalUbah .modal-body #sed_type').val(sed);
        $('#modalUbah .modal-body #storage').val(storage);
        $('#modalUbah .modal-body #remark').val(remark);
        $('#modalUbah .modal-body #vol').val(vol);
        $('#modalUbah .modal-body #latitude').val(latitude);
        $('#modalUbah .modal-body #longitude').val(longitude);
        $('#modalUbah .modal-body #img-lama').attr('src', '<?= base_url() ?>assets/img/' + foto);
        $('#modalUbah .modal-body #foto-lama').val(foto);
    });

    // modal box detail
    $(document).on('click', '#btn-detail', function() {
        const no = $(this).data('no');
        const ship = $(this).data('ship');
        const sampel = $(this).data('sampel');
        const cruise = $(this).data('cruise');
        const device = $(this).data('device');
        const sum = $(this).data('sum');
        const date = $(this).data('date');
        const depth = $(this).data('depth');
        const length = $(this).data('length');
        const location = $(this).data('location');
        const sed = $(this).data('sed');
        const storage = $(this).data('storage');
        const remark = $(this).data('remark');
        const vol = $(this).data('vol');
        const longitude = $(this).data('longitude');
        const latitude = $(this).data('latitude');
        const foto = $(this).data('foto');

        console.log(sampel);
        $('#modalDetail .modal-body #no').html(no);
        $('#modalDetail .modal-body #ship').html('<b>Ship : </b>' + ship);
        $('#modalDetail .modal-body #cruise').html('<b>Cruise : </b>' + cruise);
        $('#modalDetail .modal-body #sampel_num').html('<b>Sampel Num : </b>' + sampel);
        $('#modalDetail .modal-body #device').html('<b>Device : </b>' + device);
        $('#modalDetail .modal-body #date').html(date);
        $('#modalDetail .modal-body #depth').html('<b>Depth : </b>' + depth);
        $('#modalDetail .modal-body #length').html('<b>Length : </b>' + length);
        $('#modalDetail .modal-body #location').html('<b>Location : </b>' + location);
        $('#modalDetail .modal-body #sed_type').html('<b>SED Type : </b>' + sed);
        $('#modalDetail .modal-body #storage').html('<b>Storage : </b>' + storage);
        $('#modalDetail .modal-body #remark').html('<b>Remark : </b>' + remark);
        $('#modalDetail .modal-body #vol').html('<b>Vol : </b>' + vol);
        $('#modalDetail .modal-body #latitude').html('<b>Latitude : </b>' + latitude);
        $('#modalDetail .modal-body #longitude').html('<b>Longitude : </b>' + longitude);
        $('#modalDetail .modal-body #foto').attr('src', '<?= base_url() ?>assets/img/' + foto);
    });










    // menampilkan file yang dipilih untuk diupload
    document.getElementById('foto').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const image = document.getElementById('uploadedImage');

        console.log(image);
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

    // menampilkan file yang diupload di form edit
    document.getElementById('foto-edit').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const image = document.getElementById('uploadedImage-edit');

        console.log(image);
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