<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3>
                    Login
                </h3>
                <hr>
                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif;  ?>
                <form class="" action="/" method="post">
                    <div class="form-group">
                        <label for="NAMA">Nama Pengguna</label>
                        <input type="text" class="form-control" name="NAMA" id="NAMA" value="<?= set_value('NAMA')  ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="PASSWORD">Password</label>
                        <input type="password" class="form-control" name="PASSWORD" id="PASSWORD" value="">
                    </div>

                    <?php if (isset($validation)) : ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listerrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <br>
                    <div class="row">
                        <div class="mr-4 col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>