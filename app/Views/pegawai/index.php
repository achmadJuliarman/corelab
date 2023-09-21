<?= $this->extend('layouts/template.php') ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Pegawai</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pegawai</li>
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


    <!-- Button trigger TAMBAH -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fa-solid fa-plus"></i> Tambah Pegawai
    </button>

    <a href="<?= site_url('pegawai/exportexcel') ?>" class="btn btn-primary mb-3">
        <i class="fa-solid fa-file-excel"></i> Export Excel
    </a>

    <a onclick="window.open(this.href,'_blank'); return false;" href="<?= site_url('pegawai/exportpdf') ?>" class="btn btn-warning mb-3">
        <i class="fa-solid fa-file-pdf"></i> Export PDF
    </a>



    <!-- END BUTTON MODAL TAMBAH -->
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
                    <?php foreach ($pegawai as $p) : ?>
                        <tr>
                            <td><?= $p->NAMA ?></td>
                            <td><?= $p->NIP ?></td>
                            <td><?= $p->TELP ?></td>
                            <td><?= $p->ID_LEVEL ?></td>
                            <td>
                                <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbah" id="btn-ubah" data-nama="<?= $p->NAMA ?>" data-no="<?= $p->NO ?>" data-nip="<?= $p->NIP ?>" data-telp="<?= $p->TELP ?>" data-level="<?= $p->ID_LEVEL ?>">
                                    <l class="fas fa-edit"></l>
                                </a>

                                <a href="#" class="btn btn-danger btn-sm <?= (session('NO') == $p->NO) ? 'd-none' : '' ?>" data-nama="<?= $p->NAMA ?>" data-no="<?= $p->NO ?>" id="btn-hapus">
                                <i class="fas fa-trash-alt"></i>
                                </a>
                               <!--  <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus" data-nama="<?= $p->NAMA ?>" data-no="<?= $p->NO ?>" id="btn-hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </a> -->
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
                    <i class="fa-duotone fa-octagon-plus"></i>Tambah Pegawai
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pegawai/tambah') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="nama_pegawai">Nama Pegawai</label>
                        <input type="text" name="nama" id="nama" class="form-control" required value="<?= !empty(old('nama')) ? old('nama') : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="text" name="pass" id="pass" class="form-control" required value="<?= !empty(old('pass')) ? old('pass') : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" id="nip" class="form-control" required value="<?= !empty(old('nip')) ? old('nip') : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="telp">No Telp</label>
                        <input type="number" name="telp" id="telp" class="form-control" required value="<?= !empty(old('telp')) ? old('telp') : '' ?>">
                    </div>
                    <div class="mb-4">
                        <label for="telp">Level User</label>
                        <select class="form-select" aria-label="Default select example" id="level" name="level" required>
                            <option selected disabled value="">-- Pilih Level User --</option>
                            <?php foreach ($levels as $level) : ?>
                                <option value="<?= $level->id_level ?>"><?= $level->nama_level ?></option>
                            <?php endforeach; ?>
                        </select>
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


<!-- MODAL UBAH -->
<div class="modal fade modal-lg" id="modalUbah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <i class="fa-duotone fa-octagon-plus"></i>Ubah Pegawai
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pegawai/ubah') ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" id="no" name="no">
                    <div class="mb-3">
                        <label for="nama_pegawai">Nama Pegawai</label>
                        <input type="text" name="nama" id="nama" class="form-control" required value="<?= !empty(old('nama')) ? old('nama') : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" id="nip" class="form-control" required value="<?= !empty(old('nip')) ? old('nip') : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="telp">No Telp</label>
                        <input type="number" name="telp" id="telp" class="form-control" required value="<?= !empty(old('telp')) ? old('telp') : '' ?>">
                    </div>
                    <div class="mb-4">
                        <label for="telp">Level User</label>
                        <select class="form-select" aria-label="Default select example" id="level" name="level" required>
                            <option selected disabled value="">-- Pilih Level User --</option>
                            <?php foreach ($levels as $level) : ?>
                                <option value="<?= $level->id_level ?>"><?= $level->nama_level ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- END MODAL UBAH -->


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
                <form action="" method="post">
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
               <!--  <form action="<?= base_url('pegawai/hapus') ?>" method="post">
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
                </form> -->
            </div>

        </div>
    </div>
</div>
<!-- END MODAL HAPUS -->

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

<script>
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
            url: '<?= base_url('pegawai/ubah') ?>',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                handleEditResponse(response);
            }
        });
    });
</script>

<script>
$(document).on('click', '#btn-hapus', function() {
    const no = $(this).data('no');
    const nama = $(this).data('nama');

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
            const formAction = '<?= base_url('pegawai/hapus/') ?>' + no;
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

    /*$(document).on('click', '#btn-hapus', function() {
        const no = $(this).data('no');
        const nama = $(this).data('nama');
        console.log(no);
        $('#modalHapus .modal-body #no').val(no);
        $('#modalHapus .modal-body #nama_pegawai').val(nama);
    });*/

    $(document).on('click', '#btn-ubah', function() {
        const no = $(this).data('no');
        const nama = $(this).data('nama');
        const nip = $(this).data('nip');
        const telp = $(this).data('telp');
        const level = $(this).data('level');
        $('#modalUbah .modal-body #no').val(no);
        $('#modalUbah .modal-body #nama').val(nama);
        $('#modalUbah .modal-body #nip').val(nip);
        $('#modalUbah .modal-body #telp').val(telp);
        $('#modalUbah .modal-body #level').val(level);
    });
</script>
<?= $this->endSection() ?>