<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3>
                    Login
                </h3>
                <hr>
                <form class="" action="/" method="">
                    <div class="form-group">
                        <label for="name">Nama Pengguna</label>
                        <input type="text" class="form-control" name="name" id="name" value=" <?= set_value('name')  ?> ">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" id="password" value="">
                    </div>
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